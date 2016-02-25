<?php

class Prerequisite_Model extends CI_Model {
	public function addPrerequisite($data) {
		$this->db->insert('prerequisite', $data);
	}

	public function getPrerequisites($course_id) {
		$this->db->where('course_id', $course_id);
		return $this->db->get('prerequisite');
	}

}