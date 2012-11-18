$(function() {
		// show a simple loading indicator
		var loader = $('<div id="loader"><img src="/img/loading.gif" alt="loading..." /></div>')
			.css({position: "relative", top: "1em", left: "20em"})
			.appendTo("legend")
			.hide();
		
		$().ajaxStart(function() {
			loader.show().delay(800);
		}).ajaxStop(function() {
			loader.hide();
		}).ajaxError(function(a, b, e) {
			throw e;
		});
		
		var v = $("#ContactAddForm").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({
					//target: "#result"
				});
			}
		});
		
		$("#ContactEditForm").validate({
			submitHandler: function(form){
				$(form).ajaxSubmit({
					
				});
			}
		})
		
		/*
		$("#reset").click(function() {
			v.resetForm();
		});
		*/
	});