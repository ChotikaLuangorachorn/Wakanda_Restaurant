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
												if (this.$data.order["m" + menu_id] >= 1) {
																this.$data.order["m" + menu_id]--;
																document.getElementById("number-menu" + menu_id).value = this.$data.order["m" + menu_id];
												}
								},
								increase: function increase(menu_id) {
												console.log(this.$data.order["m" + menu_id]);
												console.log("increase");

												this.$data.empty += "s";
												this.$data.amt++;
												this.$data.order["m" + menu_id]++;
												document.getElementById("number-menu" + menu_id).value = this.$data.order["m" + menu_id];
												console.log(this.$data.order);
								}
				},
				mounted: function mounted() {
								console.log(this.$data.order);
								console.log("mouted", menus);
								for (var i = 0; i < menus.length; i++) {
												this.$data.order["m" + menus[i].id] = 0;
								}
								console.log(this.$data.order);
				}
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

/***/ })

/******/ });