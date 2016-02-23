<?php

class Course_Model extends CI_Model {
	public function getAllCourses() {
		return $this->db->get('course');
	}

	public function addCourse($data) {
		$this->db->insert('course', $data);
	}

	public function getCourseData($course_id) {
		$this->db->where('course_id', $course_id);
		return $this->db->get('course')->row();
	}
}