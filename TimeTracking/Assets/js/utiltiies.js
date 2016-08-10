/**
 * 
 */
$(document).on('ready', function () {
    function onload() {
        $('#new-task').show();
        $('#manually-add-time').hide();
    }
    onload();
    
    $('#add-time-manually').click(function(e){
        e.preventDefault();
        $('#new-task').toggle();
        $('#manually-add-time').toggle();
    });
});