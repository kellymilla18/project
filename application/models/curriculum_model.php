<?php

class Curriculum_Model extends CI_Model {
	public function getCurriculums($program_id) {
		$this->db->where('program_id', $program_id);
		return $this->db->get('curriculum');
	}

	public function addCurriculum($program_id, $curriculum_year) {
		$data['program_id'] = $program_id;
		$data['curriculum_year'] = $curriculum_year;
		$data['last_modified'] =  date("Y-m-d H:i:s");
		$this->db->insert('curriculum', $data);
	}

	public function getCurriculumData($curriculum_id) {
		$this->db->where('curriculum_id', $curriculum_id);
		return $this->db->get('curriculum')->row();
	}

	public function getCurriculumID($program_id, $curriculum_year) {
		$this->db->where('program_id', $program_id);
		$this->db->where('curriculum_year', $curriculum_year);
		return $this->db->get('curriculum')->row()->curriculum_id;
	}

	public function getProgramID($curriculum_id) {
		$this->db->where('curriculum_id', $curriculum_id);
		return $this->db->get('curriculum')->row()->program_id;
	}

	public function getCurriculumYear($curriculum_id) {
		$this->db->where('curriculum_id', $curriculum_id);
		return $this->db->get('curriculum')->row()->curriculum_year;
	}
}