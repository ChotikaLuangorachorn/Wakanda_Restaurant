/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {


console.log(categories);
if (categories.length != 0) {
	for (index in categories) {
		var category_id = '#card-category' + categories[index].id;
		$(category_id).hide();
		console.log(category_id);
	}
	$('#card-category1').show();
}

var selectCategory = new Vue({
	el: '#btn-category',
	methods: {
		showMenu: function showMenu(id) {
			$('#card-category' + id).show();
			for (index in categories) {
				if (categories[index].id != id) {
					$('#card-category' + categories[index].id).hide();
				}
			}
		}
	}
});

var selectNumber = new Vue({
	el: '#menu-list',
	data: {
		order: {}
	},
	methods: {
		decrease: function decrease(menu_id) {
			if (this.$data.order[menu_id] >= 1) {
				this.$data.order[menu_id]--;
				document.getElementById("number-menu" + menu_id).value = this.$data.order[menu_id];
				console.log(this.$data.order);
			}
		},
		increase: function increase(menu_id) {
			console.log(this.$data.order[menu_id]);
			console.log("increase");
			if (!(menu_id in this.$data.order)) this.$data.order[menu_id] = 1;else this.$data.order[menu_id]++;
			document.getElementById("number-menu" + menu_id).value = this.$data.order[menu_id];
			console.log(this.$data.order);
		}
	},
	mounted: function mounted() {}
});

//btn-go-to-top

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
	scrollFunction();
};

function scrollFunction() {
	if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
		document.getElementById("btn-go-to-top").style.display = "block";
		document.getElementById("btn-basket").style.display = "block";
	} else {
		document.getElementById("btn-go-to-top").style.display = "none";
		document.getElementById("btn-basket").style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document
$('#btn-go-to-top').click(function (e) {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
});

//modal basket
$('.fa-shopping-basket').click(function (e) {
	document.getElementById('modal-basket').style.display = 'block';
	showOrderingTable();
	$("#order").val(JSON.stringify(selectNumber.order));
});

function showOrderingTable() {
	tbody = $("#tbody-ordering");
	console.log(menus);
	tbody.empty();
	var total_price = 0.0;
	Object.keys(selectNumber.order).forEach(function (menu_id) {
		if (selectNumber.order[menu_id] != 0) {

			tr = tbody.append("<tr id='list'></tr>").children().last();
			tr.append("<td scope='row'>" + menus[menu_id].name + "</td>");
			tr.append("<td scope='row' style='text-align:right;'>" + selectNumber.order[menu_id] + "</td>");
			tr.append("<td scope='row' style='text-align:right;'>" + menus[menu_id].price * selectNumber.order[menu_id] + "</td>");
			total_price += menus[menu_id].price * selectNumber.order[menu_id];
		}
	});
	$('#total_price').text(total_price);
	if (total_price == 0) {
		$('#btn-purchase').hide();
	} else {
		$('#btn-purchase').show();
	}
};
$('#btn-purchase').click(function (e) {
	document.getElementById('modal-purchase').style.display = 'block';
});
// $("#btn-purchase").click(function(e){
// 	console.log("purchase");
// 	$.ajax({
// 		method: "post",
// 		data: {
// 			m1:1,
// 			m2:2
// 		},
// 		url: "/order"
// 	})
// })

/***/ })

/******/ });