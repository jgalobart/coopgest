function init_stand() {
	$("#stand tbody td").hide();
	$("#stand tbody tr th").click(function(){
		var category = $(this).closest('tr').attr('class');
		//$(this+' i').toggleClass('fui-triangle-right-large,fui-triangle-down');
		$("#stand tbody tr."+category+" td").toggle();
	});
}


$(document).ready(function() { 
	init_stand();	//init order stand
	$('#orderSummary').load('/cooperativa/index.php/ajax/orderSummary');
	$('#orderDetails').load('/cooperativa/index.php/ajax/orderDetails');
});

$(function(){

	//contains: case insensitive
	$.expr[":"].contains = $.expr.createPseudo(function(arg) {
	    return function( elem ) {
	        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
	    };
	});

	//add product to cart
	$('td.col_actions a.btn').click(function(e){
		e.preventDefault();
		var p = $(this).attr('id').substring(1);
		var q = $('#q'+p).val(); //get quantity
		if ($('#q'+p).val()>0) {
			var jqxhr = $.get('/cooperativa/index.php/ajax/addProduct?p='+p+'&q='+q,function(){
				$('#orderSummary').load('/cooperativa/index.php/ajax/orderSummary');
				$('#orderDetails').load('/cooperativa/index.php/ajax/orderDetails');	
			})
			//.done(function() { alert("second success"); })
			//.fail(function() { alert("error"); })
			//.always(function() { alert("finished"); })
			;
			
			}
		});	
	
	//filter stand
	$('input#standSearch').keyup(function(){
		$("#stand tbody td").hide();
		$("#stand tbody td:contains('"+$(this).val()+"')").show();
		$("#stand tbody td:visible").siblings().show();
		});	
})