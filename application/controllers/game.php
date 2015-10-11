<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('t_hiragana');
        $this->load->model('t_katakana');
    }

    public function index()
    {
        $this->view('default', 'game/game', $this->data);
    }
    public function chonchu_start(){
        $this->view('default', 'game/chonchu_start', $this->data);
    }
    public function chonchu(){
        $input = $this->input->post();
        if($input == null){
            $segment = array('game', 'chonchu_start');
            $this->redirect($segment);
        };
        switch ($input['type']) {
            case HIRAGANA:
                $char = $this->t_hiragana->get_data_limit($input['number']);
                break;
            case KATAKANA:
                $char = $this->t_katakana->get_data_limit($input['number']);
                break;
            case KANJI:
                $char = $this->t_hiragana->get_all_data();
                break;
            default:
                $char = $this->t_hiragana->get_all_data();
                break;
        }

        $this->data['char'] = json_encode($char);
        $this->data['time_out'] = $input['level'];
        $this->view('default', 'game/chonchu', $this->data);
    }

    public function chonchu_result_cal(){
        if ($this->input->post() != null) {
            $result = $this->input->post('result');
            $total = $this->input->post('total');
        }
        echo json_encode('<h1>THẬT KHÔNG THỂ TIN NỔI!!!!!</h1><br><h2>Bạn được <span class="text-danger">'. $result.'/'. $total.'</span></h2>');
    }

}
