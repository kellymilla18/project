<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {
	public function getAllCourses() {
		$courses = $this->course_model->getAllCourses();

		$data = array();
		$x = 0;

		foreach ($courses->result() as $course) {
			$data[$x]['course-id'] = $course->course_id;
			$data[$x]['course-code'] = $course->course_code;
			$data[$x]['course-name'] = $course->course_name;
			$data[$x]['credit-units'] = $course->credit_units;
			$data[$x]['prerequisites'] = "";
			$prereqs = $this->prerequisite_model->getPrerequisites($course->course_id);
			$first = true;
			foreach($prereqs->result() as $prereq) {
				if(!$first)
					$data[$x]['prerequisites'] .= ", ";	
				$data[$x]['prerequisites'] .= $this->course_model->getCourseCode($prereq->course_id_pre);
				$first = false;
			}
			if($prereqs->num_rows() == 0)
				$data[$x]['prerequisites'] = "NONE";		
			$x++;
		}

		echo json_encode($data);
	}

	public function getCurriculums($course_code) {
		$program_id = $this->program_model->getProgramID($course_code);
		$curriculums = $this->curriculum_model->getCurriculums($program_id);

		$pass['program_code'] = $course_code;
		$data = array();
		$x = 0;
		foreach ($curriculums->result() as $curriculum) {
			$data[$x]['curriculum_id'] = $curriculum->curriculum_id;
			$data[$x]['curriculum_year'] = $curriculum->curriculum_year;
			$data[$x]['date_created'] = date_format(date_create($curriculum->date_created),"n/j/Y g:i A");
			$data[$x]['last_modified'] = date_format(date_create($curriculum->last_modified),"n/j/Y g:i A");
			$pass['curriculum_id'] = $curriculum->curriculum_id;
			$pass['curriculum_year'] = $data[$x]['curriculum_year'];
			$data[$x]['button'] = $this->load->view('curr-btn-view', $pass, true);
			$x++;
		}

		echo json_encode($data);
	}

	public function getCurriculumSubjects($program_code, $curriculum_year, $year, $semester) {
		$program_id = $this->program_model->getProgramID($program_code);
		$curriculum_id = $this->curriculum_model->getCurriculumID($program_id, $curriculum_year);
		$subjects = $this->curriculum_subj_model->getSubjects($curriculum_id, $year, $semester);

		$data = array();
		$x = 0;
		foreach ($subjects->result() as $subject) {
			$course_data = $this->course_model->getCourseData($subject->course_id);
			$data[$x]['course_code'] = $course_data->course_code;
			$data[$x]['course_name'] = $course_data->course_name;
			$data[$x]['credit_units'] = $course_data->credit_units;
			$data[$x]['prerequisites'] = "";
			
			$prereqs = $this->prerequisite_model->getPrerequisites($subject->course_id);
			$first = true;
			foreach($prereqs->result() as $prereq) {
				if(!$first)
					$data[$x]['prerequisites'] .= ", ";	
				$data[$x]['prerequisites'] .= $this->course_model->getCourseCode($prereq->course_id_pre);
				$first = false;
			}
			if($prereqs->num_rows() == 0)
				$data[$x]['prerequisites'] = "NONE";		
			$x++;
		}

		echo json_encode($data);
	}

	public function getCourseList() {
		$courses = $this->course_model->getAllCourses();
		$data = array();
		$x = 0;
		foreach($courses->result() as $course)
			$data[$x++] = $course->course_code . ' - ' . $course->course_name;
		echo json_encode($data);
	}

	public function getCurriculumData($curriculum_id) {
		$subjects = $this->curriculum_subj_model->getCurriculumSubjects($curriculum_id);
		$data = array();
		$x = 0;
		foreach ($subjects->result() as $subject) {
			$data[$x]['id'] = $subject->course_id;
			$data[$x]['title'] = $this->course_model->getCourseCode($subject->course_id);
			$data[$x]['name'] = $this->course_model->getCourseName($subject->course_id);
			$prereqs = $this->prerequisite_model->getPrerequisites($subject->course_id);
			$y = 0;
			foreach ($prereqs->result() as $prereq) {
				$data[$x]['parents'][$y] = $prereq->course_id_pre;
				$y++;
			}
			$x++;
		}
		echo json_encode($data);
	}
}