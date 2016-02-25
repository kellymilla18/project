$('#add-prereq-subj-butt').on('click', function() {
	var subj_code = $('input[name="subj_code"]').val();
	
	$.ajax({
		url: "http://" + window.location.hostname + "/project/index.php/ajax/addPrerequisite",
		type: "POST",
		data: { subject_code:subj_code },
		success: function(dataPass){
			if(dataPass == "error") {
			} else {
				$('input[name="subj_code"]').val("");
				$('.prereq-wrapper').append(dataPass);	
			}
		}
    });
});

$('.btn-addcurr-subj').on('click', function(e) {
	e.preventDefault();
	var form_id = $(this).data("formid");
	var curr_id = $('input[name="curriculum_id' + form_id +'"]').val();
	var curr_year = $('input[name="curr_year' + form_id +'"]').val();
	var subj_code = $('input[name="subj_code' + form_id +'"]').val();
	var semester = $('select[name="semester' + form_id +'"]').val();
	var formData = new FormData();

	formData.append('curriculum_id', curr_id);
	formData.append('curr_year', curr_year);
	formData.append('subj_code', subj_code);
	formData.append('semester', semester);

	$('input[name="subj_code' + form_id +'"]').val("");

	$.ajax({
		url: "http://" + window.location.hostname + "/project/index.php/curriculum_subjects/addSubject",
		type: "post",
		data: formData,
		contentType: false,
	    processData: false,
	    async: false,
	    success: function(dataPass) {
	    	if(dataPass != "error") {
	    		$('#tbl-currsubj-'+dataPass).bootstrapTable('refresh');
	    	} else {

	    	}
	    }
	});
});

$('#add-course-butt').on('click', function(e) {
	e.preventDefault();
	$('#add-course-form').submit();
});

$('#add-course-form').on('submit', function(e) {
	e.preventDefault();
	var formData = new FormData(this);
	$.ajax({
		url: "http://" + window.location.hostname + "/project/index.php/course/add_course",
		type: "post",
		data: formData,
		contentType: false,
	    processData: false,
	    async: false,
		success: function(dataPass) {
			$('#course-list-table').bootstrapTable('refresh');
			$('input').val("");
			$('.prereq-wrapper').html("");
			var parsed = JSON.parse(dataPass);
			var arr = [];
			for(var x in parsed)
				arr.push(parsed[x]);
			var autocomplete = $('input[name="subj_code"]').typeahead();
			autocomplete.data('typeahead').source = arr;
		}
	});
});

$(document).ready(function(e) {
	$.ajax({
		url: "http://" + window.location.hostname + "/project/index.php/json/getCourseList",
		success: function(dataPass) {
			var parsed = JSON.parse(dataPass);
			var arr = [];
			for(var x in parsed)
				arr.push(parsed[x]);
			$('.typeahead-input').each(function(e) {
				var autocomplete = $(this).typeahead();
				autocomplete.data('typeahead').source = arr;
			});
		}
	});
});

