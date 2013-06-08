jQuery(document).ready(function() { 
	$("#stand tbody td").hide();
	$("#stand tbody tr").click(function(){
		var category = $(this).attr('class');
		//$(this+' i').toggleClass('fui-triangle-right-large,fui-triangle-down');
		$("#stand tbody tr."+category+" td").toggle();
	});
});