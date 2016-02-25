<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum extends CI_Controller {
	public function view_curriculum($program_code, $curriculum_year) {
		$data = array();
		$program_id = $this->program_model->getProgramID($program_code);
		$curriculum_id = $this->curriculum_model->getCurriculumID($program_id, $curriculum_year);
		$program_data = $this->program_model->getProgramData($program_id);

		$data['curriculum_id'] = $curriculum_id;
		$data['program_name'] = $program_data->program_name;
		$data['program_id'] = $program_id;
		$data['program_code'] = $program_code;
		$data['curriculum_year'] = $curriculum_year;

		$curr_data = $this->curriculum_model->getCurriculumData($curriculum_id);
		
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

	public function pdf_view($program_code, $curriculum_year) {
		$program_id = $this->program_model->getProgramID($program_code);
		$curriculum_id = $this->curriculum_model->getCurriculumID($program_id, $curriculum_year);
		$program_data = $this->program_model->getProgramData($program_id);

		$data['curriculum_id'] = $curriculum_id;
		$data['program_name'] = $program_data->program_name;
		$data['program_id'] = $program_id;
		$data['curriculum_year'] = $curriculum_year;

		$data['subjects'] = array();

		for($x = 1; $x <= 4; $x++) {
			for($y = 1; $y <= 3; $y++) {
				$subjects = $this->curriculum_subj_model->getSubjects($curriculum_id, $x, $y);
				$z = 0;
				foreach ($subjects->result() as $subject) {
					$subj_data = $this->course_model->getCourseData($subject->course_id);
					$prereqs = $this->prerequisite_model->getPrerequisites($subject->course_id);
					$data['subjects'][$x][$y][$z]['course_code'] = $subj_data->course_code;
					$data['subjects'][$x][$y][$z]['course_name'] = $subj_data->course_name;
					$data['subjects'][$x][$y][$z]['credit_units'] = $subj_data->credit_units;
					$data['subjects'][$x][$y][$z]['prerequisites'] = "";
					$first = true;
					foreach ($prereqs->result() as $prereq) {
						if(!$first) $data['subjects'][$x][$y][$z]['prerequisites'] .= ', ';
						$data['subjects'][$x][$y][$z]['prerequisites'] .= $this->course_model->getCourseCode($prereq->course_id_pre);
						$first = false;
					}
					if($data['subjects'][$x][$y][$z]['prerequisites'] == "")
						$data['subjects'][$x][$y][$z]['prerequisites'] = "NONE";
					$z++;
				}		
			}
		}

		$pdf = $this->load->view('curriculum-pdf-view', $data, true);
		$this->htmlpdf->convert($pdf, $program_code, $curriculum_year);
	}

	public function tree_view($program_code, $curriculum_year) {
		$program_id = $this->program_model->getProgramID($program_code);
		$curriculum_id = $this->curriculum_model->getCurriculumID($program_id, $curriculum_year);
		$program_data = $this->program_model->getProgramData($program_id);

		$data['curriculum_id'] = $curriculum_id;
		$data['program_name'] = $program_data->program_name;
		$data['program_id'] = $program_id;
		$data['curriculum_year'] = $curriculum_year;

		$this->load->view('header');
		$this->load->view('curr-tree-view', $data);
		$this->load->view('footer');
	}
}