<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homework extends Admin_Controller{
	function __construct() {
        parent::__construct();

        $this->load->helper('file');
        // $this->load->library('mailsmsconf');
        $this->lang->load('message', 'english');
        // $this->role;
    }
	
	function index(){
		$this->session->set_userdata('top_menu', 'Home Work');
        $this->session->set_userdata('sub_menu', 'admin/homework/index');
		$data['title'] = 'Assign Homework with Class and Subject wise';
        $teacher = $this->teacher_model->get();
        $data['teacherlist'] = $teacher;
        $subject = $this->subject_model->get();
        $data['subjectlist'] = $subject;
		// $student = $this->student_model->getStudents();
        // $data['studentlist'] = $student;
        $class = $this->class_model->get();
        $data['classlist'] = $class;
		$this->form_validation->set_rules('class', 'Class', 'trim|required|xss_clean');
        $this->form_validation->set_rules('section', 'Section', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('homework_date', 'Homework Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('submission_date', 'Submission Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {  
			$this->load->model('homework_model');
			$home_work_result = $this->homework_model->get();
            $data['homeworklist'] = $home_work_result;
			$this->load->view('layout/header', $data);
			$this->load->view('admin/homework/assignHomework', $data);
			$this->load->view('layout/footer', $data);
        }else{
			$data = array(
                'class' => $this->input->post('class'),
                'section' => $this->input->post('section'),
                'subject' => $this->input->post('subject'),
                'homework_date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('homework_date'))),
                'submission_date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('submission_date'))),
                'description' => $this->input->post('description'),

            );
			$this->load->model('homework_model');
			$insert_id = $this->homework_model->add($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Homework added successfully</div>');
            redirect('admin/homework/index');
		}
		
	}
}
?>