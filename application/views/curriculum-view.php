<div>
    <center>
        <h2> <?php echo "$program_name ($program_code)"; ?> </h2>
        <small> Curriculum Year: <?php echo $curriculum_year; ?> </small>
        <a href="<?php echo(base_url('index.php/curriculum/pdf_view/'."$program_code/$curriculum_year")); ?>" class="btn btn-default"> <i class="glyphicon glyphicon-file"> </i></a>
        <a href="<?php echo(base_url('index.php/curriculum/tree_view/'."$program_code/$curriculum_year")); ?>" class="btn btn-default"> <i class="glyphicon glyphicon-file"> </i></a>
    </center>
</div>

<div class="col-lg-10 col-lg-offset-1 col-sm-12">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" style="padding: 0px">
        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">1st Year</a></li>
        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">2nd Year</a></li>
        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">3rd Year</a></li>
        <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">4th Year</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php 
  		for($x = 1; $x <= 4; $x++) {
  	?>
            <div role="tabpanel" class="tab-pane <?php if($x == 1) echo " active "; ?>" id="tab<?php echo $x; ?>">
                <div style="margin-top: 50px">

                    <button class="btn btn-default" style="width: 115px" data-toggle="modal" data-target="#myModal<?php echo $x; ?>">
                        <i class="glyphicon glyphicon-plus" style="left: -3px;"></i> Add Subject
                    </button>
                    <?php 
                        for($y = 1; $y <= 3; $y++) {
                    ?>
                    <div style="padding: 0px 20px 20px 20px">
                        <h4>
                            <?php
                                if($y == 1)
                                    echo "1st Semester";
                                else if($y == 2)
                                    echo "2nd Semester";
                                else
                                    echo "Summer";
                            ?>
                        </h4>
                        <table id="<?php echo "tbl-currsubj-$x-$y"?>" data-toggle="table" data-toolbar="#leaderboard-controls" data-url="<?php echo base_url("index.php/json/getCurriculumSubjects/$program_code/$curriculum_year/$x/$y"); ?>" data-pagination="false" data-page-list="[5, 10, 20, 50, 100, 200, 500]" data-search="false" data-show-refresh="false">
                            <thead>
                                <tr>
                                    <th data-field="course_code" data-sortable="false" data-align="center" class="col-lg-2 col-sm-5">Subject Code</th>
                                    <th data-field="course_name" data-sortable="false" data-align="center" class="col-lg-5 col-sm-3">Subject Description</th>
                                    <th data-field="credit_units" data-sortable="false" data-align="center" class="col-lg-1 col-sm-3">Credit Units</th>
                                    <th data-field="prerequisites" data-sortable="false" data-align="center" class="col-lg-4 col-sm-1">Prerequisites</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="modal fade" id="myModal<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <form id="add-subj-curr-form<?php echo $x; ?>" method="POST">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" style="width: 20px" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add Subject</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <select class="form-control" name="semester<?php echo $x; ?>">
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="3">Summer</option>
                                    </select>
                                </div>
                                <input type="text" name="curr_year<?php echo $x; ?>" value="<?php echo $x; ?>" hidden>
                                <input type="text" name="curriculum_id<?php echo $x; ?>" value="<?php echo $curriculum_id; ?>" hidden>
                                <div class="form-group"> 
                                    <input class="form-control typeahead-input" data-provide="typeahead" autocomplete="off" data-source='[]' name="subj_code<?php echo $x; ?>" placeholder="Subject Code">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn-addcurr-subj btn btn-primary" data-dismiss="modal" data-formid="<?php echo $x; ?>">Add</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php } ?>
    </div>
</div>