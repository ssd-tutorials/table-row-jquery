$(document).ready(function() {


	
	$('.remove').live('click', function() {
		
		var trigger = $(this);
		var id = $(this).attr('rel');
		
		$.getJSON('/mod/remove.php?id='+id, function(data) {
			
			var rows = $('.tbl_repeat tr').length;
			if (rows > 2) {
				trigger.closest('tr').fadeOut(300, function() {
					$(this).remove();
				});
			} else {
				$('.tbl_repeat').fadeOut(300, function() {
					var msg = '<p>There are currently no records available.</p>';
					$('#table_wrapper').hide().html(msg).fadeIn(300);
				});
			}
			
		});
		
		return false;
		
	});
	


	
	$('.add_new').click(function() {
		
		var arr = $(this).closest('form').serializeArray();
		var tbl = $('.tbl_repeat').length;
		$.post('/mod/row.php?tbl='+tbl, arr, function(data) {
			if (tbl === 0) {
				$('#table_wrapper').html(
					$(data.row).hide().fadeIn(300)
				);
			} else {
				$('.tbl_repeat tr:last').after(
					$(data.row).hide().fadeIn(300)
						.css('display', 'table-row')
				);
			}
		}, 'json');
		return false;
		
	});
	

});