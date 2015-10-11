<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hiragana extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('t_hiragana');
    }

    public function index()
    {
        $this->view('default', 'hiragana', $this->data);
    }

    public function show_hiragana(){
        $array = $this->t_hiragana->get_all_data();
        $i = 0;
        foreach ($array as $key => $value) {
            $i++;
            echo $value['CHAR'] . '  ' . $value['PRON'] . '  ';
            if ($i == 5) {
                echo '<br>';
                $i = 0;
            }
        }
    }
    public function chonchu(){
        $input = $this->input->post();
        var_dump($input);
        exit;
        switch ($input['type']) {
            case HIRAGANA:
                $char = $this->t_hiragana->get_all_data();
                break;
            case KATAKANA:
                $char = $this->t_katakana->get_all_data();
                break;
            case KANJI:
                $char = $this->t_hiragana->get_all_data();
                break;
            default:
                $char = $this->t_hiragana->get_all_data();
                break;
        }

        $this->data['hiragana'] = json_encode($char);
        $this->view('default', 'hiragana_game/chonchu', $this->data);
    }
}
