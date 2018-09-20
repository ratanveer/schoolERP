<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_date = $this->setting_model->getDateYmd();
    }

    public function add($data) {

        if (isset($data['id'])) {
            $this->db->where('id',$data['id']);
            $this->db->update('employee_csv', $data);
			
        } else {
            $this->db->insert('employee_csv', $data);			
            return $this->db->insert_id();	
        }
    }
	 // function update($data) {
            // $this->db->where('id',$data['id']);
            // $this->db->update('employee_csv', $data);
			 // print_r($data);
			 // exit();
    // }
	public function get($id = null) {
        $this->db->select()->from('employee_csv');
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
	public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('employee_csv');
    }
	// public function addteacher($data) {

        // if (isset($data['id'])) {
            // $this->db->where('id', $data['id']);
            // $this->db->update('teachers', $data);
        // }else{
			// $this->db->insert('teachers', $data);
            // return $this->db->insert_id();	
        // }
    // }
}
