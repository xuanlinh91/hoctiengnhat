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

        $CI->load->library('session');
    }

    public function set_page_title($title = '')
    {
        if (!empty($title)) {
            $this->page_title = $title . PREFIX_SUB_PAGE . SUB_PAGE;
        } else {
            $title = "Home page";
            $this->page_title = $title . PREFIX_SUB_PAGE . SUB_PAGE;
        }
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

            $this->load->view("main", $layout_data);
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


}