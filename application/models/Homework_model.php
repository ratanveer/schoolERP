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
		$sql = "SELECT home_work.id,classes.class,sections.section,subjects.name AS subject,home_work.homework_date,home_work.submission_date,home_work.description FROM home_work INNER JOIN classes ON classes.id = home_work.class INNER JOIN sections ON sections.id = home_work.section INNER JOIN subjects ON subjects.id = home_work.subject";
        $query = $this->db->query($sql);
		return $query->result_array();
    }
	public function getedit($id = null) {
		$sql = "SELECT home_work.id,classes.class,sections.section,subjects.name AS subject,home_work.homework_date,home_work.submission_date,home_work.description FROM home_work INNER JOIN classes ON classes.id = home_work.class INNER JOIN sections ON sections.id = home_work.section INNER JOIN subjects ON subjects.id = home_work.subject where home_work.id = '".$id."'";
        $query = $this->db->query($sql);
		return $query->result_array();
    }
	public function getparenthomework($class_id,$section_id) {
		$sql = "SELECT class_sections.class_id,class_sections.section_id,home_work.id,classes.class,sections.section,subjects.name AS subject,home_work.homework_date,home_work.submission_date,home_work.description FROM home_work INNER JOIN classes ON classes.id = home_work.class INNER JOIN sections ON sections.id = home_work.section INNER JOIN subjects ON subjects.id = home_work.subject INNER JOIN class_sections ON class_sections.class_id = home_work.class WHERE class_sections.class_id = '".$class_id."' AND class_sections.section_id = '".$section_id."'";
        $query = $this->db->query($sql);
		return $query->result_array();
    }
	public function gethomework($id = null) {
		$sql = "SELECT home_work.id,classes.class,sections.section,subjects.name AS subject,home_work.homework_date,home_work.submission_date,home_work.description FROM home_work INNER JOIN classes ON classes.id = home_work.class INNER JOIN sections ON sections.id = home_work.section INNER JOIN subjects ON subjects.id = home_work.subject WHERE home_work.id = '".$id."'";
        $query = $this->db->query($sql);
		return $query->result_array();
    }
	public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('home_work');
    }
}

?>