<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course extends MY_Controller {
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
        $this->load->model('t_gram');
        $this->load->model('t_volca');
        $this->load->model('t_kanji');
        $this->load->file(APPPATH . 'models/form_validation/validation_rules.php', false);
        $this->load->model('t_course');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
        $this->data['page'] = 'course';
    }

    public function index() {
        $this->view('default', 'admin/vwManageCourse', $this->data);
    }

    public function grammar_list()
    {
        $total = $this->t_gram->get_total_lesson(null);
        $config['base_url'] = base_url('index.php/admin/course/grammar_list');
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $page_int = $this->uri->segment($config['uri_segment']);
        $this->data['data_gram'] = $this->t_gram->list_all($config['per_page'], $page_int, null);
        $this->view('default', 'admin/vwManageCourseGrammar', $this->data);

    }

    public function kanji_list()
    {
        $total = $this->t_kanji->get_total_lesson(null);
        $config['base_url'] = base_url('index.php/admin/course/kanji_list');
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $page_int = $this->uri->segment($config['uri_segment']);
        $this->data['data_kanji'] = $this->t_kanji->list_all($config['per_page'], $page_int, null);
        $this->view('default', 'admin/vwManageCourseKanji', $this->data);

    }

    public function volca_list()
    {
        $total = $this->t_volca->get_total_lesson(null);
        $config['base_url'] = base_url('index.php/admin/course/volca_list');
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $page_int = $this->uri->segment($config['uri_segment']);
        $this->data['data_volca'] = $this->t_volca->list_all($config['per_page'], $page_int, null);
        $this->view('default', 'admin/vwManageCourseVolca', $this->data);

    }

    public function edit_grammar($id = null)
    {
        if ($id != null) {
            $gram = $this->t_gram->get_data_by_id($id);
            $option = array();
            foreach ($this->t_course->get_total() as $course) {
                $val = $course['ID'];
                $option[$val] = $course['NAME'];
            }

            $this->data['course_dropdown'] = $option;
            $this->data['course_dropdown_checked'] = strtoupper($gram['course']);
            $this->data['gram'] = $gram;
            $this->view('default', 'admin/vwEditCourseGrammar', $this->data);
        }
    }

    public function create_grammar()
    {
        $this->set_page_title("Create new Grammar Lesson");
        $option = array();
        foreach ($this->t_course->get_total() as $course) {
            $val = $course['ID'];
            $option[$val] = $course['NAME'];
        }

        $this->data['course_dropdown'] = $option;
        $this->data['course_dropdown_checked'] = DEFAULT_GRAMMAR_COURSE;
        $this->view('default', 'admin/vwAddCourseGrammar', $this->data);
    }

    public function create_grammar_submit() {
        $data = $this->input->post();
        unset($data['ID']);
        unset($data['btn_submit']);
        $this->form_validation->set_rules(Validation_rules::create_grammar_rules());

        if ($this->form_validation->run()) {
            $id = $this->t_gram->set_data($data);
            if($id != null){
                $this->noti('Data create successfully.', 'error');
            } else {
                $this->noti('Data create failed.', 'error');
            }
            $this->noti('Data create successfully.', 'success');
            redirect('admin/course/grammar_list');
        } else {
            $list_of_errors = validate_load(Validation_rules::create_blog_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            redirect('admin/course/create_grammar');
        }
    }

    public function create_volca()
    {
        $this->set_page_title("Create new Volcabulary Lesson");
        $option = array();
        foreach ($this->t_course->get_total() as $course) {
            $val = $course['ID'];
            $option[$val] = $course['NAME'];
        }

        $this->data['course_dropdown'] = $option;
        $this->data['course_dropdown_checked'] = DEFAULT_COURSE;
        $this->view('default', 'admin/vwAddCourseVolca', $this->data);
    }

    public function create_volca_submit() {
        $data = $this->input->post();
        unset($data['ID']);
        unset($data['btn_submit']);
        $this->form_validation->set_rules(Validation_rules::create_volca_rules());

        if ($this->form_validation->run()) {
            $id = $this->t_volca->set_data($data);
            if($id != null){
                $this->noti('Data create successfully.', 'error');
            } else {
                $this->noti('Data create failed.', 'error');
            }
            $this->noti('Data create successfully.', 'success');
            redirect('admin/course/volca_list');
        } else {
            $list_of_errors = validate_load(Validation_rules::create_blog_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            redirect('admin/course/create_volca');
        }
    }

    public function create_kanji($id = null)
    {
        $this->set_page_title("Create new Kanji Character");
        $option = array();
        foreach ($this->t_course->get_total() as $course) {
            $val = $course['ID'];
            $option[$val] = $course['NAME'];
        }

        $this->data['course_dropdown'] = $option;
        $this->data['course_dropdown_checked'] = DEFAULT_COURSE;
        $this->view('default', 'admin/vwAddCourseKanji', $this->data);
    }

    public function create_kanji_submit() {
        $data = $this->input->post();
        unset($data['btn_submit']);
        $this->form_validation->set_rules(Validation_rules::create_kanji_rules());

        if ($this->form_validation->run()) {
            $id = $this->t_volca->set_data($data);
            if($id != null){
                $this->noti('Data create successfully.', 'error');
            } else {
                $this->noti('Data create failed.', 'error');
            }
            $this->noti('Data create successfully.', 'success');
            redirect('admin/course/volca_list');
        } else {
            $list_of_errors = validate_load(Validation_rules::create_kanji_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            redirect('admin/course/create_volca');
        }
    }

//    public function insert_data(){
//        require_once 'Classes/PHPExcel/IOFactory.php';
//        $objPHPExcel = PHPExcel_IOFactory::load("temp/a.xls");
//
//        for ($i = 1;$i < 120; $i++) {
//
//            $temp_char = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
//            if ($temp_char != '' && $temp_char != NULL) {
//                $record['CHAR'] = trim($temp_char);
//            }
//            $temp_hv = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
//            if ($temp_hv != '' && $temp_hv != NULL) {
//                $record['AMHV'] = trim($temp_hv);
//            }
//            $temp_nghia = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
//            if ($temp_nghia != '' && $temp_nghia != NULL) {
//                $record['NGHIA'] = trim($temp_nghia);
//            }
//            $temp_on = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getValue();
//            if ($temp_on != '' && $temp_on != NULL) {
//                $record['ON'] = trim($temp_on);
//            }
//            $temp_kun = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getValue();
//            if ($temp_kun != '' && $temp_kun != NULL) {
//                $record['KUN'] = trim($temp_kun);
//            }
//            $this->t_kanji->set_data($record);
//        }
//        echo 'hehe';
//        exit;
//    }

    public function edit_kanji($id = null)
    {
        if ($id != null) {
            $kanji = $this->t_kanji->get_data_by_id($id);
            $option = array();
            foreach ($this->t_course->get_total() as $course) {
                $val = $course['ID'];
                $option[$val] = $course['NAME'];
            }

            $this->data['course_dropdown'] = $option;
            $this->data['course_dropdown_checked'] = strtoupper($kanji['COURSE']);
            $this->data['kanji'] = $kanji;
            $this->view('default', 'admin/vwEditCourseKanji', $this->data);
        }
    }

    public function edit_volca($id = null)
    {
        if ($id != null) {
            $volca = $this->t_volca->get_data_by_id($id);
            $option = array();
            foreach ($this->t_course->get_total() as $course) {
                $val = $course['ID'];
                $option[$val] = $course['NAME'];
            }

            $this->data['course_dropdown'] = $option;
            $this->data['course_dropdown_checked'] = strtoupper($volca['course']);
            $this->data['volca'] = $volca;
            $this->view('default', 'admin/vwEditCourseVolca', $this->data);
        }

    }

    public function update_grammar()
    {
        $data = $this->input->post();
        $id = $data['id'];
        unset($data['id']);
        unset($data['btn_submit']);

        $this->form_validation->set_rules(Validation_rules::update_gram_rules());
        if ($this->form_validation->run()) {
            $this->t_gram->update_data_by_id($data, $id);
            $this->noti('Data update successfully.', 'success');
            redirect('admin/course/grammar_list');
        } else {
            $list_of_errors = validate_load(Validation_rules::update_gram_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            redirect('admin/course/edit_grammar/'.$id);
        }
    }

    public function update_kanji()
    {
        $data = $this->input->post();
        $id = $data['ID'];
        unset($data['ID']);
        unset($data['btn_submit']);

        $this->form_validation->set_rules(Validation_rules::update_kanji_rules());
        if ($this->form_validation->run()) {
            $this->t_kanji->update_data_by_id($data, $id);
            $this->noti('Data update successfully.', 'success');
            redirect('admin/course/kanji_list');
        } else {
            $list_of_errors = validate_load(Validation_rules::update_kanji_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            redirect('admin/course/edit_kanji/'.$id);
        }
    }

    public function update_volca()
    {
        $data = $this->input->post();
        $id = $data['id'];
        unset($data['id']);
        unset($data['btn_submit']);

        $this->form_validation->set_rules(Validation_rules::update_volca_rules());
        if ($this->form_validation->run()) {
            $this->t_volca->update_data_by_id($data, $id);
            $this->noti('Data update successfully.', 'success');
            redirect('admin/course/volca_list');
        } else {
            $list_of_errors = validate_load(Validation_rules::update_volca_rules());
            $this->session->set_userdata('list_of_errors', json_encode($list_of_errors));
            $this->session->set_userdata('error_mess_code', validation_errors());
            redirect('admin/course/edit_volca/'.$id);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */