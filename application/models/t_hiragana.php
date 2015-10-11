<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_hiragana extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'hiragana';
    }

    public function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
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

    function set_data($data = array(), $result = 0)
    {
        if (is_null($data) || !is_array($data)) {

            return null;
        }
        $this->db->insert($this->table_name, $data);
        $id = $this->db->insert_id();
        return $id;
    }

}