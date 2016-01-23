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
        $blog = $this->t_blog->get_data_join_category($id);
        if ($blog != null) {
            if (substr($blog['ID'], 0, 2) == 'DT') {
                $this->data['course'] = substr($blog['ID'], 2);
            }
            $this->data['blog'] = $blog;
            $this->view('default', 'blog_template', $this->data);
        } else {
            redirect('blog/blog_list');
        }
    }

    public function blog_list()
    {
        $total = count($this->t_blog->list_all_cate(null, null, array('CATEGORY' => 'HB')));
        $config['base_url'] = base_url('index.php/blog/blog_list');
        $config['total_rows'] = $total;
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $this->table->set_heading('id','name');
        $page_int = $this->uri->segment($config['uri_segment']);
        $this->data['data_get'] = $this->t_blog->list_all_cate($config['per_page'], $page_int, array('CATEGORY' => 'HB'));
        $this->view('default', 'docs', $this->data);
    }

    public function docs($list = null, $cate = null)
    {
        $this->set_page_title('Tài liệu - Đề thi');
        if ($list == 'list' && $cate != null) {
            $cate = strtoupper($cate);
            switch ($cate) {
                case 'N5':
                    $cate_id = 'DTN5';
                    break;
                case 'N4':
                    $cate_id = 'DTN4';
                    break;
                case 'N3':
                    $cate_id = 'DTN3';
                    break;
                default :
                    $cate_id = 'DTN5';
                    break;
            }

            if (!$this->session->userdata('is_user_login')) {
                $this->data['course'] = $cate;
                $this->data['login'] = 'true';
                $this->view('default', 'docs', $this->data);
                return;
            } else {
                $this->data['course'] = $cate;
                $this->data['pay'] = 'true';
                $this->view('default', 'docs', $this->data);
                return;
            }

            $total = count($this->t_blog->get_data_by_property('*', array('CATEGORY' => $cate_id)));
            $config['base_url'] = base_url('index.php/blog/docs/'.$cate);
            $config['total_rows'] = $total;
            $config['per_page'] = 5;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $this->table->set_heading('id','name');
            $page_int = $this->uri->segment($config['uri_segment']);
            $this->data['data_get'] = $this->t_blog->list_all_cate($config['per_page'], $page_int, array('CATEGORY' => $cate_id));
            $this->data['course'] = $cate;
            $this->view('default', 'docs', $this->data);

        } elseif($list != null && $cate == null) {
            if ($list == 'list' && $cate == null) {
                $total = count($this->t_blog->all_docs());
                $config['base_url'] = base_url('index.php/blog/docs/'.$cate);
                $config['total_rows'] = $total;
                $config['per_page'] = 5;
                $config['uri_segment'] = 4;
                $this->pagination->initialize($config);
                $this->table->set_heading('id','name');
                $page_int = $this->uri->segment($config['uri_segment']);
                $this->data['data_get'] = $this->t_blog->all_docs($config['per_page'], $page_int);
                $this->data['course'] = $cate;
                $this->view('default', 'docs', $this->data);

            } else {
                $docs = $this->t_blog->get_data_by_id($list);
                if (count($docs) != 0) {
                    $id = $list;
                    $blog = $this->t_blog->get_data_join_category($id);
                    if (substr($blog['ID_NAME'], 0, 2) == 'DT') {
                        $this->data['course'] = substr($blog['ID'], 2);
                        $this->data['blog'] = $blog;
                        $this->view('default', 'docs', $this->data);

                    }

                } else {
                    redirect('blog/docs/list');
                }
            }

        }
    }

    public function more()
    {
        $this->set_page_title('Phụ lục');
        $more = $this->t_blog->more_content();
        $this->data['data_get'] = $more;
        $this->view('default', 'more', $this->data);
    }
}
