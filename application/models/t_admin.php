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
        $this->table_name = 'tbl_admin_users';
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


}