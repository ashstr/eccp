/* Style Switcher */

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();

$(document).ready(function(){ 
						   
var styleswitcherstr = ' \
	<h2>Select<br/>Color <a href="#"></a></h2> \
    <div class="switcherContent"> \
    <div class="switcherBox"> \
	<a id="pink" class="swatch"></a> \
    <a id="green" class="swatch"></a> \
    <a id="teal" class="swatch"></a> \
    <a id="blue" class="swatch"></a> \
    <a id="orange" class="swatch"></a> \
    <a id="red" class="swatch"></a> \
    </div><!-- End switcherBox --> \
    </div><!-- End switcherContent --> \
	';
	
$(".switcher").prepend( styleswitcherstr );

});



/* Skins Style */
$(document).ready(function(){ 

var cookieName = 'green';

function changeLayout(layout) {
$.cookie(cookieName, layout);
$('head link[name=skins]').attr('href', 'assets/css/skins/'+layout+'.css');
}

if( $.cookie(cookieName)) {
changeLayout($.cookie(cookieName));
}

$("#pink").click( function(){ $
changeLayout('pink');
});

$("#green").click( function(){ $
changeLayout('green');
});

$("#teal").click( function(){ $
changeLayout('teal');
});

$("#blue").click( function(){ $
changeLayout('blue');
});

$("#orange").click( function(){ $
changeLayout('orange');
});

$("#red").click( function(){ $
changeLayout('red');
});







});


/* Reset Switcher */
$(document).ready(function(){ 

// Style Switcher	
$('.switcher').animate({
left: '-60px'
});

$('.switcher h2 a').click(function(e){
e.preventDefault();
var div = $('.switcher');
console.log(div.css('left'));
if (div.css('left') === '-60px') {
$('.switcher').animate({
  left: '0px'
}); 
} else {
$('.switcher').animate({
  left: '-60px'
});
}
})


		 
});						   

