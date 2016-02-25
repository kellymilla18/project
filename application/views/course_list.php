<div>
    <center>
        <h2> List of Courses </h2>
    </center>
</div>
<div class="col-lg-10 col-lg-offset-1 col-sm-12" style="margin-top: 35px;">
    <button class="btn btn-default" style="width: 115px" data-toggle="modal" data-target="#myModal">
        <i class="glyphicon glyphicon-plus" style="left: -3px;"></i> Add Course
    </button>
    <table id="course-list-table" data-toggle="table" data-toolbar="#leaderboard-controls" data-url="<?php echo base_url('index.php/json/getAllCourses'); ?>" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200, 500]" data-search="true" data-show-refresh="false">
        <thead>
            <tr>
                <th data-field="course-code" data-sortable="true" data-align="center" class="col-lg-2 col-sm-2">Subject Code</th>
                <th data-field="course-name" data-sortable="true" data-align="left" class="col-lg-5 col-sm-5">Subject Description</th>
                <th data-field="credit-units" data-sortable="true" data-align="center" class="col-lg-1 col-sm-1">Credit units</th>
                <th data-field="prerequisites" data-sortable="true" data-align="left" class="col-lg-4 col-sm-4">Prerequisites</th>
            </tr>
        </thead>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="add-course-form" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" style="width: 20px" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Course</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Subject Code" name="course-code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Subject Description" name="course-name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" placeholder="Credit Units" name="credit-units" required>
                    </div>
                    <label> Prerequisites </label>
                    <div class="prereq-wrapper">
                        
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control typeahead-input" data-provide="typeahead" autocomplete="off" data-source='[]' name="subj_code" placeholder="Subject Code">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="add-prereq-subj-butt" type="button">Add</button>
                        </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  data-dismiss="modal" id="add-course-butt" value="Add">Add</button>
                    </center>
                </div>
            </div>
        </div>
    </form>
</div>