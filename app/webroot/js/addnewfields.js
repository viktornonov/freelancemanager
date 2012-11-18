/*
function addField(divClass, divId, inputName, butAddId, butDelId) {
	if(numParam == null) {
		var num		= $(divClass).length;	// how many "duplicatable" input fields we currently have
	}
	else {
		var num = numParam;
	}
	var newNum	= new Number(num + 1);		// the numeric ID of the new input field being added
	

	// create the new element via clone(), and manipulate it's ID using newNum value
	var newElem = $('#'+ divId + num).clone().attr('id', divId + newNum);
	var name = $('#' + divId + num).children(':first').attr('name');
	
	// manipulate the name/id values of the input inside the new element
	newElem.children(':first').attr('id', 'name' + newNum)
								.attr('name', inputName + (newNum - 1) + ']')
								.attr('value', '');

	// insert the new element after the last "duplicatable" input field
	$('#'+ divId + num).after(newElem);

	// enable the "remove" button
	$(butDelId).attr('disabled','');

	// business rule: you can only add 5 names
	if (newNum == 5)
		$(butAddId).attr('disabled','disabled');
}
*/
function addFormField(divClass, divId, fieldName, formFieldName) {
	
	var num		= $('.'+divClass).length;	// how many "duplicatable" input fields we currently have
	var newNum	= new Number(num + 1);		// the numeric ID of the new input field being added

	// create the new element via clone(), and manipulate it's ID using newNum value
	var newElem = $('#' + divId + num).clone().attr('id', fieldName + newNum);
	newElem.children('a').remove();
	newElem.children('label.error').remove();
	var name = $('#' + divId + num).children(':first').attr('name');
	
	// manipulate the name/id values of the input inside the new element
	newElem.children(':first').attr('id', fieldName + newNum)
								.attr('name', 'data[' + formFieldName + '][' + (newNum - 1) + ']')
								.attr('value', '');
	newElem.children(':first').after("<a href='#' class='removeButton' onClick='removeFormField(\"#" + fieldName + newNum + "\"); return false;'>Remove</a>");
	// insert the new element after the last "duplicatable" input field
	$('#'+ divId + num).after(newElem);
	
	// enable the "remove" button
	//$('#btnDel').attr('disabled','');

	// business rule: you can only add 5 names
	//if (newNum == 5)
	//	$('#btnAdd').attr('disabled','disabled');
}

function removeFormField(id) {
	$(id).remove();
}

