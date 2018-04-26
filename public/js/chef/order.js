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
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(47);


/***/ }),

/***/ 47:
/***/ (function(module, exports) {

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btn-go-to-top").style.display = "block";
    } else {
        document.getElementById("btn-go-to-top").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
$('#btn-go-to-top').click(function (e) {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});

var order = new Vue({
    el: '#show-order',
    methods: {
        changeStatusToCooking: function changeStatusToCooking(id, menu_id) {
            console.log(menus[menu_id].name);
            console.log(csrf_token);
            $('#modal-title').text(menus[menu_id].name);
            $('#modal-text').text($('#cooking' + id).text() + 'ใช่หรือไม่ ?');
            document.getElementById('confirm-modal').style.display = "block";
            $('#save').click(function (e) {
                $('#cooked' + id).removeAttr('hidden');
                $('#cooking' + id).hide();
                document.getElementById("confirm-modal").style.display = "none";
                $.ajax({
                    method: "post",
                    url: "/chef/orders/",
                    data: {
                        _token: csrf_token,
                        id: id
                    }
                });
            });
        },
        changeStatusToCooked: function changeStatusToCooked(id, menu_id) {
            $('table#order-table tr#' + id).remove();
        }
    }
});

/***/ })

/******/ });