$(document).ready(function() {


function format_n(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

function switch_values(obj1, obj2)
{
	//vars
	var val1 = $(obj1).val();
	var val2 = $(obj2).val();
	
	//switch values
	$(obj1).val(val2);
	$(obj2).val(val1);
}


/* update when currency codes change */
$('.baseC').on('change', function(){

	//class name of the modified input
	var amountClass = $(this).parent().eq(0).attr('id');
	var parentDiv 	= $(this).parent().eq(0).attr('id');
	var parentDivSibling =$('#foreignWrap').attr('id');

	//value
	base = $('#'+amountClass+' select').val();  //define the base currency depending on the updated value
	foreign = $('#'+parentDivSibling+' select').val(); //foreign, is the opposite currency of the base
	amount = $('#'+amountClass+' input').val();
	
	oppositeAmount = $('#'+parentDivSibling+' input[name="amount"]');
	
	
    setTimeout(submitFormAjax, 100);//set timeout for request
    return false;
	

});


$('.foreignC').on('change', function(){

	//class name of the modified input
	var amountClass = $(this).parent().eq(0).attr('id');
	var parentDiv 	= $(this).parent().eq(0).attr('id');
	var parentDivSibling =$('#foreignWrap').attr('id');

	//value
	/*
	base = $('#'+amountClass+' select').val();  //define the base currency depending on the updated value
	foreign = $('#'+parentDivSibling+' select').val(); //foreign, is the opposite currency of the base
	*/
	
	foreign = $('#'+amountClass+' select').val();  //define the base currency depending on the updated value
	base = $('#'+parentDivSibling+' select').val(); //foreign, is the opposite currency of the base
	amount = $('#'+parentDivSibling+' input').val();
	
	oppositeAmount = $('#'+parentDiv+' input[name="amount"]');
	
	
    setTimeout(submitFormAjax, 100);//set timeout for request
    return false;
	

});



/* update when amount values change */
$('.amountC, .amountF').on('keyup', function(){
	
	if (jQuery('#baseWrap input[name="amount"]').val()<=0 ){ jQuery('#baseWrap input[name="amount"]').val(1); }
	if (jQuery('#foreignWrap input[name="amount"]').val()<=0 ){ jQuery('#foreignWrap input[name="amount"]').val(1); }
	
	
	//class name of the modified input
	var amountClass = jQuery(this).parent().eq(0).attr('id');
	var parentDiv 	= jQuery(this).parent().eq(0).attr('id');
	//var parentDivSibling = jQuery('#'+parentDiv).siblings('.foreignSister').eq(0).attr('id');
	var parentDivSibling =$('#foreignWrap').attr('id');
	
	console.log(parentDivSibling);

	//value
	base = jQuery('#'+amountClass+' select').val();  //define the base currency depending on the updated value
	foreign = jQuery('#'+parentDivSibling+' select').val(); //foreign, is the opposite currency of the base
	amount = jQuery('#'+amountClass+' input').val();
	
	oppositeAmount = jQuery('#'+parentDivSibling+' input[name="amount"]');
	
	
    setTimeout(submitFormAjax, 500);//set timeout for request
    return false;
	

	

});


//post values
function submitFormAjax() {
	//if ( amount <=0  ){ return false };
	
	$.ajax({
		type: "POST",
		url: "read.php",
		data: { base: base, foreign:foreign, amount:amount }
		}).done(function( response ) {
		//$(oppositeAmount).val(format_n(response));
		$(oppositeAmount).val(response);
	});

}


//switching values between fields
$('#d-arrow .img-wrap').on('click', function (){
switch_values( $('#baseWrap input[name="amount"]'),$('#foreignWrap input[name="amount"]') );
});


});