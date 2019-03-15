$(function() {
	$('#confirm-delete').on('show.bs.modal', function(e) {
	    $(this).find('#btn_delete').attr('href', $(e.relatedTarget).data('href'));
	    var content = "Are you sure want to delete "+ $(e.relatedTarget).data('item') +"?";
	    $(this).find('#content').text(content);
	});
});