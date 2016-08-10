<?php
$hoursSpent = $input_array_from_controller['time_spent'];
?>  
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 text-right"><strong>Total Hours: </strong><?php echo $hoursSpent; ?></div>
    </div>
    <div class="row">
        <form id="new-task" method="get" name="new_task">
            <input type="hidden"  name="mode"  value='new'/> 
            <div class="form-group">
                <div class="col-xs-7">
                    <input id="task" class="form-control" name="task" placeholder="Enter new task name..."> 
                </div>    
                <div class="col-xs-3">
                    <input id="project" class="form-control" name="project" placeholder="Project name..."> 
                </div><!-- END col -->   
                <div class="col-xs-2">
                    <button type="submit" name="submit" class="btn btn-block btn-success">
                        <i class="fa fa-play"></i>
                    </button> 
                </div><!-- END col -->
            </div><!-- END form-group -->
        </form>     
    </div><!-- END row -->
    <div class="row">
        <form id="manually-add-time" method="get" name="manually-add-time">
            mode=manual
            <input type="hidden"  name="mode"  value='manual'/> 
            <div class="form-group">
                <div class="col-xs-4">
                    <input id="task" class="form-control" name="task" placeholder="Enter new task name..."> 
                </div>    
                <div class="col-xs-2">
                    <input id="project" class="form-control" name="project" placeholder="Project name..."> 
                </div><!-- END col -->   
                <div class="col-xs-2">
                    <input id="time-start" class="form-control time-start" name="time-started" placeholder="Started..."> 
                </div><!-- END col -->  
                <div class="col-xs-2">
                    <input id="time-end" class="form-control time-end" name="time-end" placeholder="Ended..."> 
                </div><!-- END col -->  
                <div class="col-xs-2">
                    
                    <button type="submit" name="submit" class="btn btn-block btn-success">
                        <i class="fa fa-play"></i>
                    </button> 
                </div><!-- END col -->
            </div><!-- END form-group -->
        </form>     
    </div><!-- END row -->
    <hr>
    <form id="task-update" method="get" name="task-update">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Project</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Time</th>
                    <th colspan="3">Controls</th>
                </tr>   
            </thead>
            <tbody id="log"></tbody>
        </table>
    </form>  
</div><!-- END container -->