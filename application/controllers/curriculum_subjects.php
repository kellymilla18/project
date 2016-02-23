<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_Subjects extends CI_Controller {

	public function addSubject() {
		$curriculum_id = $this->input->post('curriculum_id');
		$semester = $this->input->post('semester');
		$curriculum_year = $this->input->post('curr_year');
		$subject_code = $this->input->post('subject_code');
		
		
	}
}