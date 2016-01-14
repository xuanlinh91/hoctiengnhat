<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class N4 extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('t_volca');
        $this->load->model('t_gram');
        $this->load->model('t_blog');
        $this->load->model('t_kanji');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('table');
    }

    public $course = 'N4';

    public function index()
    {
        $this->set_page_title('Giáo trình '.$this->course);
        $this->data['course'] = $this->course;
        $this->view('default', 'course', $this->data);
    }

    public function gram($check = null, $i = 0){
        $this->set_page_title('Ngữ pháp '.$this->course);
        $new_blog = $this->t_blog->list_all_new();
        $this->data['r_blog'] = $new_blog;

        if ($check == 'list' || $check == null) {
            $total = $this->t_gram->get_total_lesson($this->course);
            $config['base_url'] = base_url('index.php/n4/gram/list');
            $config['total_rows'] = $total;
            $config['per_page'] = 5;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $this->table->set_heading('id','name');
            $page_int = $this->uri->segment($config['uri_segment']);
            $this->data['data_get'] = $this->t_gram->list_all($config['per_page'], $page_int, $this->course);
            $this->data['course'] = $this->course;
            $this->view('default', 'gram', $this->data);
        } elseif($check == 'lesson') {
            $gram = $this->t_gram->get_lesson($i, $this->course);
            if ($gram != null) {
                $this->set_page_title('Ngữ pháp '.$this->course . ' bài '.$i);
                $this->data['course'] = $this->course;
                $this->data['lesson'] = $i;
                $max = $this->t_gram->get_last_lesson_id($this->course);
                $min = $this->t_gram->get_first_lesson_id($this->course);
                $this->data['max_id'] = $max['max_id'];
                $this->data['min_id'] = $min['min_id'];
                $this->data['gram'] = $gram;
                $this->view('default', 'gram', $this->data);
            } else {
                redirect($this->course . '/gram');
            }
        } else {
            redirect($this->course . '/gram');
        }
    }

    public function kanji($course = 'n4'){
        $this->set_page_title('Chữ hán '.$this->course);
        $new_blog = $this->t_blog->list_all_new();
        $this->data['r_blog'] = $new_blog;
        $kanji = $this->t_kanji->get_total_record($course);
        $this->data['kanji'] = $kanji;
        $this->data['course'] = $course;
        $this->view('default', 'kanji', $this->data);
    }

    public function volca($check = null, $i = 0){
        $this->set_page_title('Từ vựng '.$this->course);
        $new_blog = $this->t_blog->list_all_new();
        $this->data['r_blog'] = $new_blog;

        if ($check == 'list' || $check == null) {
            $total = $this->t_volca->get_total_lesson($this->course);
            $config['base_url'] = base_url('index.php/n4/volca/list');
            $config['total_rows'] = $total;
            $config['per_page'] = 5;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $this->table->set_heading('id','name');
            $page_int = $this->uri->segment($config['uri_segment']);
            $this->data['data_get'] = $this->t_volca->list_all($config['per_page'], $page_int, $this->course);
            $this->data['course'] = $this->course;
            $this->view('default', 'volca', $this->data);
        } elseif($check == 'lesson') {
            $volca = $this->t_volca->get_lesson($i, $this->course);
            if ($volca != null) {
                $this->set_page_title('Từ vựng '.$this->course . ' bài '.$i);
                $this->data['lesson'] = $i;
                $this->data['volca'] = $volca;
                $max = $this->t_volca->get_last_lesson_id($this->course);
                $min = $this->t_volca->get_first_lesson_id($this->course);
                $this->data['max_id'] = $max['max_id'];
                $this->data['min_id'] = $min['min_id'];
                $this->data['course'] = $this->course;
                $this->view('default', 'volca', $this->data);
            } else {
                redirect($this->course . '/volca');
            }
        } else {
            redirect($this->course . '/volca');
        }
    }

}
