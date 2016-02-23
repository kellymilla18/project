<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program extends CI_Controller {
	public function index() {
		redirect(base_url('index.php/program/list_of_programs'));
	}

	public function list_of_programs() {
		$program_list = $this->program_model->getProgramList();
		foreach ($program_list->result() as $program) {
			$programs['program'][$program->program_code]['program_name'] = $program->program_name;
			$programs['program'][$program->program_code]['program_desc'] = $program->program_desc;
		}

		$this->load->view('header');
		$this->load->view('program_list', $programs);
		$this->load->view('footer');
	}
}