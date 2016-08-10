<?php
$tasks = new TimeTracking\Model\Tasks();
$format = new TimeTracking\Model\Formatting();
$data = $input_array_from_controller['data'];
$mode = $input_array_from_controller['mode'];
$task = $input_array_from_controller['task'];


# -------------------------------
# Modes
# -------------------------------
if ($mode != '') {
    # Handle each mode type:
    switch ($mode) {

        # Build a new task record:
        case 'new':
            $id = time();
            $data[$id]['id'] = $id;
            $data[$id]['task'] = $task;
            $data[$id]['date_start'] = $id;
            $data[$id]['date_end'] = '';
            $data[$id]['date_entered'] = $id;
            $data[$id]['status'] = 1;
            $tasks->setSaveTask($data);
            break;

        # Restore task record by setting it to active:
        case 'status':
            $id = $task; // Record ID
            $data[$id]['status'] = 1; // Set the status to active
            $tasks->setSaveTask($data);
            break;

        # Delete task record by setting it to inactive:
        case 'delete':
            $id = $task; // Record ID
            $data[$id]['status'] = 3; // Set the status to inactive
            $tasks->setSaveTask($data);
            break;

        # Stop task timer:
        case 'stop':
            $id = $task;
            $data[$id]['date_end'] = time();
            $tasks->setSaveTask($data);
            break;

        # Build the task log table:   
        case 'build':

            # If there is any data:	
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
                            <td><?php echo $task['task']; ?></td>
                            <td><?php echo $format->dateNice($task['date_start']); ?></td>
                            <td><?php echo ($task['date_end'] != '') ? $format->dateNice($task['date_end']) : ''; ?></td>
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

            break;

        # Restore records table:   
        case 'restore':

            # If there is any data:	
            if (is_array($data)) {

                # Run through each record:
                foreach ($data as $task) {

                    # Ignore inactive records:
                    if ($task['status'] != 1) {
                        ?>

                        <tr>
                            <td><?php echo $task['task'] ?></td>
                            <td><?php echo date_nice($task['date_start']) ?></td>
                            <td><?php echo ($task['date_end'] != '') ? date_nice($task['date_end']) : '' ?></td>
                            <td>
                                <?php
                                if ($task['date_start'] != '' && $task['date_end'] != '') {
                                    echo $format->timeNice($task['date_end'] - $task['date_start']);
                                } else {
                                    echo 0;
                                }
                                ?>
                            </td>
                            <td class="btn-cell">
                                <?php if ($task['date_end'] == '') { ?>
                                    <button data-id="<?php echo $task['id'] ?>" class="btn btn-block btn-primary btn-stop"><i class="fa fa-stop"></i></button>
                                <?php } ?>
                            </td>
                            <td class="btn-cell">
                                <button data-id="<?php echo $task['id'] ?>" class="btn btn-block btn-primary btn-restore"><i class="fa fa-refresh"></i></button>
                            </td>
                        </tr> 

                        <?php
                    }
                }
            } // END if, foreach, if is_array

            break;

        # Tally results:      
        case 'tally':

            //  include_once 'parts/log/tally.php';
            $count = 0; // Initial value for tally
# If there is any data:	
            if (is_array($data)) {

                # Run through each record:  
                foreach ($data as $task) {

                    # Ignore inactive records:
                    if ($task['status'] == 1) {

                        # If task has not stopped yet
                        if ($task['date_end'] == '') {
                            $task['date_end'] = time(); // Set the end date to now
                        } // END if

                        $current = $task['date_end'] - $task['date_start']; // Number of seconds for task
                        $count = $count + $current; // Add to tally
                    } // END if
                } // END foreach 
            } // END if is_array

            $format->timeNice($count); // Return the time.
            break;
    } // END switch
}
