<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *T_User
 *Description: model manage t_purpose
 * @author quanhm
 */
Class T_gram extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'gram';
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

    public function get_lesson($lesson = 1)
    {
        $this->db->select("*");
        $this->db->where('course', $this->course);
        $this->db->where('lesson', $lesson);
        $this->db->from($this->table_name);
        $query = $this->db->get()->result_array();
        if (count($query) > 0) {
            return ($query[0]);
        } else {
            return null;
        }
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

    public function get_data_limit($limit = DEFAULT_NUMBER_CHARACTER)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->limit($limit, 0);
        $query = $this->db->get()->result_array();
        return ($query);
    }

    public function get_last_lesson_id($course = null){
        if($course != null){
            $this->db->select("max(`lesson`) as max_id");
            $this->db->where('course', $course);
            $this->db->from($this->table_name);
            $query = $this->db->get()->result_array();
            return ($query[0]);

        }
    }

    public function get_first_lesson_id($course = null){
        if($course != null){
            $this->db->select("min(`lesson`) as min_id");
            $this->db->where('course', $course);
            $this->db->from($this->table_name);
            $query = $this->db->get()->result_array();
            return ($query[0]);

        }
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