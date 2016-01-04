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
    }

    public function index() {
        if ($this->session->userdata('is_admin_login')) {
            redirect('admin/dashboard');
        } else {
            $this->load->view('admin/vwLogin');
        }
    }

    public function do_login() {

        if ($this->session->userdata('is_admin_login')) {
            $this->redirect('admin', 'dashboard');
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
                    redirect('admin/dashboard');
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



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */