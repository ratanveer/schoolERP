<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homework_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('home_work', $data);
        } else {
            $this->db->insert('home_work', $data);
            return $this->db->insert_id();
        }
    }
	public function get($id = null) {
        $this->db->select()->from('home_work');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }	

}

?>