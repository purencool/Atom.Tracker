<?php
$format = new TimeTracking\Model\Formatting();
$data = $input_array_from_controller['data'];
$mode = $input_array_from_controller['mode'];
$task = $input_array_from_controller['task'];

if (is_array($data)) {

    # Run through each record:
    foreach ($data as $task) {

        # Ignore inactive records:
        if ($task['status'] == 1) {
            if ($task['date_start'] != '' && $task['date_end'] != '') {
                $seconds = $task['date_end'] - $task['date_start'];
            } else {
                $seconds = time() - $task['date_start'];
            }
            ?>
            <tr>
                <td>
                    <input id="update-task" class="form-control" 
                            name="update-task[<?php echo $task['id']; ?>][task]" 
                            value="<?php echo $task['task']; ?>" />        
                </td>
                <td>
                    <input id="update-project" class="form-control" 
                            name="update-project[<?php echo $task['id']; ?>][project]" 
                            value="<?php echo $task['project']; ?>" />
                </td>
                <td>
                    <input id="update-start-time" class="form-control" 
                            name="update-start-time[<?php echo $task['id']; ?>][start]" 
                            value="<?php echo $format->dateNice($task['date_start']); ?>" />
                </td>
                <td>
                    <input id="update-end-time" class="form-control" 
                            name="update-end-time[<?php echo $task['id']; ?>][end]" 
                            value="<?php echo ($task['date_end'] != '') ? $format->dateNice($task['date_end']) : ''; ?>" />          
                </td>
                <td data-seconds="<?php echo $seconds; ?>"><?php echo $format->timeNice($seconds); ?></td>
                <td class="btn-cell">
                    <button data-id="<?php echo $task['id']; ?>"
                            class="btn btn-block btn-primary btn-stop" 
                            <?php echo ($task['date_end'] != '') ? 'disabled' : ''; ?>>
                        <i class="fa fa-stop"></i>
                    </button>
                </td>
                <td class="btn-cell">
                    <button data-id="<?php echo$task['id'] ?>" 
                            class="btn btn-block btn-danger btn-delete"><i class="fa fa-times"></i>
                    </button>
                </td>
            </tr> 
            <?php
        }
    }
} // END if, foreach, if is_array