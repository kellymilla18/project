<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function addPrerequisite() {
		$subject_code = $this->input->post('subject_code');
		$subject_code = explode(' ', $subject_code)[0];
		if($this->course_model->isValidCourseCode($subject_code)) {
			$course_id = $this->course_model->getCourseID($subject_code);

			$course = $this->course_model->getCourseData($course_id);
			$data['course_id'] = $course_id;
			$data['course_code'] = $course->course_code;
			$data['course_name'] = $course->course_name;
			$prereq_view = $this->load->view('prereq-view', $data, true);
			echo $prereq_view;
		} else {
			echo "error";
		}
	}
}