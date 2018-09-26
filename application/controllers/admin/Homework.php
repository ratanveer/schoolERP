<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homework extends Admin_Controller{
	function __construct() {
        parent::__construct();

        $this->load->helper('file');
        $this->lang->load('message', 'english');
    }
	/////////////// Insert Homework //////////////////////////
	function index(){
		$this->session->set_userdata('top_menu', 'Home Work');
        $this->session->set_userdata('sub_menu', 'admin/homework/index');
		$data['title'] = 'Assign Homework with Class and Subject wise';
        // $teacher = $this->teacher_model->get();
        // $data['teacherlist'] = $teacher;
        // $subject = $this->subject_model->get();
        // $data['subjectlist'] = $subject;
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
	public function view($id) {
        $this->load->model('homework_model');
		$home_work_results = $this->homework_model->gethomework($id);
		$data['homeworklist'] = $home_work_results;
		
        $this->load->view('layout/header', $data);
        $this->load->view('admin/homework/homeworkShow', $data);
        $this->load->view('layout/footer', $data);
    }
	public function delete($id){
		$data['title'] = 'Homework List';
		$this->load->model('homework_model');
        $this->homework_model->remove($id);
        redirect('admin/homework/index');
		
	}
	public function edit($id){
		
		// $data['title'] = 'Assign Homework with Class and Subject wise';
		$data['id'] = $id;	
		// $this->load->model('class_model');
		$classList = $this->class_model->get();
        $data['classList'] = $classList;
		$this->load->model('homework_model');
		$home_work_result = $this->homework_model->getedit($id);
        $data['homeworklist'] = $home_work_result;
		// echo "<pre/>";
		// print_r($classList);
		// exit();
		// $this->form_validation->set_rules('class', 'Class', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('section', 'Section', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('homework_date', 'Homework Date', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('submission_date', 'Submission Date', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		// if ($this->form_validation->run() == FALSE) {  
			// $this->load->model('homework_model');
			// $home_work_result = $this->homework_model->get();
            // $data['homeworklist'] = $home_work_result;
			$this->load->view('layout/header', $data);
			$this->load->view('admin/homework/homeworkEdit', $data);
			$this->load->view('layout/footer', $data);
        // }else{
			
			// $data = array(
				// 'id' => $id,
                // 'class' => $this->input->post('class'),
                // 'section' => $this->input->post('section'),
                // 'subject' => $this->input->post('subject'),
                // 'homework_date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('homework_date'))),
                // 'submission_date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('submission_date'))),
                // 'description' => $this->input->post('description'),

            // );
			// $this->load->model('homework_model');
			// $insert_id = $this->homework_model->add($data);
			// $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Homework added successfully</div>');
            // redirect('admin/homework/index');
		// }
	}
}
?>