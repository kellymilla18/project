<?php

class Program_Model extends CI_Model {
	public function getProgramList() {
		return $this->db->get('program');
	}

	public function getProgramID($program_code) {
		$this->db->where('program_code', $program_code);
		return $this->db->get('program')->row()->program_id;
	}

	public function getProgramData($program_id) {
		$this->db->where('program_id', $program_id);
		return $this->db->get('program')->row();
	}

	public function getProgramCode($program_id) {
		$this->db->where('program_id', $program_id);
		return $this->db->get('program')->row()->program_code;
	}
}