$(document).ready(function() {
		$('.delEmail').click(function() {
				var id = $(this).attr('id');
				var idNum = id.match(/\d+$/);
				$( "#dialog-confirm" ).dialog({
					resizable: false,
					show: "blind",
					hide: "explode",
					height: 180,
					modal: true,
					buttons: {
						"Yes": function() {
							$.post('/emails/delete', {id: idNum});
							$('#'+id).parent().remove();
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
);

$(document).ready(function() {
	$('.delPhone').click(function() {
			var id = $(this).attr('id');
			var idNum = id.match(/\d+$/);
			$( "#dialog-confirmPhone" ).dialog({
				resizable: false,
				show: "blind",
				hide: "explode",
				height: 180,
				modal: true,
				buttons: {
					"Yes": function() {
						$.post('/phones/delete', {id: idNum});
						$('#'+id).parent().remove();
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
);

$(document).ready(function() {
	$('.delFile').click(function() {
			var id = $(this).attr('id');
			var idNum = id.match(/\d+$/);
			$( "#dialog-confirmFile" ).dialog({
				resizable: false,
				show: "blind",
				hide: "explode",
				height: 180,
				modal: true,
				buttons: {
					"Yes": function() {
						$.post('/attached_files/delete/', {id: idNum});
						$('#'+id).parent().remove();
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
);

$(document).ready(function() {
	$('.delProjectFile').click(function() {
			var id = $(this).attr('id');
			var idNum = id.match(/\d+$/);
			$( "#dialog-confirmFile" ).dialog({
				resizable: false,
				show: "blind",
				hide: "explode",
				height: 180,
				modal: true,
				buttons: {
					"Yes": function() {
						$.post('/projects_files/delete/', {id: idNum}, function(data) {
							//$('.in').html(data); //on error uncomment
						});
						$('#'+id).parent().remove();
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
);

//$() is a css selector. First I choose what triggers the event. In this case when  
//you CLICK on a LINK with the js-ajax CLASS. I changed the example to use the live() 
//function so that any javascript-generated html will be binded too instead of click(). 
$('a.js-ajax').live('click', function() { 
 // Now we simply make the ajax call. load($url) will pull the url's VIEW and put it  
 // into ther innerhtml of whatever tag you called load on. In this case, I want to fill  
 // up my #overlayer div with the results of the ajax. 
 $('#overlayer').load( 
     // Here is the tricky part. Instead of hard-coding a url to pass, I just had jquery  
     // go look at what the link (from the outside scope, .click() part) was already going  
     // to (href) and used that as the argument. 
     $(this).attr('href') 
 , function () { 
     // This is a callback, after the ajax gets loaded, the #overlayer div gets faded in at 300 miliseconds. 
     $(this).fadeIn(300); 
 }); 
 // And finally to prevent actually making the link go anywhere 
 return false; 
}); 

/*

$(document).ready(function() {
	$('#btnAdd').click(function() {
		var num		= $('.clonedInput').length;	// how many "duplicatable" input fields we currently have
		var newNum	= new Number(num + 1);		// the numeric ID of the new input field being added

		// create the new element via clone(), and manipulate it's ID using newNum value
		var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
		var name = $('#input' + num).children(':first').attr('name');
		
		// manipulate the name/id values of the input inside the new element
		newElem.children(':first').attr('id', 'name' + newNum)
									.attr('name', 'data[Email][' + (newNum - 1) + ']')
									.attr('value', '');

		// insert the new element after the last "duplicatable" input field
		$('#input' + num).after(newElem);

		// enable the "remove" button
		$('#btnDel').attr('disabled','');

		// business rule: you can only add 5 names
		if (newNum == 5)
			$('#btnAdd').attr('disabled','disabled');
	});

	$('#btnDel').click(function() {
		var num	= $('.clonedInput').length;	// how many "duplicatable" input fields we currently have
		$('#input' + num).remove();		// remove the last element

		// enable the "add" button
		$('#btnAdd').attr('disabled','');

		// if only one element remains, disable the "remove" button
		if (num-1 == 1)
			$('#btnDel').attr('disabled','disabled');
	});

	$('#btnDel').attr('disabled','disabled');
});
*/
/*
$(document).ready(function() {
	$('#btnAddPhone').click(function() {
		var num		= $('.clonedInputPhone').length;	// how many "duplicatable" input fields we currently have
		var newNum	= new Number(num + 1);		// the numeric ID of the new input field being added

		// create the new element via clone(), and manipulate it's ID using newNum value
		var newElem = $('#inputPhone' + num).clone().attr('id', 'inputPhone' + newNum);
		var name = $('#input' + num).children(':first').attr('name');
		
		// manipulate the name/id values of the input inside the new element
		newElem.children(':first').attr('id', 'name' + newNum)
									.attr('name', 'data[Phone][' + (newNum - 1) + ']')
									.attr('value', '');

		// insert the new element after the last "duplicatable" input field
		$('#inputPhone' + num).after(newElem);

		// enable the "remove" button
		$('#btnDelPhone').attr('disabled','');

		// business rule: you can only add 5 names
		if (newNum == 5)
			$('#btnAddPhone').attr('disabled','disabled');
	});

	$('#btnDelPhone').click(function() {
		var num	= $('.clonedInputPhone').length;	// how many "duplicatable" input fields we currently have
		$('#inputPhone' + num).remove();		// remove the last element

		// enable the "add" button
		$('#btnAddPhone').attr('disabled','');

		// if only one element remains, disable the "remove" button
		if (num-1 == 1)
			$('#btnDelPhone').attr('disabled','disabled');
	});

	$('#btnDelPhone').attr('disabled','disabled');
});
*/