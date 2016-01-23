<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller {
    /**
     * ark Admin Panel for Codeigniter
     * Author: Abhishek R. Kaushik
     * downloaded from http://devzone.co.in
     *
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('t_category');
        $this->load->file(APPPATH . 'models/form_validation/validation_rules.php', false);
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
        $this->data['page'] = 'category';

    }

    public function index() {
        redirect('admin/category/category_list');
    }

    public function category_list()
    {
        $all_cate = $this->t_category->get_total_edit();
        $this->data['cate'] = $all_cate;
        $this->load->view('admin/vwManageCategory',$this->data);
    }
    public function create_category() {
        $option = array();
        $option['BLANK'] = '';
        foreach ($this->t_category->get_dropdown() as $cate) {
            $val = $cate['ID_NAME'];
            $option[$val] = $cate['CATEGORY'];
        }

        $this->data['cate_dropdown'] = $option;
        if ($this->session->userdata('CREATE_CATEGORY')) {
            $result = $this->session->userdata('CREATE_CATEGORY');
            $this->session->unset_userdata('CREATE_CATEGORY');

            if($result['PARENT'] == null){
                $this->data['cate_dropdown_checked'] = 'BLANK';
            } else {
                $this->data['cate_dropdown_checked'] = $result['PARENT'];
            }

            $this->data['category'] = $result;
        }

        $this->load->view('admin/vwAddCategory',$this->data);
    }

    public function edit_category($id) {
        $this->set_page_title("Edit Category");
        if($id !='' && $id != 'HB'){
            $option = array();
            $option['BLANK'] = '';
            foreach ($this->t_category->get_dropdown() as $cate) {
                if($cate['ID'] != $id && $cate['PARENT'] == null){
                    $val = $cate['ID_NAME'];
                    $option[$val] = $cate['CATEGORY'];
                }
            }

            $this->data['cate_dropdown'] = $option;

            if ($this->session->userdata('EDIT_CATEGORY')) {
                $result = $this->session->userdata('EDIT_CATEGORY');
                $this->session->unset_userdata('EDIT_CATEGORY');
            } else {
                $result = $this->t_category->get_data($id);
            }

            if($result['PARENT'] == null){
                $this->data['cate_dropdown_checked'] = 'BLANK';
            } else {
                $this->data['cate_dropdown_checked'] = $result['PARENT'];
            }
            $this->data['category'] = $result;
            $this->load->view('admin/vwEditCategory', $this->data);
        } elseif($id == 'HB') {
            $this->noti('Cannot modify base category', 'success');
            redirect('admin/category');
        } else {
            redirect('admin/category');
        }
    }

    public function create_submit() {
        $data = $this->input->post();
        $id = $data['ID'];
        unset($data['ID']);
        unset($data['btn_submit']);
        if ($data['PARENT'] == 'BLANK') {
            $data['PARENT'] = NULL;
        }
        $this->form_validation->set_rules('ID_NAME', 'Id', 'trim|required|max_length[50]|custom_validate_cate_id_name|callback_create_unique_cate_id[category.ID_NAME.' . $data['ID_NAME'] . '.'.$id.']');
        $this->form_validation->set_rules(Validation_rules::create_category_rules());
        if ($this->form_validation->run()) {
            if ($data != null) {
                $this->t_category->set_data($data, $id);
                $this->noti('Data saved.', 'success');
            } else {
                $this->noti('Failed.', 'error');
            }
            redirect('admin/category/category_list');
        } else {
            $this->session->set_userdata('type_mess_code', ERROR_CLASS);
            $this->session->set_userdata('error_flag_code', 0);
            $ext_field = array(
                array(
                    'field' => 'ID_NAME',
                    'label' => 'Id'
                )
            );

            $list_of_errors = validate_load(Validation_rules::create_category_rules());
            $ext_field = validate_load($ext_field);
            $list_of_errors = array_merge($list_of_errors, $ext_field);
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            $this->session->set_userdata('CREATE_CATEGORY', $data);
            redirect('admin/category/create_category');
        }
    }
    public function edit_submit() {
        $data = $this->input->post();
        $id = $data['ID'];
        unset($data['ID']);
        unset($data['btn_submit']);
        if ($data['PARENT'] == 'BLANK') {
            $data['PARENT'] = NULL;
        }
        $this->form_validation->set_rules('ID_NAME', 'Id', 'trim|required|max_length[50]|custom_validate_cate_id_name|callback_edit_unique_cate_id[category.ID_NAME.' . $data['ID_NAME'] . '.'.$id.']');
        $this->form_validation->set_rules(Validation_rules::edit_category_rules());
        if ($this->form_validation->run()) {
            if ($data != null) {
                $this->t_category->update_data_by_id($data, $id);
                $this->noti('Data saved.', 'success');
            } else {
                $this->noti('Failed.', 'error');
            }
            redirect('admin/category/category_list');
        } else {
            $this->session->set_userdata('type_mess_code', ERROR_CLASS);
            $this->session->set_userdata('error_flag_code', 0);
            $ext_field = array(
                array(
                    'field' => 'ID_NAME',
                    'label' => 'Id'
                )
            );

            $list_of_errors = validate_load(Validation_rules::edit_category_rules());
            $ext_field = validate_load($ext_field);
            $list_of_errors = array_merge($list_of_errors, $ext_field);
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            $this->session->set_userdata('EDIT_CATEGORY', $data);
            redirect('admin/category/edit_category/'.$id);
        }
    }


    public function delete_cate($id = null)
    {
        if ($id != null) {
            $data['DELETE'] = 1;
            $this->t_category->update_data_by_id($data, $id);
            redirect('admin/category/category_list');
        }

    }

    public function create_unique_cate_id($value, $params)
    {
        $this->form_validation->set_message('create_unique_cate_id', 'The %s is already being used by another category.');
        list($table, $field, $id) = explode(".", $params, 3);
        $query = $this->db->select($field)->from($table)
            ->where($field, $value)->where('`DELETE` = "0"', null, false)->limit(1)->get();
        if ($query->row()) {
            return false;
        }

        return true;
    }

    public function edit_unique_cate_id($value, $params)
    {
        $this->form_validation->set_message('edit_unique_cate_id', 'The %s is already being used by another category.');
        list($table, $field,$username, $id) = explode(".", $params, 4);
        $query = $this->db->select($field)->from($table)
            ->where($field, $value)->where('ID != ', $id)->where('`DELETE` = "0"', null, false)->limit(1)->get();
        if ($query->row()) {
            return false;
        }

        return true;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */