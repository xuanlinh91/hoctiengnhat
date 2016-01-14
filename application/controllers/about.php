<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('t_blog');
    }

    public function index()
    {
        $this->set_page_title('Giới thiệu');
        $new_blog = $this->t_blog->list_all_new();
        $this->data['r_blog'] = $new_blog;
        $about = $this->t_blog->get_data_by_property('*',array("CATEGORY" => 'AB'));
        $this->data['about'] = $about[0];
        $this->view('default', 'about', $this->data);
    }

}
