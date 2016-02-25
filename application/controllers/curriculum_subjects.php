<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_Subjects extends CI_Controller {

	public function addSubject() {
		$data['curriculum_id'] = $this->input->post('curriculum_id');
		$data['curr_sem'] = $this->input->post('semester');
		$data['curr_year'] = $this->input->post('curr_year');

		$program_id = $this->curriculum_model->getProgramID($data['curriculum_id']);
		$curriculum_year = $this->curriculum_model->getCurriculumYear($data['curriculum_id']);
		$program_code = $this->program_model->getProgramCode($program_id);
		
		$subj_code = explode(' ', $this->input->post('subj_code'))[0];

		if($this->course_model->isValidCourseCode($subj_code)) {
			$data['course_id'] = $this->course_model->getCourseID($subj_code);
			$this->curriculum_subj_model->addSubject($data);
			echo $data['curr_year'] . "-" . $data['curr_sem'];
		} else {
			echo "error";
		}
	}
}