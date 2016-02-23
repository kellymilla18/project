<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum extends CI_Controller {
	public function view_curriculum($program_code, $curriculum_year) {
		$data = array();
		$program_id = $this->program_model->getProgramID($program_code);
		$curriculum_id = $this->curriculum_model->getCurriculumID($program_id, $curriculum_year);
		$program_data = $this->program_model->getProgramData($program_id);

		$data['program_name'] = $program_data->program_name;
		$data['program_id'] = $program_id;
		$data['program_code'] = $program_code;

		$curr_data = $this->curriculum_model->getCurriculumData($curriculum_id);

		$data['curriculum_year'] = $curr_data->curriculum_year;

		$this->load->view('header');
		$this->load->view('curriculum-view', $data);
		$this->load->view('footer');
	}

	public function add_curriculum($program_code) {
		$program_id = $this->program_model->getProgramID($program_code);
		$curriculum_year = $this->input->post('curriculum_year');
		$this->curriculum_model->addCurriculum($program_id, $curriculum_year);
		redirect(base_url('index.php/program/list_of_programs'));
	}
}