<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
	public function index()
	{

		$this->load->model('t_blog');
		$this->load->model('t_counter');
		$this->data['blog'] = $this->t_blog->get_last_home_blog();
		$this->data['docs'] = $this->t_blog->get_last_home_docs();
		$this->data['more'] = $this->t_blog->get_last_home_more();
		$this->view('default', 'home', $this->data);
	}


}
