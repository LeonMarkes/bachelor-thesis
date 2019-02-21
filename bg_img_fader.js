$(document).ready(function(){
	
	var imageArray = [
	'img/background/bg1.jpg',
    'img/background/bg2.jpg',
    'img/background/bg3.jpg',
    'img/background/bg4.jpg',
	'img/background/bg5.jpg',
	'img/background/bg6.jpg',
	'img/background/bg7.jpg',
	'img/background/bg8.jpg',
	'img/background/bg9.jpg',
	'img/background/bg10.jpg',
	'img/background/bg11.jpg'
]

var itemInterval = 4000;
var numberOfItems = 11;
var currentItem = 1;
  
function changeImage () {
    $('body').css('background', 'url(' + imageArray[currentItem] + ')');
    if (currentItem === numberOfItems - 1) {
        currentItem = 0;
    } else {
        currentItem++
    }
}

setInterval(function () {
	changeImage();
}, itemInterval)
	
	/*
	var count = 0;
	var images = ["img/background/bg1.jpg", "img/background/bg2.jpg", "img/background/bg3.jpg", "img/background/bg4.jpg", "img/background/bg5.jpg", "img/background/bg6.jpg", "img/background/bg7.jpg", "img/background/bg8.jpg", "img/background/bg9.jpg", "img/background/bg10.jpg", "img/background/bg11.jpg"];
	var image = $(".bg");
	
	image.css("background-image", "url("+images[count]+")");

	setInterval(function(){
		image.fadeOut(500, function() {
			image.css("background-image", "url("+images[++count]+")");
			image.fadeIn(500);
		});
		if(count == images.length) {
			count = 0;
		}
	}, 30000);*/
});