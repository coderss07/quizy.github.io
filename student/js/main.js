function menuToggle() {
	const toggleMenu = document.querySelector("#menu");
	toggleMenu.classList.toggle("visible");
}

var down = false;
$(document).ready(function () {

	$('#bell').click(function (e) {

		var color = $(this).text();
		if (down) {
			$('#box').css('display', 'none');
			down = false;
		} else {
			$('#box').css('display', 'block');
			down = true;

		}

	});
});

window.onclick = (event) => {
	var obj = document.querySelector(".action").querySelectorAll("*");;
	// console.log(event.childrens)
	var f = true;
	for (var i = 0; i < obj.length; i++) {
		if (obj[i] == event.target) {
			f = false;
			break;
		}
	}
	if(f) {
		document.querySelector("#menu").className = ""
	}
	var btn = document.querySelector('#bell')
	obj = document.querySelector("#noti").querySelectorAll("*");;
	// console.log(event.childrens)
	f = true;
	for (var i = 0; i < obj.length; i++) {
		if (obj[i] == event.target) {
			f = false;
			break;
		}
	}

	if (event.target != btn && f) {
		$('#box').css('display', 'none');
		down = false;
	}
}