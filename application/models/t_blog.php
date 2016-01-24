<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_blog extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'blog';
    }

    public function get_total()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', 0);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_total_publisher($id_publisher = null)
    {
        if ($id_publisher != NULL) {
            $this->db->select("*");
            $this->db->from($this->table_name);
            $this->db->where('DELETE', 0);
            $this->db->where('AUTHOR', $id_publisher);
            $query = $this->db->get()->result_array();
            return ($query);
        } else {
            return null;
        }
    }

    function list_all($number, $offset){
        $query =  $this->db->get($this->table_name,$number,$offset);
        return $query->result_array();
    }

    function list_all_publisher($id_publisher = null, $number, $offset){
        if ($id_publisher != null) {
            $this->db->where('AUTHOR', $id_publisher);
            $query =  $this->db->get($this->table_name,$number,$offset);
            return $query->result_array();
        } else {
            return null;
        }
    }

    function blog_list_all($number, $offset){
        $query =  $this->db->get($this->table_name,$number,$offset);
        return $query->result_array();
    }

    function list_all_cate($number, $offset, $where = array()){
        if (!is_null($where) && is_array($where)) {
            $this->db->where($where);
            $this->db->where('DELETE', 0);
        }
        $query =  $this->db->get($this->table_name,$number,$offset);
        return $query->result_array();
    }

    function list_all_new(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('CATEGORY','HB');
        $this->db->order_by('DATETIME', 'DESC');
        $this->db->limit(R_BLOG_LIMIT);
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function get_data($id = 1)
    {
        $this->db->select("*, ");
        $this->db->from($this->table_name);
//        $this->db->join('category', 'blog.CATEGORY = category.ID');
        $this->db->where('ID', $id);
        $query = $this->db->get()->result_array();
        if (count($query) > 0) {
            return ($query[0]);
        } else {
            return null;
        }
    }

    public function get_data_join_category($id = 1)
    {
        $this->db->select("*, category.CATEGORY as CATE_NAME");
        $this->db->from($this->table_name);
        $this->db->join('category', 'blog.CATEGORY = category.ID_NAME');
        $this->db->where('blog.ID', $id);
        $query = $this->db->get()->result_array();
        if (count($query) > 0) {
            return ($query[0]);
        } else {
            return null;
        }
    }

    function get_data_by_property($select, $where = array())
    {
        if (!is_null($where) && is_array($where)) {
            $this->db->where($where);
            $this->db->where('DELETE', 0);
        } else {
            return null;
        }
        $this->db->select($select);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }

    function get_data_by_id($id = null)
    {
        if ($id != null) {
            $this->db->select("*");
            $this->db->where('id', $id);
            $this->db->from($this->table_name);
            $query = $this->db->get()->result_array();
            return ($query[0]);
        } else {
            return null;
        }
    }


    public function get_data_cate($cateid = 'HB')
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('CATEGORY', $cateid);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_data_limit($limit = DEFAULT_NUMBER_CHARACTER)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->limit($limit, 0);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_last_home_blog($limit = HOME_BLOG_NUM)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('CATEGORY', 'HB');
        $this->db->limit($limit);
        $this->db->order_by('DATETIME', 'desc');
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_last_home_more($limit = HOME_BLOG_NUM)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('CATEGORY', 'PL');
        $this->db->limit($limit);
        $this->db->order_by('DATETIME', 'desc');
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_last_home_docs()
    {
        $result = array();
        $this->db->select("ID, TITLE, CATEGORY, PREVIEW, THUMB");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', '0');
        $this->db->where('CATEGORY', 'DTN5');
        $this->db->order_by('DATETIME', 'DESC');
        $query1 = $this->db->get()->result_array();
        if (count($query1) > 0 ) {
            array_push($result, $query1[0]);
        }
        $this->db->select("ID, TITLE, CATEGORY, PREVIEW, THUMB");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', '0');
        $this->db->where('CATEGORY', 'DTN4');
        $this->db->order_by('DATETIME', 'DESC');
        $query2 = $this->db->get()->result_array();
        if (count($query2) > 0 ) {
            array_push($result, $query2[0]);
        }
        $this->db->select("ID, TITLE, CATEGORY, PREVIEW, THUMB");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', '0');
        $this->db->where('CATEGORY', 'DTN3');
        $this->db->order_by('DATETIME', 'DESC');
        $query3 = $this->db->get()->result_array();
        if (count($query3) > 0 ) {
            array_push($result, $query3[0]);
        }
        return ($result);

    }

    function set_data($data = array())
    {
        if (is_null($data) || !is_array($data)) {
            return null;
        }
        $this->db->insert($this->table_name, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    function update_data_by_id($data = array(), $id)
    {
        if (is_null($data) || !is_array($data)) {

            return null;
        }
        $this->db->where('ID', $id);
        $this->db->update($this->table_name, $data);
        if ($this->db->affected_rows() > 0) {

            return true;
        } else {

            return false;
        }
    }

    function all_docs($number = null, $offset = null){
        $sql = "select * from `blog` where (`CATEGORY` = 'DTN5' or `CATEGORY` = 'DTN4' or `CATEGORY` = 'DTN3') and `DELETE` = 0";
        if ($number != null && $offset != null) {
            $sql = $sql . " LIMIT ". $number .", ".$offset;
        } elseif($offset != null) {
            $sql = $sql . " LIMIT ". $offset;
        }

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function more_content()
    {
        $sql = "select * from `blog` where `CATEGORY` = 'PL' and `DELETE` = 0";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    function r_docs(){
        $result = array();
        $this->db->select("ID, TITLE, CATEGORY");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', '0');
        $this->db->where('CATEGORY', 'DTN5');
        $this->db->order_by('DATETIME', 'DESC');
        $query1 = $this->db->get()->result_array();
        if (count($query1) > 0) {
            array_push($result, $query1[0]);
        }
        $this->db->select("ID, TITLE, CATEGORY");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', '0');
        $this->db->where('CATEGORY', 'DTN4');
        $this->db->order_by('DATETIME', 'DESC');
        $query2 = $this->db->get()->result_array();
        if (count($query2) > 0) {
            array_push($result, $query2[0]);
        }
        $this->db->select("ID, TITLE, CATEGORY");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', '0');
        $this->db->where('CATEGORY', 'DTN3');
        $this->db->order_by('DATETIME', 'DESC');
        $query3 = $this->db->get()->result_array();
        if (count($query3) > 0) {
            array_push($result, $query3[0]);
        }
        return ($result);

    }

}