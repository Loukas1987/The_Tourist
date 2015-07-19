

//------------------------------
//ON RESIZE
//------------------------------
$(window).resize(function() {
	updateAbOver();
});


//jQuery(function ($) {
//	$("a").tooltip()
//});

//------------------------------
//slider parallax effect
//------------------------------
	  jQuery(document).ready(function($){
		var $scrollTop;
		var $headerheight;
		var $loggedin = false;
			
		if($loggedin == false){
		  $headerheight = $('.navbar-wrapper2').height() - 20;
		} else {
		  $headerheight = $('.navbar-wrapper2').height() + 100;
		}
		
		
		$(window).scroll(function(){
		  var $iw = $('body').innerWidth();
		  $scrollTop = $(window).scrollTop();	   
			  if ( $iw < 992 ) {
			 
			  }
			  else{
			   $('.navbar-wrapper2').css({'min-height' : 110-($scrollTop/2) +'px'});
			  }
		  $('#dajy').css({'top': ((- $scrollTop / 5)+ $headerheight)  + 'px' });
		  //$(".sboxpurple").css({'opacity' : 1-($scrollTop/300)});
		  $(".scrolleffect").css({'top': ((- $scrollTop / 5)+ $headerheight) + 50  + 'px' });
		  $(".tp-leftarrow").css({'left' : 20-($scrollTop/2) +'px'});
		  $(".tp-rightarrow").css({'right' : 20-($scrollTop/2) +'px'});
		});
		
	  });

	  
//------------------------------
//On scroll animations
//------------------------------
		jQuery(window).scroll(function(){            
			var $iw = $('body').innerWidth();
			
			if(jQuery(window).scrollTop() != 0){
				jQuery('.mtnav').stop().animate({top: '0px'}, 500);
				jQuery('.logo').stop().animate({width: '100px'}, 100);
			}       
			else {	
				 if ( $iw < 992 ) {
				  }
				  else{
				   jQuery('.mtnav').stop().animate({top: '30px'}, 500);
				  }
				jQuery('.logo').stop().animate({width: '120px'}, 100);		
			}
			
			//Social
 			if(jQuery(window).scrollTop() >= 700){
				jQuery('.social1').stop().animate({top:'0px'}, 100);
				
				setTimeout(function (){
					jQuery('.social2').stop().animate({top:'0px'}, 100);
				}, 100);
				
				setTimeout(function (){
					jQuery('.social3').stop().animate({top:'0px'}, 100);
				}, 200);
				
				setTimeout(function (){
					jQuery('.social4').stop().animate({top:'0px'}, 100);
				}, 300);
				
				setTimeout(function (){
					jQuery('.gotop').stop().animate({top:'0px'}, 200);
				}, 400);				
				
			}       
			else {
				setTimeout(function (){
					jQuery('.gotop').stop().animate({top:'100px'}, 200);
				}, 400);	
				setTimeout(function (){
					jQuery('.social4').stop().animate({top:'-120px'}, 100);				
				}, 300);
				setTimeout(function (){
					jQuery('.social3').stop().animate({top:'-120px'}, 100);		
				}, 200);	
				setTimeout(function (){
				jQuery('.social2').stop().animate({top:'-120px'}, 100);		
				}, 100);	

				jQuery('.social1').stop().animate({top:'-120px'}, 100);			

			}
			
			
		});	
