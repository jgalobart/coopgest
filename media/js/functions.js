function init_stand() {
	$("#stand tbody td").hide();
	$("#stand tbody tr").click(function(){
		var category = $(this).attr('class');
		//$(this+' i').toggleClass('fui-triangle-right-large,fui-triangle-down');
		$("#stand tbody tr."+category+" td").toggle();
	});
}

jQuery(document).ready(function() { 
	init_stand();	//init order stand
	$('input#standSearch').keyup(function(){
		$("#stand tbody td").hide();
		$("#stand tbody td:contains('"+$(this).val()+"')").show();
		$("#stand tbody td:visible").siblings().show();
	})
});