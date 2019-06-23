window.onscroll = function () {
	scrollFunction();
};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.querySelector('header').style.background = 'rgba(34,139,34,0.7)';
	} 
	else{
		document.querySelector('header').style.background = 'transparent';
	}

};

$('.menu-title a').click(function(event) {
	var titles = document.querySelectorAll('.menu-title');
	for (var i = titles.length - 1; i >= 0; i--) {
		titles[i].className= titles[i].className.replace(' active', '');
	}

	event.target.parentNode.className+=' active';
});

