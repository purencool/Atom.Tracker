$(document).on('ready', function () {
    $('.time-start').datetimepicker({
       	step:5
    });
    $('.time-end').datetimepicker({
        step:5
    });

});
/**
 *  Allows ajax loaded form to load date time picker
 */
$(document).on("click",".update-start-time",function(e){  
    $('.update-start-time').datetimepicker({
       	step:5
    });
});

/**
 *  Allows ajax loaded form to load date time picker
 */
$(document).on("click",".update-end-time",function(e){  
    $('.update-end-time').datetimepicker({
       	step:5
    });
});

