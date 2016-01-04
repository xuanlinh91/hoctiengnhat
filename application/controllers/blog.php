<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('t_volca');
        $this->load->model('t_gram');
        $this->load->model('t_blog');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('table');
    }

    public function index($id = null)
    {
        $new_blog = $this->t_blog->list_all_new();
        $this->data['r_blog'] = $new_blog;
        $blog = $this->t_blog->get_data($id);
        $this->data['blog'] = $blog;
        $this->view('default', 'blog_template', $this->data);

    }

}
