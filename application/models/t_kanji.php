<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_kanji extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'kanji';
    }


    public function get_total_record($course)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where('COURSE', $course);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_total_lesson($course)
    {
        $this->db->select("*");
        if($course != null){
            $this->db->where('course', $course);
        }
        $this->db->from($this->table_name);
        $query = $this->db->get()->result_array();
        return (count($query));
    }

    function list_all($number, $offset, $course){
        if ($course != null) {
            $this->db->where('course', $course);
        }
        $query =  $this->db->get($this->table_name,$number,$offset);
        return $query->result_array();
    }


    public function get_data_by_id($id = null)
    {
        if ($id != null) {
            $this->db->select("*");
            $this->db->where('ID', $id);
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

    function set_data($data = array())
    {
        if (is_null($data) || !is_array($data)) {
            return null;
        }
        $this->db->insert($this->table_name, $data);
        $id = $this->db->insert_id();
        return $id;
    }



}