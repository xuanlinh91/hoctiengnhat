<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('t_volca');
        $this->load->model('t_gram');
        $this->load->model('t_user');
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

    public function paid($id = null)
    {
        if ($this->session->userdata('is_user_login')) {
            $data_post = $this->t_blog->get_data_by_id($id);
            $id_user = $this->session->userdata('id_user');
            $data_user = $this->t_user->get_data_by_id($id_user);
            if ($data_user['GOLD'] < $data_post['FEE']) {
                $this->data['error'] = 'Số gold trong tài khoản hiện không đủ, vui lòng nạp thêm!';
                $this->view('default', 'docs', $this->data);
            } else {
                $this->t_user->update_data_by_id(array('GOLD' => $data_user['GOLD'] - $data_post['FEE']), $id_user);
                $paid_update = $data_post['PAID'].';'.$id_user;
                $this->t_blog->update_data_by_id(array('PAID' => $paid_update), $id);
                redirect('blog/docs/'.$id);
            }
        } else {
            redirect('login/login');
        }
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

                if (!$this->session->userdata('is_user_login')) {
                    $this->data['course'] = $cate;
                    $this->data['login'] = 'true';
                    $this->view('default', 'docs', $this->data);
                    return;
                } else {
                    $paid = $docs['PAID'];
                    if ($paid === 0 || $paid === NULL) {
                        $this->data['pay'] = 'true';
                        $this->data['id_paid'] = $list;
                        $this->view('default', 'docs', $this->data);
                        return;

                    } elseif(count($paid) > 0) {
                        $paid = explode(';',$paid);
                        $result = array_search($this->session->userdata('id_user'), $paid);
                        if ($result === FALSE) {
                            $this->data['pay'] = 'true';
                            $this->data['id_paid'] = $list;
                            $this->view('default', 'docs', $this->data);
                            return;
                        } else {
                            $id = $list;
                            $blog = $this->t_blog->get_data_join_category($id);
                            if (substr($blog['ID_NAME'], 0, 2) == 'DT') {
                                $this->data['course'] = substr($blog['ID'], 2);
                                $this->data['blog'] = $blog;
                                $this->view('default', 'docs', $this->data);
                            }
                        }

                    }

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
