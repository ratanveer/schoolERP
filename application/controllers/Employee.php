<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Employee extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->lang->load('message', 'english');
        $this->role;
    }

    function index() {
        $this->load->view('layout/header', $data);
        $this->load->view('employee/empimport', $data);
        $this->load->view('layout/footer', $data);
    }
	//****
	//***
	// **************  Start Insert Employee Data ******************
	//***
	//****
	function create(){
		

		$this->session->set_userdata('top_menu', 'Employee Information');
        $this->session->set_userdata('sub_menu', 'employee/create');
		$employeeTypeList = $this->customlib->getEmployeeType();
        $data['employeeTypeList'] = $employeeTypeList;
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
		$bloodgroupList = $this->customlib->getBlood();
        $data['bloodgroupList'] = $bloodgroupList;
        $session = $this->setting_model->getCurrentSession();
        $this->form_validation->set_rules('emptype', 'Employee Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('birthday', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('present_address', 'Present Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('teacher_email', 'Teacher Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('employee/employeeCreate', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'emptype' => $this->input->post('emptype'),
                'name' => $this->input->post('name'),
                'employee_code' => $this->input->post('employee_code'),
                'birthday' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('birthday'))),
                'gender' => $this->input->post('gender'),
                'religion' => $this->input->post('religion'),
                'cast' => $this->input->post('cast'),
                'blood_group' => $this->input->post('blood_group'),
                'present_address' => $this->input->post('present_address'),
                'permanent_address' => $this->input->post('permanent_address'),
                'subject' => $this->input->post('subject'),
                'father_name' => $this->input->post('father_name'),
                'father_mobile_number' => $this->input->post('father_mobile_number'),
                'teacher_email' => $this->input->post('teacher_email'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'academic_year' => $this->input->post('academic_year'),
                'department' => $this->input->post('department'),
        
            );
			$this->load->model('emp_model');
            $insert_id = $this->emp_model->add($data);
           
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Employee added Successfully</div>');
            redirect('employee/create');
        }
	}
	
	//****
	//***
	//**************** End Insert Employee Data ****************
	//***
	//****
	////////////////////////////////////////////////////////////////////////////////////////////
	//****
	//***
	//**************** Start List Employee Data ****************
	//***
	//****
	function view() {
		// $this->session->set_userdata('top_menu', 'Employee Information ');
        // $this->session->set_userdata('sub_menu', 'employee/view');
		$this->load->model('emp_model');
		$employee_result = $this->emp_model->get();
        $data['employeelist'] = $employee_result;
		$this->load->view('layout/header', $data);
            $this->load->view('employee/employeeList', $data);
            $this->load->view('layout/footer', $data);
		
	}
	
	/////////////////////////////////////////////////////////////////////////////////
	function show($id) {
		$this->load->model('emp_model');
		$employee = $this->emp_model->get($id);
        $data['employee'] = $employee;
		 $this->load->view('layout/header', $data);
        $this->load->view('employee/employeeShow', $data);
        $this->load->view('layout/footer', $data);
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	function edit($id) {
		$this->session->set_userdata('top_menu', 'Employee Information');
        $this->session->set_userdata('sub_menu', 'employee/edit');
		 $data['id'] = $id;		
		$this->load->model('emp_model');
		$employee = $this->emp_model->get($id);
        $data['employee'] = $employee;
		
		$session = $this->setting_model->getCurrentSession();
		
		$genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
		
		$employeeTypeList = $this->customlib->getEmployeeType();
        $data['employeeTypeList'] = $employeeTypeList;
		
		$bloodgroupList = $this->customlib->getBlood();
        $data['bloodgroupList'] = $bloodgroupList;
		
		$this->form_validation->set_rules('emptype', 'Employee Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('birthday', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('present_address', 'Present Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('teacher_email', 'Teacher Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		 $this->load->view('layout/header', $data);
            $this->load->view('employee/employeeEdit', $data);
            $this->load->view('layout/footer', $data);
		}else {
            $data = array(
				'id' => $id,
                'emptype' => $this->input->post('emptype'),
                'name' => $this->input->post('name'),
                'employee_code' => $this->input->post('employee_code'),
                'birthday' => date('m-d-Y', $this->customlib->datetostrtotime($this->input->post('birthday'))),
                'gender' => $this->input->post('gender'),
                'religion' => $this->input->post('religion'),
                'cast' => $this->input->post('cast'),
                'blood_group' => $this->input->post('blood_group'),
                'present_address' => $this->input->post('present_address'),
                'permanent_address' => $this->input->post('permanent_address'),
                'subject' => $this->input->post('subject'),
                'father_name' => $this->input->post('father_name'),
                'father_mobile_number' => $this->input->post('father_mobile_number'),
                'teacher_email' => $this->input->post('teacher_email'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'academic_year' => $this->input->post('academic_year'),
                'department' => $this->input->post('department'),
            );
			
           $this->emp_model->add($data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success ">Employee Record Updated successfully</div>');
            redirect('employee/view');
	}
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	function delete($id) {
		$this->load->model('emp_model');
        $this->emp_model->remove($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success "> Record Deleted Successfully</div>');
        redirect('employee/view');
    }
	////////////////////////////////////////////////////////////////////////////////////////////
	
	function exportformat() {
        $array = array(
            array("emptype","name", "employee_code",
                "birthday(dd-mm-yyyy)", "gender",
                "religion", "cast",
                "blood_group", "present_address", "permanent_address", "subject",
                "father_name", "father_mobile_number",
                "teacher_email", "phone",
                "email",
                "password", "academic_year", "department"),
        );
        $this->load->helper('csv');
        echo array_to_csv($array, 'import_employee_sample_file.csv');
    }
	
	
	///////////////////////////////////////////////////////////////////////////////////////////
	
	
	//****
	//***
	// **************  Start Employee Import Data ******************
	//***
	//****
    function empimport() {
	   
		$this->session->set_userdata('top_menu', 'Employee Information');
        $this->session->set_userdata('sub_menu', 'employee/empcreate');
       $session = $this->setting_model->getCurrentSession();
		//$this->form_validation->set_rules('emptype', 'Employee Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_csv_upload');
        if ($this->form_validation->run() == False) {
            $this->load->view('layout/header', $data);
            $this->load->view('employee/empimport', $data);
            $this->load->view('layout/footer', $data);
        } else {	        
           $session = $this->setting_model->getCurrentSession();
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $file = $_FILES['file']['tmp_name'];
                $this->load->library('CSVReader');
                $result = $this->csvreader->parse_file($file);	
                for ($i = 1; $i <= count($result); $i++){				
					$this->load->model('emp_model');
					//$result[$i]['emptype']=$this->input->post('emptype');
                    $insert_id = $this->emp_model->add($result[$i]);
                }
                $data['csvData'] = $result;
            }
          $this->session->set_flashdata('msg', '<div student="alert alert-success text-center">Employee imported successfully</div>');
           redirect('employee/empimport');
        }
    }

    function handle_csv_upload() {
        $error = "";
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('csv');
            $mimes = array('text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt');
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if (!in_array($_FILES['file']['type'], $mimes)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', 'File type not allowed');
                return false;
            }
            if (!in_array($extension, $allowedExts)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', 'Extension not allowed');
                return false;
            }
            if ($error == "") {
                return true;
            }
        } else {
            $this->form_validation->set_message('handle_csv_upload', 'Please Select file');
            return false;
        }
    }
	//****
	//***
	//**************** End Employee Import ****************
	//***
	//****
	
}

?>