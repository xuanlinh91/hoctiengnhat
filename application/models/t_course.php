<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_course extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'course';
    }

    public function get_total()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_total_edit()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_data($id = '')
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('ID', $id);
        $query = $this->db->get()->result_array();
        return ($query[0]);
    }


}