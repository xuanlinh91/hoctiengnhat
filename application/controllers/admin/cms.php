<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->file(APPPATH . 'models/form_validation/validation_rules.php', false);
        $this->load->model('t_blog');
        $this->load->model('t_category');
        if (!$this->session->userdata('is_admin_login') && !$this->session->userdata('is_publisher_login')) {
            redirect('admin/home');
        }

        $this->data['page'] = 'cms';
    }

    public function index() {
        redirect('admin/cms/blog_list');
   }

    public function blog_list()
    {
        if ($this->session->userdata('is_admin_login')) {
            $all_blog = $this->t_blog->get_total();
            $config['base_url'] = base_url('index.php/admin/cms/blog_list');
            $config['total_rows'] = count($all_blog);
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $page_int = $this->uri->segment($config['uri_segment']);
            $this->data['data_cms'] = $this->t_blog->list_all($config['per_page'], $page_int);
            $this->view('default', 'admin/vwManageCMS', $this->data);

        } elseif ($this->session->userdata('is_publisher_login')) {
            $all_blog = $this->t_blog->get_total_publisher($this->session->userdata('id'));
            $config['base_url'] = base_url('index.php/admin/cms/blog_list');
            $config['total_rows'] = count($all_blog);
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $page_int = $this->uri->segment($config['uri_segment']);
            $this->data['data_cms'] = $this->t_blog->list_all_publisher($this->session->userdata('id'), $config['per_page'], $page_int);
            $this->view('default', 'admin/vwManageCMS', $this->data);

        }
    }
    public function edit($id='') {
        $this->set_page_title("Edit content");

        if($id!=''){
            $option = array();
            foreach ($this->t_category->get_total() as $cate) {
                $val = $cate['ID'];
                $option[$val] = $cate['CATEGORY'];
            }
            $this->data['cate_dropdown'] = $option;
            $result = $this->t_blog->get_data($id);
            $this->data['cate_dropdown_checked'] = $result['CATEGORY'];
            $thumb = explode('/', $result['THUMB']);
            $result['THUMB_HIDDEN'] = end($thumb);

            if ($this->session->userdata('EDIT_CONTENT')) {
                foreach ($this->session->userdata('EDIT_CONTENT') as $key => $val) {
                    $result[$key] = $val;
                }

                $this->session->unset_userdata('EDIT_CONTENT');
            }

            $this->data['cms'] = $result;
            $this->data['cate_dropdown_checked'] = $result['CATEGORY'];
            $this->load->view('admin/vwEditCMS', $this->data);
        } else {
            redirect('admin/cms');
        }
    }

    public function create() {
        $this->set_page_title("Create new content");
        $option = array();
        foreach ($this->t_category->get_total() as $cate) {
            $val = $cate['ID'];
            $option[$val] = $cate['CATEGORY'];
        }
        unset($option['AB']);
        $this->data['cate_dropdown'] = $option;
        $this->data['cate_dropdown_checked'] = DEFAULT_BLOG_CATEGORY;

        if ($this->session->userdata('CREATE_BLOG')) {
            $temp = $this->session->userdata('CREATE_BLOG');
            $thumb = explode('/', $temp['THUMB']);
            $temp['THUMB_HIDDEN'] = end($thumb);
            $this->data['cms'] = $temp;
            $this->session->unset_userdata('CREATE_BLOG');
            $this->data['cate_dropdown_checked'] = $temp['CATEGORY'];
        }

        $this->load->view('admin/vwAddNewCMS', $this->data);
    }

    public function create_submit() {
        $data = $this->input->post();
        unset($data['ID']);
        unset($data['myfile']);
        unset($data['btn_submit']);

        $time = date("Y-m-d H:i:s");
        $data['DATETIME'] = $time;

        $this->form_validation->set_rules(Validation_rules::create_blog_rules());
        if($data['THUMB'] == ''){
            $data['THUMB'] = DEFAULT_THUMB;
        } else {
            $data['THUMB'] = DEFAULT_THUMB_FOLDER . $data['THUMB'];
        }
        if ($this->form_validation->run()) {
            $id = $this->t_blog->set_data($data);
            if($id != null){
                $this->noti('Data create successfully.', 'error');
            } else {
                $this->noti('Data create failed.', 'error');
            }
            $this->noti('Data create successfully.', 'success');
            redirect('admin/cms');
        } else {
            $list_of_errors = validate_load(Validation_rules::create_blog_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            $this->session->set_userdata('CREATE_BLOG', $data);
            redirect('admin/cms/create');
        }
    }


    public function delete_cms($id='') {
        $data['DELETE'] = 1;
        $this->t_blog->update_data_by_id($data, $id);

        redirect('admin/cms');
    }


    public function edit_submit() {
        $data = $this->input->post();
        $id = $data['ID'];
        unset($data['ID']);
        unset($data['myfile']);
        if($data['THUMB'] == null){
            $data['THUMB'] = DEFAULT_THUMB;
        } else {
            $data['THUMB'] = DEFAULT_THUMB_FOLDER . $data['THUMB'];
        }
        unset($data['btn_submit']);
        $this->form_validation->set_rules(Validation_rules::create_blog_rules());
        if ($this->form_validation->run()) {
            $this->t_blog->update_data_by_id($data, $id);
            $this->noti('Data update successfully.', 'success');
            redirect('admin/cms');
        } else {
            $list_of_errors = validate_load(Validation_rules::edit_blog_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            $this->session->set_userdata('EDIT_CONTENT', $data);
            redirect('admin/cms/edit/'.$id);
        }
    }

}
