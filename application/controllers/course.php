<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {
	public function list_of_courses(){
		$courses = $this->course_model->getAllCourses();

		$this->load->view('header');
		$this->load->view('course_list');
		$this->load->view('footer');
	}

	public function add_course() {
		$data['course_code'] = $this->input->post('course-code');
		$data['course_name'] = $this->input->post('course-name');
		$data['credit_units'] = $this->input->post('credit-units');
		$this->course_model->addCourse($data);
		redirect(base_url('index.php/course/list_of_courses'));
	}
}