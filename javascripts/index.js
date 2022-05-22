document.querySelector('.ham').addEventListener("click", () => {
	var obj = document.querySelector('#check');
	if(obj.checked) {
		document.querySelector('.nav-bar').className = 'nav-bar';
	} else {
		document.querySelector('.nav-bar').className = 'nav-bar nav-bar-go';
	}
});

var body = document.querySelector('body');
var container = document.querySelector('#main');
var modal = document.querySelectorAll('.Modal');

document.querySelector('#admin-login').onclick = () => {
	modal[0].className = "Modal is-visuallyHidden";
	setTimeout(function() {
		container.className = "main-box is-blurred";
		modal[0].className = "Modal";
	}, 200);
	container.parentElement.className = "ModalOpen";
}

document.querySelector('#teacher-login').onclick = () => {
	modal[1].className = "Modal is-visuallyHidden";
	setTimeout(function() {
		container.className = "main-box is-blurred";
		modal[1].className = "Modal";
	}, 200);
	container.parentElement.className = "ModalOpen";
}

document.querySelector('#student-login').onclick = () => {
	modal[2].className = "Modal is-visuallyHidden";
	setTimeout(function() {
		container.className = "main-box is-blurred";
		modal[2].className = "Modal";
	}, 200);
	container.parentElement.className = "ModalOpen";
}


// for closing modal window...
var close = document.querySelectorAll('.Close');

for(let i = 0; i < close.length; i++) {
	close[i].onclick = () => {
		setTimeout(() => {
			modal[i].className = "Modal is-hidden is-visuallyHidden";
			body.className = "";
			container.className = "main-box";
			container.parentElement.className = "";
		})
	}
}

const eye = document.querySelectorAll('.open-eye');
var closeeye = document.querySelectorAll('.close-eye');
var password = document.querySelectorAll('.password');

for(let i = 0; i < eye.length; i++) {
	eye[i].addEventListener('click', () => {
		password[i].type = 'password';
		eye[i].style.display = null;
		closeeye[i].style.display = null;
	})
	closeeye[i].addEventListener('click', () => {
		password[i].type = 'text';
		eye[i].style.display = 'inline';
		closeeye[i].style.display = 'none';
	})

}



