<?php
$hoursSpent = $input_array_from_controller['time_spent'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-8">
            <small><a data-mode="restore" id="btn-swap" href="#" class="">Enter <span>Restore</span> Mode</a></small>
            <small><a data-mode="cvs" id="" href="?mode=csv" class="">CSV Update</a></small>
            <small><a data-mode="download-csv" id="" href="download.php?mode=download-csv" class="">CSV Download</a></small>
            <small><a data-mode="download-json" id="" href="download.php?mode=download-json" class="">Json Download</a></small>
        </div><!-- END col --> 
        <div class="col-xs-4 text-right"><strong>Total Hours:</strong><?php echo $hoursSpent; ?></div>
    </div>
    <div class="row">
        <form id="form-new" method="get">
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
    <hr>
    <table class="table table-bordered table-stripped">

        <thead>
            <tr>
                <th>Task</th>
                <th>Project</th>
                <th>Start</th>
                <th>End</th>
                <th>Time</th>
                <th colspan="2">Controls</th>
            </tr>   
        </thead>
        <tbody id="log"></tbody>
    </table>
</div><!-- END container -->