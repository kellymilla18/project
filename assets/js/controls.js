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

$(document).ready(function () {
    var options = new primitives.famdiagram.Config();

    options.cursorItem = 0;
    options.linesWidth = 1;
    options.linesColor = "black";
    options.lineItemsInterval = 5;
    options.hasSelectorCheckbox = primitives.common.Enabled.False;
    options.orientationType = primitives.common.OrientationType.Down;
    options.pageFitMode = primitives.common.PageFitMode.None;
    options.templates = [getPERTTemplate()];
    options.onItemRender = onTemplateRender;
    options.defaultTemplateName = "pertTemplate";
    options.arrowsDirection = primitives.common.GroupByType.Children;

    options.highlightLinesColor = primitives.common.Colors.Black;
    options.highlightLinesWidth = 1;
    options.highlightLinesType = primitives.common.LineType.Solid;

    function onTemplateRender(event, data) {
        var itemConfig = data.context;

        if (data.templateName == "pertTemplate") {
            data.element.find("[name=titleBackground]").css({
                "background": itemConfig.itemTitleColor
            });

            var fields = ["title", "name"];
            for (var index = 0; index < fields.length; index++) {
                var field = fields[index];

                var element = data.element.find("[name=" + field + "]");
                if (element.text() != itemConfig[field]) {
                    element.text(itemConfig[field]);
                }
            }
        }
    }

    function getPERTTemplate() {
        var result = new primitives.orgdiagram.TemplateConfig();
        result.name = "pertTemplate";

        result.itemSize = new primitives.common.Size(100, 70);
        result.minimizedItemSize = new primitives.common.Size(100, 70);
        result.highlightPadding = new primitives.common.Thickness(0, 0, 0, 0);


        var itemTemplate = jQuery(
              '<div class="bp-item bp-corner-all bt-item-frame">'	 
            +   '<div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 96px; height: 20px;">' 
            +     '<div name="title" class="bp-item bp-title" style="text-align: center; top: 3px; font-size: 12px; left: 6px; width: 88px; height: 18px;">' 
            +     '</div>'
            +   '</div>'
            +   '<div name="name" class="bp-item bp-title" style="font-size: 11px;word-wrap: break-word; line-height: 100%; color: black; text-align: center; top: 23px; left: 6px; width: 88px; height: 50px;">' 
            +   '</div>'
            + '</div>'
        ).css({
            width: result.itemSize.width + "px",
            height: result.itemSize.height + "px"
        }).addClass("bp-item bp-corner-all bt-item-frame");
        result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

        return result;
    }
    
	var curriculum_id = $('input[name="curriculum_id"]').val();    
    $.getJSON("http://" + window.location.hostname + "/project/index.php/json/getCurriculumData/" + curriculum_id, function(data) {
        options.items = data;
        $("#diagram").famDiagram(options);
    });
});