// side bar
(function ($) {
	"use strict";
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		$('.custom-menu').toggleClass('act');
	});

})(jQuery);

// right click
document.addEventListener("contextmenu", function (e) {
	e.preventDefault();
}, false);

// Score Calculations

var total_ques = 0;
var result = [];

function get_result() {
	for(let i = 1; i <= total_ques; i++) {
		var radios = document.getElementsByName(`radio-${i}`);
		var info = {};
		info['ques_no'] = i;
		var flag = true;
		for(let j = 0; j < radios.length; j++) {
			if (radios[j].checked) {
				info['selected'] = radios[j].value;
				info['select_no'] = j + 1;
				flag = false;
			}
		}
		if(flag) {
			info['selected'] = "_blank_";
			info['select_no'] = 0;
		}
		result[i - 1] = info;
	}
	const data_json = JSON.stringify(result)
    window.location.href = "../quiz/assets/javascript/result.php?data="+data_json

}


// set time
var offset = 0;
function duration(offs) {
	var ss = offs;
	var time = setInterval(() => {
		let h = parseInt(ss / 3600).toString();
		let m = (parseInt(ss / 60) % 60).toString();
		let s = parseInt(ss % 60).toString();
		document.getElementById('time').innerHTML = `${h.length == 1 ? `0${h}` : h} : ${m.length == 1 ? `0${m}` : m} : ${s.length == 1 ? `0${s}` : s}`;
		ss--;
		if (ss == -1) {
			clearTimeout(time)
			document.getElementById('test').style.display = "none";
			finishMsg(`Your time is out!!<br>Click OK to Finish test`);
		}
	}, 1000);
}

// to open test

function finishMsg(s) {
	document.getElementById('message').className = "start-show";
	document.getElementById('last-msg').innerHTML = s;
}

function warningMsg(s) {
	document.getElementById('warning').className = "start-show";
	document.getElementById('msg').innerHTML = s;
}

var cnt = 4;

window.addEventListener('DOMContentLoaded', (event) => {
	document.getElementById('yes').onclick = (e) => {
		e.preventDefault();
		document.getElementById('start').className = "start-show start-go";
		setTimeout(() => {
			document.getElementById('test').requestFullscreen().then(function() {}).catch(function(error) {});
			document.getElementById('test').style.display = "flex";
			duration(offset);
		}, 200);
		cnt--;
	}
	document.getElementById('no').onclick = (e) => {
		e.preventDefault();
		window.close()
	}
	
});

if (document.addEventListener) {
	document.addEventListener('fullscreenchange', exitHandler, false);
	document.addEventListener('mozfullscreenchange', exitHandler, false);
	document.addEventListener('MSFullscreenChange', exitHandler, false);
	document.addEventListener('webkitfullscreenchange', exitHandler, false);
}
var flag = true;
function exitHandler() {
	// console.log(document.fullscreenElement, document.webkitIsFullScreen)
	if (flag && (document.webkitIsFullScreen === false || document.mozFullScreen === false || document.msFullscreenElement === false)) {
		document.getElementById('test').style.display = "none";
		if (cnt <= 0) {
			finishMsg(`Sorry, You have no attempt left!!<br>Click Ok to Finish Test`);
		} else {
			warningMsg(`You have disable Fullscreen mode and now you are left with only ${cnt} attempts!!`);
		}
	} 
}

document.getElementById('ok-exit').onclick = (e) => {
	e.preventDefault();
	get_result();
	window.close();
}

document.getElementById('yes-exit').onclick = (e) => {
	e.preventDefault();
	get_result();
	window.close();
}

document.getElementById('no-exit').onclick = (e) => {
	e.preventDefault();
	document.getElementById('warning').className = "start-show start-go";
	document.body.requestFullscreen().then(function() { }).catch(function(error) { });
	document.getElementById('test').style.display = "flex";
	cnt--;
	flag = true;
}

