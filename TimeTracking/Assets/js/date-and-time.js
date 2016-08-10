$(document).on('ready', function () {
    $('.time-start').datetimepicker({
       	step:5,
        format: 'M j Y g:i A',
        value: new Date()
    });
    $('.time-end').datetimepicker({
        step:5,
        format: 'M j Y g:i A',
        value: new Date()
    });

});
/**
 *  Allows ajax loaded form to load date time picker
 */
$(document).on("click",".update-start-time",function(e){  
    $('.update-start-time').datetimepicker({
       	step:5,
        format: 'M j Y g:i A',
    });
});

/**
 *  Allows ajax loaded form to load date time picker
 */
$(document).on("click",".update-end-time",function(e){  
    $('.update-end-time').datetimepicker({
       	step:5,
        format: 'M j Y g:i A',
    });
});

