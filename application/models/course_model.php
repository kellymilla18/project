<?php

class Course_Model extends CI_Model {
	public function getAllCourses() {
		return $this->db->get('course');
	}

	public function addCourse($data) {
		$this->db->insert('course', $data);
		return mysql_insert_id();
	}

	public function getCourseData($course_id) {
		$this->db->where('course_id', $course_id);
		return $this->db->get('course')->row();
	}

	public function getCourseID($course_code) {
		$this->db->where('course_code', $course_code);
		return $this->db->get('course')->row()->course_id;
	}

	public function getCourseCode($course_id) {
		$this->db->where('course_id', $course_id);
		return $this->db->get('course')->row()->course_code;
	}

	public function  isValidCourseCode($course_code) {
		$this->db->where('course_code', $course_code);
		return ($this->db->get('course')->num_rows() != 0);
	}

	public function getCourseName($course_id) {
		$this->db->where('course_id', $course_id);
		return $this->db->get('course')->row()->course_name;
	}
}