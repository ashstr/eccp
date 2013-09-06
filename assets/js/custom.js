jQuery(document).ready(function($){
	
	
/*----------------------------------------------------*/
/*	Main Navigation
/*----------------------------------------------------*/

	/* Menu */
	(function() {

		var $mainNav    = $('#navMain').children('ul');

		$mainNav.on('mouseenter', 'li', function() {
			var $this    = $(this),
				$subMenu = $this.children('ul');
			if( $subMenu.length ) $this.addClass('hover');
			$subMenu.hide().stop(true, true).fadeIn(250);
		}).on('mouseleave', 'li', function() {
			$(this).removeClass('hover').children('ul').stop(true, true).fadeOut(50);
		});
		
	})();
	
	/* Responsive Menu */
	domready(function(){
			
		selectnav('nav', {
			label: 'Menu',
			nested: true,
			indent: '--'
		});
				
	});
	
	
/* Style for JS-enabled */
/*----------------------------------------------------*/
	$('body').addClass('js-enabled');	
	

	

/* Example Grid */
/*----------------------------------------------------*/	
	$('.hidden-code').click(function(e) {
				e.preventDefault();
				$(this).children('.gist').slideToggle();
			})

			var originalText;
			$('.example-grid').children().hover(
				function() {
					originalText = $(this).text();
					$(this).html($(this).width()+'px');
				},
				function() {
					$(this).html(originalText);
	})

	
/* ADD PLACEHOLDER FIELD TO FORMS */
/*----------------------------------------------------*/
	
	$(".placeholderField").focus(function(){
    	if($(this).val()==$(this).attr('title')){
        	$(this).val('');
        }
    });
    $(".placeholderField").blur(function(){
    	if($(this).val()==''){
       		$(this).val($(this).attr('title'));
       	}
    });
    $(".placeholderField").blur();

	
	
/* DROP DOWN PANEL */
/*----------------------------------------------------*/
	$('#topDropBut').click(function(e){
		e.preventDefault();
		$('.topDropPanel').slideToggle();
	});
	
	
	
/*	Back To Top Button
/*----------------------------------------------------*/
		var pxShow = 300;//height on which the button will show
		var fadeInTime = 400;//how slow/fast you want the button to show
		var fadeOutTime = 400;//how slow/fast you want the button to hide
		var scrollSpeed = 400;//how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'

		jQuery(window).scroll(function(){
			if(jQuery(window).scrollTop() >= pxShow){
				jQuery("#backtotop").fadeIn(fadeInTime);
			}else{
				jQuery("#backtotop").fadeOut(fadeOutTime);
			}
		});
		 
		jQuery('#backtotop a').click(function(){
			jQuery('html, body').animate({scrollTop:0}, scrollSpeed); 
			return false; 
		}); 
		
	
/*	Accordion
/*----------------------------------------------------*/
	(function() {

		var $container = $('.accContainer'),
			$trigger   = $('.accTrigger');

		$container.hide();
		$trigger.first().addClass('active').next().show();

		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth-2);
		$container.css('width', fullWidth-2);
		
		$trigger.on('click', function(e) {
			if( $(this).next().is(':hidden') ) {
				$trigger.removeClass('active').next().slideUp(300);
				$(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});

	})();
	
	
		
	
/*	Isotope Portfolio Filter
/*----------------------------------------------------*/

	$(function() {
		var $container = $('#portfolioWrap');
				$select = $('#filters select');
				
		// initialize Isotope
		$container.isotope({
		  // options...
		  resizable: false, // disable normal resizing
		  // set columnWidth to a percentage of container width
		  masonry: { columnWidth: $container.width() / 12 }
		});

		// update columnWidth on window resize
		$(window).smartresize(function(){
		  $container.isotope({
			// update columnWidth to a percentage of container width
			masonry: { columnWidth: $container.width() / 12 }
		  });
		});
		
		
      $container.isotope({
        itemSelector : '.portfolioItem'
      });
	  
	$select.change(function() {
			var filters = $(this).val();
	
			$container.isotope({
				filter: filters
			});
		});
      
      var $optionSets = $('#filters .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });
});

/* Hover Directional
/*----------------------------------------------------*/  
 $(function() {
   $('.da-thumbs > article').hoverdir();
});
   

/* Zoom Effect
/*----------------------------------------------------*/ 
if($('.da-thumbs').length){
        
        $('article').hover(
            function () {
                if ($.browser.chrome || $.browser.webkit ) {
                    $(this).find('section img').css('-webkit-transform', 'scale(1.5) ');
                }else if ($.browser.mozilla){
                    $(this).find('section img').css('-moz-transform', 'scale(1.5) rotate(0.1deg)');
                }else if($.browser.opera){
                    $(this).find('section img').css('-o-transform', 'scale(1.5)'); 
                }else if($.browser.msie){
                    $(this).find('section img').css('-ms-transform', 'scale(1.5)'); 
                }
            }, 
            function () {
                if ($.browser.chrome || $.browser.webkit) {
                    $(this).find('section img').css('-webkit-transform', 'scale(1) ');
                } else if ($.browser.mozilla){
                    $(this).find('section img').css('-moz-transform', 'scale(1) rotate(0deg)');
                } else if($.browser.opera){
                    $(this).find('section img').css('-o-transform', 'scale(1)'); 
                } else if($.browser.msie){
                    $(this).find('section img').css('-ms-transform', 'scale(1)'); 
                }    
            }
            );
    }
	
	
    
    
/* Uniform */
/*----------------------------------------------------*/	
	$(document).ready(function(){
   $("input:checkbox, input:radio, input:file").uniform();
});
	
	
/* Tabs 
/*----------------------------------------------------*/

	var tabs = $('ul.tabs');

	tabs.each(function(i) {

		//Get all tabs
		var tab = $(this).find('> li > a');
		tab.click(function(e) {

			//Get Location of tab's content
			var contentLocation = $(this).attr('href');

			//Let go if not a hashed one
			if(contentLocation.charAt(0)=="#") {

				e.preventDefault();

				//Make Tab Active
				tab.removeClass('active');
				$(this).addClass('active');

				//Show Tab Content & add active class
				$(contentLocation).show().addClass('active').siblings().hide().removeClass('active');

			}
		});
	});	
    
   


	
	
	
/*	Contact Form
/*----------------------------------------------------*/

(function() {
var animateSpeed=1000;

var emailReg = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;

		//if submit button is clicked
        function validateName(name)
        {
                    if (name.val()=='*') 
                        {
                            name.addClass('validation-error',animateSpeed);
                            return false;
                        }
                    else
                        {
                            name.removeClass('validation-error',animateSpeed);
                            return true;
                        }
         }
		 
         function validateEmail(email,regex)
         {
                    if (!regex.test(email.val()))
                        {
                            email.addClass('validation-error',animateSpeed);
                            return false;
                        }
                    else
                        {
                            email.removeClass('validation-error',animateSpeed);
                            return true;
                        }
         }
		 
         function validateMessage(message)
         {
                    if (message.val()=='')
                        {
                            message.addClass('validation-error',animateSpeed);
                            return false;
                        }
                     else
                         {
                             message.removeClass('validation-error',animateSpeed);
                             return true;
                         }
          }
                
		$('#send').click(function()
        {
		// result of action
                var result=true;
                
		//Get the data from all the fields
		var name = $('input[name=name]');
		var email = $('input[name=email]');
		var message = $('textarea[name=message]');
                
                
         // validate of name input
         if(!validateName(name)) result=false;
         if(!validateEmail(email,emailReg)) result=false;
         if(!validateMessage(message)) result=false;
		
         if(result==false) return false;
		//organize the data properly
		var data = 'name=' + name.val() + '&email=' + email.val() + '&message='  + encodeURIComponent(message.val());
		
		//disabled all the text fields
		$('.text').attr('disabled','true');
		
		//show the loading sign
		$('.loading').fadeIn('slow');
		
		//start the ajax
		$.ajax({
		
			//this is the php file that processes the data and send mail
			url: "contact.php",	
			
			//GET method is used
			type: "GET",

			//pass the data			
			data: data,		
			
			//Do not cache the page
			cache: false,
			
			//success
			success: function (html) {				
				//if process.php returned 1/true (send mail success)
				if (html==1) {	

					//show the loading sign
					$('.loading').fadeOut('slow');	
					
					//show the success message
					$('.success-message').slideDown('slow');
                                        
                    //deactivate submit
					$('#send').attr('disabled',true);
					
				//if process.php returned 0/false (send mail failed)
				} else 
               
			   {
                  $('.loading').fadeOut('slow')
                  alert('Sorry, unexpected error. Please try again.');				
               }
			   
			}		
		});
		
		//cancel the submit button default behaviours
		return false;
        });
        $('input[name=name]').blur(function(){
           validateName($(this)); 
        });
        $('input[name=email]').blur(function(){
           validateEmail($(this),emailReg); 
        });
        $('textarea[name=message]').blur(function(){
           validateMessage($(this)); 
        });
       
})();




});

