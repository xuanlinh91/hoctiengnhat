<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $page_title;
    var $data;

    public function __construct()
    {
        parent::__construct();
        $CI =& get_instance();
        $this->data = array();
        if ($this->router->method != 'load_view_step') {
            $this->data = array();
        }
        $this->load_counter();
        $CI->load->library('session');
    }

    public function set_page_title($title = '')
    {
        if (!empty($title)) {
            $this->page_title = $title;
        } else {
            $title = "Home page";
            $this->page_title = $title;
        }
    }

    public function noti($text, $result = 'error', $flagCode = 1)
    {
        if ($result == 'success') {
            $this->session->set_userdata('type_mess_code', SUCCESS_CLASS);
        } else {
            $this->session->set_userdata('type_mess_code', ERROR_CLASS);
        }
        $this->session->set_userdata('error_flag_code', $flagCode);
        $this->session->set_userdata('error_mess_code', $text);
    }

    /**
     * [view description]
     * @param  string $template [dir of template]
     * @param  [type] $dir         [dir of view]
     * @param  [type] $layout_data [data parse]
     * @return [interface]              [interface]
     */
    protected function view($template = 'default', $dir, $layout_data, $is_tracking = false)
    {
        if (strlen($dir) > 0) {
            $dir_explode = explode('/', $dir);
            if (count($dir_explode) > 1) {
                $dir = null;
                for ($i = 0; $i < count($dir_explode); $i++) {
                    if ($i == (count($dir_explode) - 2)) {
                        $dir .= $dir_explode[$i];
                        break;
                    } else {
                        $dir .= $dir_explode[$i] . '/';
                    }
                }

                $content = $this->load->view($dir . '/' . $dir_explode[count($dir_explode) - 1], $layout_data, true);
            } else {
                $content = $this->load->view($dir, $this->data, true);
            }

            $layout_data['template_name'] = $template;
            $layout_data['content'] = $content;
            $layout_data['tracking_data'] = $layout_data;
            if ($is_tracking) {
                $layout_data['is_tracking'] = true;
            }
            echo $content;
//            $this->load->view("main", $layout_data);
        } else {
            $this->session->set_userdata('type_mess_code', ERROR_CLASS);
            $this->session->set_userdata('error_flag_code', 1);
            $this->session->set_userdata('error_mess_code', "Cant not load file $dir");
        }
    }

    /**
     * [redirect description]
     * @param  [array] $segments [config controller name, method, param]
     * @return [interface]           [interface follow url parse from $segments]
     */
    protected function redirect($segments = null)
    {
        $url = site_url();
        if (!empty($segments) && (count($segments) > 0)) {
            foreach ($segments as $key => $value) {
                if ($value != null) {
                    $url .= '/' . $value;
                }
            }
        }

        redirect($url);
    }

    public function require_login()
    {
        $segments = array('users', 'login');
        $this->redirect($segments);
    }

    public function load_counter()
    {
        $this->load->model('t_counter');
        $time_now = time();    // l?u th?i gian hi?n t?i
        $time_out = 300; // kho?ng th?i gian ch? ?? tính m?t k?t n?i m?i (tính b?ng giây)
        $ip_address = $_SERVER['REMOTE_ADDR'];    // l?u l?i IP c?a k?t n?i

        $sql = "SELECT `ip_address` FROM `counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'";
        $result = $this->t_counter->query_track($sql, 1);
        if (!count($result))
            $this->t_counter->query_track("INSERT INTO `counter` VALUES ('$ip_address', NOW())");



// ??m s? ng??i ?ang online
        $query = "SELECT `ip_address` FROM `counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now";
        $online = count($this->t_counter->query_track($query), 1);


// ??m s? ng??i ghé th?m trong ngày (t? 0h ngày hôm ?ó ??n th?i ?i?m hi?n t?i)
        $query = "SELECT `ip_address` FROM `counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 2) . " AND YEAR(`last_visit`) = " . date('Y');
        $day = count($this->t_counter->query_track($query, 1));


// ??m s? ng??i ghé th?m trong tu?n (t? 0h ngày th? 2 ??n th?i ?i?m hi?n t?i)
        $week = count($this->t_counter->query_track("SELECT `ip_address` FROM `counter` WHERE WEEKOFYEAR(`last_visit`) = " . date('W') . " AND YEAR(`last_visit`) = " . date('Y'), 1));


// ??m s? ng??i ghé th?m trong tháng
        $month = count($this->t_counter->query_track("SELECT `ip_address` FROM `counter` WHERE MONTH(`last_visit`) = " . date('n') . " AND YEAR(`last_visit`) = " . date('Y'), 1));


// ??m s? ng??i ghé th?m trong n?m
        $year = count($this->t_counter->query_track("SELECT `ip_address` FROM `counter` WHERE YEAR(`last_visit`) = " . date('Y'), 1));


// ??m t?ng s? ng??i ?ã ghé th?m
        $visit = count($this->t_counter->query_track("SELECT `ip_address` FROM `counter`", 1));


        $this->data['online'] = $online;
        $this->data['day'] = $day;
        $this->data['week'] = $week;
        $this->data['month'] = $month;
        $this->data['year'] = $year;
        $this->data['visit'] = $visit;

    }


}