document.addEventListener("keydown", function(event){
	var key = event.keyCode;
	// console.log(key)
    if (key == 123 || (event.ctrlKey && event.shiftKey && key == 73) || (event.ctrlKey && event.shiftKey && key == 74)) {
		document.getElementById('test').style.display = "none";
		document.exitFullscreen().then(function() { flag = false; }).catch(function(error) { });
	    finishMsg(`You are not allowed to use dev tool!!<br>Click Ok to Finish Test`);
	}
}, false);

function finishTest() {
	document.exitFullscreen().then(function() { flag = false; }).catch(function(error) { });
	document.getElementById('test').style.display = "none";
	if (cnt <= 0) {
		finishMsg(`Sorry, You have no attempt left!!<br>Click Ok to Finish Test`);
	} else {
		warningMsg(`You still have some time left and ${cnt} attempts!!`);
	}
}

// render questions in html

fetch("../quiz/assets/javascript/questions.json").then(response => response.json()).then(resp => {
	let n = resp.data.length;
	total_ques = n;
	if (n == 0) {
		document.getElementById('message').className = "start-show";
		document.getElementById('last-msg').innerHTML = `Sorry this test doesn't exist!!!`;
		window.close();
		return;
	}
	document.getElementById('subject').innerHTML = resp.detail.test_name;
	offset = (60 * resp.detail.test_hrs);
	const side_obj = document.querySelector('#side-obj');
	const obj = document.querySelector('#obj');
	let side_content = '';
	let content = '';
	if (n == 1) {
		let id = parseInt(resp.data[0].ques_no, 10);
		let question = resp.data[0].question;
		let option1 = resp.data[0].choice1;
		let option2 = resp.data[0].choice2;
		let option3 = resp.data[0].choice3;
		let option4 = resp.data[0].choice4;

		let side_ele = `<li id="lq${id}" class="active">
							<a onclick="moveTo('q${id}')"><span class="fa ri-arrow-right-fill mr-3"></span> Question ${id}</a>
						</li>`;
		side_content += side_ele;

		let ele = `<div class="wrap" id="q${id}">
						<div class="text-center pb-4">
							<div class="h5 font-weight-bold">${id} of ${n} </div>
						</div>
						<div class="h4 font-weight-bold"> ${id}. ${question}</div>
						<div class="pt-4">
							<form class="form-d">
								<label class="options">${option1} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option2} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option3} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option4} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
							</form>
						</div>
						<div class="d-flex justify-content-end pt-2">
							<button class="btn btn-primary" id="sub">Submit </button>
						</div>
					</div>`;
		content += ele;
	} else {
		let id = parseInt(resp.data[0].ques_no, 10);
		let question = resp.data[0].question;
		let option1 = resp.data[0].choice1;
		let option2 = resp.data[0].choice2;
		let option3 = resp.data[0].choice3;
		let option4 = resp.data[0].choice4;

		let side_ele = `<li id="lq${id}" class="active">
							<a onclick="moveTo('q${id}')"><span class="fa ri-arrow-right-fill mr-3"></span> Question ${id}</a>
						</li>`;
		side_content += side_ele;

		let ele = `<div class="wrap" id="q${id}">
						<div class="text-center pb-4">
							<div class="h5 font-weight-bold">${id} of ${n} </div>
						</div>
						<div class="h4 font-weight-bold"> ${id}. ${question}</div>
						<div class="pt-4">
							<form class="form-d">
								<label class="options">${option1} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option2} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option3} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option4} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
							</form>
						</div>
						<div class="d-flex justify-content-end pt-2">
							<button class="btn btn-primary" onclick="change('q${id}', 'q${id + 1}', 'next')" id="next${id}">Next <span class="fas fa-arrow-right"></span> </button>
						</div>
					</div>`;
		content += ele;

		for (let i = 1; i < n - 1; i++) {
			id = parseInt(resp.data[i].ques_no, 10);
			question = resp.data[i].question;
			option1 = resp.data[i].choice1;
			option2 = resp.data[i].choice2;
			option3 = resp.data[i].choice3;
			option4 = resp.data[i].choice4;

			side_ele = `<li id="lq${id}">
							<a onclick="moveTo('q${id}')"><span class="fa ri-arrow-right-fill mr-3"></span> Question ${id}</a>
						</li>`;
			side_content += side_ele;

			ele = `<div class="wrap" id="q${id}">
							<div class="text-center pb-4">
								<div class="h5 font-weight-bold">${id} of ${n} </div>
							</div>
							<div class="h4 font-weight-bold"> ${id}. ${question}</div>
							<div class="pt-4">
								<form class="form-d">
									<label class="options">${option1} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
									<label class="options">${option2} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
									<label class="options">${option3} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
									<label class="options">${option4} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								</form>
							</div>
							<div class="d-flex justify-content-end pt-2">
								<button class="btn btn-primary mx-3" onclick="change('q${id}', 'q${id - 1}', 'prev')" id="back${id - 1}"><span class="fas fa-arrow-left pr-1"></span>Previous </button>
								<button class="btn btn-primary" onclick="change('q${id}', 'q${id + 1}', 'next')" id="next${id}">Next <span class="fas fa-arrow-right"></span> </button>
							</div>
						</div>`;
			content += ele;
		}

		id = parseInt(resp.data[n - 1].ques_no, 10);
		question = resp.data[n - 1].question;
		option1 = resp.data[n - 1].choice1;
		option2 = resp.data[n - 1].choice2;
		option3 = resp.data[n - 1].choice3;
		option4 = resp.data[n - 1].choice4;

		side_ele = `<li id="lq${id}">
						<a onclick="moveTo('q${id}')"><span class="fa ri-arrow-right-fill mr-3"></span> Question ${id}</a>
					</li>`;
		side_content += side_ele;

		ele = `<div class="wrap" id="q${id}">
						<div class="text-center pb-4">
							<div class="h5 font-weight-bold">${id} of ${n} </div>
						</div>
						<div class="h4 font-weight-bold"> ${id}. ${question}</div>
						<div class="pt-4">
							<form class="form-d">
								<label class="options">${option1} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option2} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option3} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
								<label class="options">${option4} <input type="radio" name="radio"> <span class="checkmark"></span> </label>
							</form>
						</div>
						<div class="d-flex justify-content-end pt-2">
							<button class="btn btn-primary mx-3" onclick="change('q${id}', 'q${id - 1}', 'prev')" id="back${id - 1}"> <span class="fas fa-arrow-left pr-2"></span>Previous </button>
							<button class="btn btn-primary" onclick="finishTest()" id="sub">Submit </button>
						</div>
					</div>`;
		content += ele;
	}


	obj.innerHTML = content;
	side_obj.innerHTML = side_content;
})

