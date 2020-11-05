$('#tile-sort').hover(
    function() {
        $('#sort-goodbye').removeClass('btn-primary').addClass('btn-danger');
    },
    function() {
        $('#sort-goodbye').removeClass('btn-danger').addClass('btn-primary');
    }
);