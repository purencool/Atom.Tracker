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