<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_category extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'category';
    }

    public function get_total()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', 0);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_dropdown()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('DELETE', 0);
        $this->db->where('PARENT', NULL);
        $this->db->where('ID_NAME != ', 'AB');
        $query = $this->db->get()->result_array();
        return ($query);
    }


    public function get_total_edit()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('ID !=', 'HB');
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

    public function get_data($id = '')
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('ID', $id);
        $query = $this->db->get()->result_array();
        if (count($query)>0) {
            return ($query[0]);
        } else {
            return null;
        }
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

    public function get_all_bs()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('PARENT', 'BS');
        $this->db->where('ID_NAME !=', 'TC');
        $this->db->where('ID_NAME !=', 'PL');
        $query = $this->db->get()->result_array();
        if (count($query)>0) {
            return ($query);
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
        $query =  $query->result_array();
        if (count($query)>0) {
            return $query[0];
        } else return NULL;

    }

}