function moveTo(id) {
	var wraps = document.querySelectorAll(".wrap");
	var child = document.getElementById('side-obj').children;
	for (let i = 0; i < wraps.length; i++) {
		if (wraps[i].id < id) {
			document.getElementById(wraps[i].id).style.left = "-1000px";
			document.getElementById(wraps[i].id).style.position = "absolute";
		} else if (wraps[i].id > id) {
			document.getElementById(wraps[i].id).style.left = "1000px";
			document.getElementById(wraps[i].id).style.position = "absolute";
		}
		document.getElementById(child[i].id).className = "";
	}
	document.getElementById(`l${id}`).className = "active";
	document.getElementById(id).style.position = "relative";
	document.getElementById(id).style.left = "15px";
}

function change(id1, id2, value) {
	if (value == "prev") {
		document.getElementById(id1).style.left = "1000px";
	} else {
		document.getElementById(id1).style.left = "-1000px";
	}
	document.getElementById(id2).style.position = "relative";
	document.getElementById(`l${id2}`).className = "active";
	setTimeout(() => {
		document.getElementById(id1).style.position = "absolute";
		document.getElementById(`l${id1}`).className = "";
	}, 400)
	document.getElementById(id2).style.left = "15px";
}


document.addEventListener('DOMContentLoaded', function () {
	const main = document.querySelector('#content')
	const toggleSwitch = document.querySelector('.slider')

	toggleSwitch.addEventListener('click', () => {
		main.classList.toggle('dark-theme')
	})
})

