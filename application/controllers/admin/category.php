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
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
        $this->data['page'] = 'category';

    }

    public function index() {
        $all_cate = $this->t_category->get_total_edit();
        $this->data['cate'] = $all_cate;
        $this->load->view('admin/vwManageCategory',$this->data);
    }

    public function create() {
        $option = array();
        $option['BLANK'] = '';
        foreach ($this->t_category->get_total() as $cate) {
            if($cate['PARENT'] != NULL){
                $val = $cate['ID'];
                $option[$val] = $cate['CATEGORY'];
            }
        }

        $this->data['cate_dropdown'] = $option;


        $this->load->view('admin/vwAddCategory',$this->data);
    }

    public function edit($id) {
        $this->set_page_title("Edit Category");
        if($id !='' && $id != 'HB'){
            $option = array();
            $option['BLANK'] = '';
            foreach ($this->t_category->get_total() as $cate) {
                if($cate['ID'] != $id && $cate['PARENT'] == null){
                    $val = $cate['ID'];
                    $option[$val] = $cate['CATEGORY'];
                }
            }

            $this->data['cate_dropdown'] = $option;

            $result = $this->t_category->get_data($id);
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


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */