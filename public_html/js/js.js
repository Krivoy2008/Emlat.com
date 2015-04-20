$(window).resize(function(){

});
$(document).ready(function(){
	
    $(".navbar-right li a").each(function() {
    if (this.href == window.location.href) {
	
        $(this).addClass("active_link");
        }
    });
	$('.navbar-collapse select').addClass('hidden-xs');


	



    $('#little_news li').eq(0).addClass('active');
    if ($(window).width() < 768)
    $('#little_news li').eq(0).next().slideDown();

    $('#little_news li').on('click',function(){
        $('#little_news li').removeClass('active');
        $(this).addClass('active');
		$('#news_image').attr('src',$("#little_news li.active img").attr('src'));
        if ($(window).width() < 768) {

            $('#little_news li').next('.mobile_image').slideUp('fast');
            $(this).next().slideDown("fast");

        }

    });
    (function($) {
        $.fn.extend( {
            limiter: function(limit, elem) {
                $(this).on("keyup focus", function() {
                    setCount(this, elem);
                });
                function setCount(src, elem) {
                    var chars = src.value.length;
                    if (chars > limit) {
                        src.value = src.value.substr(0, limit);
                        chars = limit;
                    }
                    elem.html( limit - chars );
                }
                setCount($(this)[0], elem);
            }
        });
    })(jQuery);

    function getQuater(amount){
        console.log(amount);
        var f=amount+(81*amount)/100;
        var s=f+(81*f)/100;
        var t=s+(81*s)/100;
        return t-amount;
    }
    function sum(previousSum, currentItem) {

        return previousSum + currentItem;

    }
	function getPercent(amount){
        return (amount/100)*81;
    }
	
	
	
	


    $('#banner-input').on('change keydown keyup',function(){
        input=$('#banner-input').val();

        if(input=="")
        input=10000;
		else
		input=parseInt(input);
		

        //console.log(input);
        var array=[];
        array.push(getPercent(getPercent(getPercent(input)+input)+getPercent(input)+input)+getPercent(getPercent(input)+input)+getPercent(input)+input-input);
        array.push(getPercent(getPercent(array[0]+input))+getPercent(array[0]+input)-input);
        array.push(getPercent(getPercent(array[1]+input))+getPercent(array[1]+input)-input);
        array.push(getPercent(getPercent(array[2]+input))+getPercent(array[2]+input)-input);
        array.push(array.reduce(sum));

        //console.log(array);

        var count=0;
        $('#quater .price').each(function(){

          $(this).html(' $'+array[count].toFixed(0));
            count++;
        });
    });
    $('#banner-input').trigger('change');
    $('.faqarrow').on('click',function(){
        $(this).toggleClass('active');
        $(this).parent().parent().find('.ask').slideToggle();
    });
    $('.controls-news img:first-child').on('click',function(e){
        e.preventDefault();
        if(parseInt($('.abs').css('top'))<0)
        $('.abs').animate({
            top:'+=133px'
        });
    });
    $('.controls-news img:last-child').on('click',function(){
        if(-1*(parseInt($('.abs').css('top'))-257)!=parseInt($('.abs').css('height'))){
            console.log(-1*(parseInt($('.abs').css('top'))-257)+';'+parseInt($('.abs').css('height')));
            $('.abs').animate({
                top:'-=133px'
            });
        }

    });




$('#news_image').attr('src',$("#little_news li.active img").attr('src'));


            $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            });

            //$('#banner-input').focusin(function(){
            //    if(this.value =='Enter investing amount: 10,000')
            //        this.value='';
            //
            //}).focusout(function(){
            //    if(this.value=='')
            //        this.value='Enter investing amount: 10,000';
            //});



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

    function switch_html(obj1, obj2)
    {
        //vars
        var val1 = $(obj1).html();
        var val2 = $(obj2).html();

        //switch values
        $(obj1).html(val2);
        $(obj2).html(val1);
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
        base = $('#'+amountClass+' select').val().substr(0,3);  //define the base currency depending on the updated value
        foreign = $('#'+parentDivSibling+' select').val().substr(0,3); //foreign, is the opposite currency of the base
        amount = $('#'+amountClass+'>input').val();

        oppositeAmount = $('#'+parentDivSibling+' input[name="amount"]');


        setTimeout(submitFormAjax, 100);//set timeout for request
        return false;


    });


    $('.foreignC').on('change', function(){

        //class name of the modified input
        var amountClass = $(this).parent().eq(0).attr('id');
        var parentDiv 	= $(this).parent().eq(0).attr('id');
        var parentDivSibling =$('#baseWrap').attr('id');

        //value
        /*
         base = $('#'+amountClass+' select').val();  //define the base currency depending on the updated value
         foreign = $('#'+parentDivSibling+' select').val(); //foreign, is the opposite currency of the base
         */

        foreign = $('#'+amountClass+' select').val().substr(0,3);  //define the base currency depending on the updated value
        base = $('#'+parentDivSibling+' select').val().substr(0,3); //foreign, is the opposite currency of the base
        amount = $('#'+parentDivSibling+'>input').val();
        console.log(amountClass+' '+parentDiv+' '+parentDivSibling);
        console.log('amount:'+amount+' base:'+base+' foreign:'+foreign);

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



        //value
        base = jQuery('#'+amountClass+' select').val().substr(0,3);  //define the base currency depending on the updated value
        foreign = jQuery('#'+parentDivSibling+' select').val().substr(0,3); //foreign, is the opposite currency of the base
        amount = jQuery('#'+amountClass+'>input').val();

        oppositeAmount = jQuery('#'+parentDivSibling+' input[name="amount"]');


        setTimeout(submitFormAjax, 500);//set timeout for request
        return false;




    });


//post values
    function submitFormAjax() {
        //if ( amount <=0  ){ return false };

        $.ajax({
            type: "GET",
            url: "/api",
            //url:"",
            data: { base: base, foreign:foreign }
        }).done(function( response ) {
            //$(oppositeAmount).val(format_n(response));
            $(oppositeAmount).val(response.rate*amount);
        });

    }
    
	
	$('.mob .select2').addClass('visible-xs');

//switching values between fields
    $('img[alt=divider]').on('click', function (){
        switch_html( $('.img-flag').eq(0).parent(),$('.img-flag').eq(1).parent() );
        switch_values($('#baseWrap select'),$('#foreignWrap select'))
        base = $('#baseWrap select').val().substr(0,3); //foreign, is the opposite currency of the base
        foreign = $('#foreignWrap select').val().substr(0,3);  //define the base currency depending on the updated value
        amount = $('#baseWrap>input').val();
        console.log(base,foreign,amount);
        oppositeAmount = jQuery('#foreignWrap input[name="amount"]');
        submitFormAjax();
    });

});
