<?php
/**
 * ark Admin Panel for Codeigniter
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('t_admin');
        $this->load->model('t_publisher');
    }

    public function index() {
        if ($this->session->userdata('is_admin_login')) {
            redirect('admin/cms/blog_list');
        } else {
            $this->load->view('admin/vwLogin');
        }
    }

    public function do_login() {

        if ($this->session->userdata('is_admin_login')) {
            redirect('admin/cms/blog_list');
        } else {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/vwLogin');
            } else {
                $enc_pass  = md5($password);
                $val = $this->t_admin->get_data($user, $enc_pass);
                $val2 = $this->t_publisher->get_data($user, $enc_pass);
                if (count($val)>0) {
                    $recs = $val[0];
                    $this->session->set_userdata(array(
                            'id' => $recs['id'],
                            'username' => $recs['username'],
                            'email' => $recs['email'],
                            'is_admin_login' => true,
                            'user_type' => $recs['user_type']
                        )
                    );
                    redirect('admin/cms');
                } elseif(count($val2)>0) {
                    $recs = $val2[0];
                    if ($recs['deleted'] != 'N') {
                        $err['error'] = 'Your account has been deleted, please contact administrator';
                        $this->load->view('admin/vwLogin', $err);
                        return;
                    } elseif ($recs['status'] != 0) {
                        $err['error'] = 'Your account has been deactive, please contact administrator';
                        $this->load->view('admin/vwLogin', $err);
                        return;
                    }
                    $this->session->set_userdata(array(
                            'id' => $recs['id'],
                            'username' => $recs['username'],
                            'email' => $recs['email'],
                            'is_publisher_login' => true,
                            'user_type' => $recs['user_type']
                        )
                    );
                    redirect('admin/cms');
                } else {
                    $err['error'] = '<strong>Access Denied</strong> Invalid Username/Password';
                    $this->load->view('admin/vwLogin', $err);
                }
            }
        }
    }


    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('is_admin_login');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin/home', 'refresh');
    }

    public function edit_profile()
    {
        $this->set_page_title("Edit Profile");
        $id = $this->session->userdata['id'];
        if ($this->session->userdata('is_admin_login')) {
            if($id!= null){
                $result = $this->t_admin->get_data_by_id($id);
                $this->data['user'] = $result;
                $this->load->view('admin/vwEditAdminProfile', $this->data);
            } else {
                redirect('admin/home');
            }
        } elseif($this->session->userdata('is_publisher_login')){
            if($id!= null){
                $result = $this->t_publisher->get_data_by_id($id);
                $this->data['user'] = $result;
                $this->load->view('admin/vwEditPublisherProfile', $this->data);
            } else {
                redirect('admin/home');
            }
        }

    }

    public function edit_profile_submit()
    {
        $data = $this->input->post();
        $id = $this->session->userdata['id'];
        unset($data['btn_submit']);
        if ($data != null) {
            if ($this->session->userdata('is_admin_login')) {
                $this->t_admin->update_data_by_id($data, $id);
                $this->noti('Profile updated successfully!', 'success');
                redirect('admin/home/profile');
            } elseif ($this->session->userdata('is_publisher_login')){
                unset($data['username']);
                $this->t_publisher->update_data_by_id($data, $id);
                $this->noti('Profile updated successfully!', 'success');
                redirect('admin/home/profile');
            }
        }

    }

    public function profile()
    {
        $this->set_page_title("Profile");
        $id = $this->session->userdata['id'];
        if($id!= null){
            $result = $this->t_publisher->get_data_by_id($id);
            $this->data['user'] = $result;
            $this->load->view('admin/vwProfile', $this->data);
        } else {
            redirect('admin/home');
        }

    }

    public function change_password()
    {
        $this->set_page_title("Change password");
        $this->load->view('admin/vwChangePassword', $this->data);
    }

    public function change_password_submit()
    {
        $data = $this->input->post();
        $pass = $this->t_publisher->get_data_by_id($this->session->userdata['id']);
        $pass_admin = $this->t_admin->get_data_by_id($this->session->userdata['id']);
        unset($data['btn_submit']);
        if ($data != null) {
            if (md5($data['old_password']) == $pass_admin['password']) {
                unset($data['old_password']);
                unset($data['new_password_confirm']);
                $data['password'] = md5($data['new_password']);
                unset($data['new_password']);
                if ($this->session->userdata('is_admin_login')) {
                    $this->t_admin->update_data_by_id($data, $this->session->userdata['id']);
                    $this->noti('Password changed!', 'error');
                    redirect('admin/home/profile');

                } elseif ($this->session->userdata('is_publisher_login')){
                    $this->t_publisher->update_data_by_id($data, $this->session->userdata['id']);
                    $this->noti('Password changed!', 'error');
                    redirect('admin/home/profile');

                }

            } else {
                $this->noti('Wrong password!', 'error');
                redirect('admin/home/change_password');
            }

        }
        redirect('admin/home/profile');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */