<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'admin';
    }

    public function get_data($user = null, $pass = null)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $query = $this->db->get()->result_array();
        return ($query);
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

    function update_data_by_id($data = array(), $id)
    {
        if (is_null($data) || !is_array($data)) {

            return null;
        }
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
        if ($this->db->affected_rows() > 0) {

            return true;
        } else {

            return false;
        }
    }

}