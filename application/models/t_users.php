<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_users extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'users';
    }

    public function get_total()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('deleted', 'N');
        $query = $this->db->get()->result_array();
        return ($query);
    }

    function list_all($number, $offset){
        $query =  $this->db->get($this->table_name,$number,$offset);
        return $query->result_array();
    }

    public function get_data_by_id($id = null)
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


}