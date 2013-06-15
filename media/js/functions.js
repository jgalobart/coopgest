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
		console.log (p); //get product ID
		console.log ($('#q'+p).val()); //get quantity
		$('#orderSummary').load('/cooperativa/index.php/ajax/orderSummary');
		$('#orderDetails').load('/cooperativa/index.php/ajax/orderDetails');
		});	
	
	//filter stand
	$('input#standSearch').keyup(function(){
		$("#stand tbody td").hide();
		$("#stand tbody td:contains('"+$(this).val()+"')").show();
		$("#stand tbody td:visible").siblings().show();
		});	
})