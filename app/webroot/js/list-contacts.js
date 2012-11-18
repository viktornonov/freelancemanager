$(document).ready(
	function() {
			$('.deleteContact').click(function() {
				var id = $(this).attr('id');
				var idNum = id.match(/\d+$/);
				$( "#dialog-confirmContact" ).dialog({
					resizable: false,
					show: "blind",
					hide: "explode",
					height: 180,
					modal: true,
					buttons: {
						"Yes": function() {
							$.post('/contacts/delete', {id: idNum}, function(data) {
								//$('.in').html(data) //on error uncomment
							});
							
							$('#delete'+idNum).parent().parent().parent().parent().remove();
							$( this ).dialog( "close" );
							
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
		);
	}
)