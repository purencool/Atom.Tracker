<?php
/**
 * 
 */
$format = new TimeTracking\Model\Formatting();
$data = $input_array_from_controller['data'];
$mode = $input_array_from_controller['mode'];
$task = $input_array_from_controller['task'];

/**
 * 
 */	
if (is_array($data)) {
    foreach ($data as $task) {
        if ($task['status'] != 1) {
?>
    <tr>
        <td><?php echo $task['task'] ?></td>
        <td><?php echo $format->dateNice($task['date_start']) ?></td>
        <td><?php echo ($task['date_end'] != '') ? $format->dateNice($task['date_end']) : '' ?></td>
        <td><?php  if ($task['date_start'] != '' && $task['date_end'] != '') {
                echo $format->timeNice($task['date_end'] - $task['date_start']);
            } ?>
        </td>
        <td class="btn-cell">
            <button data-id="<?php echo $task['id'] ?>" class="btn btn-block btn-primary btn-save"><i class="fa fa-save"></i></button>
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
}