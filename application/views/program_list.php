<div>
    <center>
        <h2>List of Programs</h2>
    </center>
</div>
<div>
    <div class="col-lg-10 col-lg-offset-1 col-sm-12">
        <h3>Department of Computer Science</h3>
        <?php
			foreach ($program as $program_code => $program_data) {
		?>
            <div class="panel panel-default">
                <div class="panel-heading"><strong><?php echo $program_data['program_name'] . " ($program_code)"; ?> </strong></div>
                <div class="panel-body">
                    <?php echo $program_data['program_desc']; ?>
                </div>
                <div class="panel-body">
                    <strong>Available Curriculums</strong>
                    <button class="btn btn-default" style="width: 20px" data-toggle="modal" data-target="#addCurr<?php echo $program_code; ?>"><i style="left:-7px" class="glyphicon glyphicon-plus"></i></button>
                </div>
                <div style="padding: 0px 20px 20px 20px">
                    <table data-toggle="table" data-toolbar="#leaderboard-controls" data-url="<?php echo base_url(" index.php/json/getcurriculums/$program_code "); ?>" data-pagination="false" data-page-list="[5, 10, 20, 50, 100, 200, 500]" data-search="false" data-show-refresh="false">
                        <thead>
                            <tr>
                                <th data-field="curriculum_year" data-sortable="false" data-align="center" class="col-lg-5 col-sm-5">Curriculum Year</th>
                                <th data-field="date_created" data-sortable="false" data-align="center" class="col-lg-3 col-sm-3">Date Created</th>
                                <th data-field="last_modified" data-sortable="false" data-align="center" class="col-lg-3 col-sm-3">Last Modified</th>
                                <th data-field="button" data-sortable="false" data-align="center" class="col-lg-1 col-sm-1"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="addCurr<?php echo $program_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <form method="POST" action="<?php echo base_url(" index.php/curriculum/add_curriculum/$program_code "); ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" style="width: 20px" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add Curriculum</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <b><?php echo  $program_data['program_name']; ?></b>
                                    <input class="form-control" type="text" placeholder="Curriculum Year" name="curriculum_year">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="Add">Add</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
		 	}	
		?>
    </div>
</div>