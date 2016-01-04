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

    function list_all($number, $offset){
        $query =  $this->db->get($this->table_name,$number,$offset);
        return $query->result_array();
    }

    function list_all_new(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->order_by('DATETIME', 'DESC');
        $this->db->limit(R_BLOG_LIMIT);
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function get_data($id = 1)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('ID', $id);
        $query = $this->db->get()->result_array();
        return ($query[0]);
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

    public function get_last_blog($limit = HOME_BLOG_NUM)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->limit($limit);
        $this->db->order_by('DATETIME', 'desc');
        $query = $this->db->get()->result_array();
        return ($query);
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


}