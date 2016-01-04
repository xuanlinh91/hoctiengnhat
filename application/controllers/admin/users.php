<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {
    /**
     * ark Admin Panel for Codeigniter
     * Author: Abhishek R. Kaushik
     * downloaded from http://devzone.co.in
     *
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('t_users');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
        $this->data['page'] = 'users';
    }

    public function index() {
        redirect('admin/users/users_list');
    }

    public function users_list()
    {
        $all_user = $this->t_users->get_total();
        $config['base_url'] = base_url('index.php/admin/users/users_list');
        $config['total_rows'] = count($all_user);
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $page_int = $this->uri->segment($config['uri_segment']);
        $this->data['data_user'] = $this->t_users->list_all($config['per_page'], $page_int);
        $this->view('default', 'admin/vwManageUser', $this->data);

    }

    public function add_user() {
        $arr['page'] = 'user';
        $this->load->view('admin/vwAddUser',$arr);
    }

    public function edit_user($id = null) {
        $this->set_page_title("Edit User");
        if($id!= null){
            $result = $this->t_users->get_data_by_id($id);
            $this->data['user'] = $result;
            $this->load->view('admin/vwEditUser', $this->data);
        }else{
            redirect('admin/users/users_list');
        }
    }

    public function block_user() {
        // Code goes here
    }

    public function delete_user() {
        // Code goes here
    }





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */