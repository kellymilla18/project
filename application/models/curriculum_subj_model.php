<?php

class Curriculum_Subj_Model extends CI_Model {
	public function getSubjects($curriculum_id, $year, $semester) {
		$this->db->where('curriculum_id', $curriculum_id);
		$this->db->where('curr_year', $year);
		$this->db->where('curr_sem', $semester);
		return $this->db->get('curr_subjects');
	}

	public function addSubject($data) {
		$this->db->insert('curr_subjects', $data);
	}

	public function getCurriculumSubjects($curriculum_id) {
		$this->db->where('curriculum_id', $curriculum_id);
		return $this->db->get('curr_subjects');
	}
}