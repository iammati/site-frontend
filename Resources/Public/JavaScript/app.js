/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/JavaScript/App/Event/DOM/Nodes/Button/AlertClick.js":
/*!************************************************************************!*\
  !*** ./assets/src/JavaScript/App/Event/DOM/Nodes/Button/AlertClick.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ AlertClick)
/* harmony export */ });
/* harmony import */ var _Event_AbstractEvent__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../Event/AbstractEvent */ "./assets/src/JavaScript/Event/AbstractEvent.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var AlertClick = /*#__PURE__*/function (_AbstractEvent) {
  _inherits(AlertClick, _AbstractEvent);

  var _super = _createSuper(AlertClick);

  function AlertClick(Container) {
    var _this;

    _classCallCheck(this, AlertClick);

    _this = _super.call(this);
    var nodes = document.getElementsByTagName('button');

    var _iterator = _createForOfIteratorHelper(nodes),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var node = _step.value;
        node.addEventListener('click', function (e) {
          alert('Hello');
        });
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    return _this;
  }

  return AlertClick;
}(_Event_AbstractEvent__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./assets/src/JavaScript/App/Listener/Load/EventLoadListener.js":
/*!**********************************************************************!*\
  !*** ./assets/src/JavaScript/App/Listener/Load/EventLoadListener.js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Event_DOM_Nodes_Button_AlertClick__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../Event/DOM/Nodes/Button/AlertClick */ "./assets/src/JavaScript/App/Event/DOM/Nodes/Button/AlertClick.js");

Application.getContainer().getInstanceByIdentifier('LoadEvent').addListener(function () {
  // The event itself
  var e = arguments.length <= 0 ? undefined : arguments[0];
  Application.getContainer().add('AlertClick', new _Event_DOM_Nodes_Button_AlertClick__WEBPACK_IMPORTED_MODULE_0__.default(Container));
});

/***/ }),

/***/ "./assets/src/JavaScript/App/Listener/Load/LoadListener.js":
/*!*****************************************************************!*\
  !*** ./assets/src/JavaScript/App/Listener/Load/LoadListener.js ***!
  \*****************************************************************/
/***/ (() => {

Application.getContainer().getInstanceByIdentifier('LoadEvent').addListener(function () {
  // The event itself
  var e = arguments.length <= 0 ? undefined : arguments[0];
  console.log('LOAD LISTENER BROOOO');
});

/***/ }),

/***/ "./assets/src/JavaScript/App/Listener/Resize/ResizeListener.js":
/*!*********************************************************************!*\
  !*** ./assets/src/JavaScript/App/Listener/Resize/ResizeListener.js ***!
  \*********************************************************************/
/***/ (() => {

Application.getContainer().getInstanceByIdentifier('ResizeEvent').addListener(function () {
  // The event itself
  var e = arguments.length <= 0 ? undefined : arguments[0]; // Additional Data

  var additionalData = arguments.length <= 1 ? undefined : arguments[1];
  var init = additionalData['init'];
  var width = additionalData['width'];
  var __breakpoint = 'xs'; // Read here more about the difference of the 0.02px-gap to the full rounded actual Breakpoints
  // https://stackoverflow.com/a/51567792/12100192

  if (width >= 575.98) {
    __breakpoint = 'sm';
  }

  if (width >= 767.98) {
    __breakpoint = 'md';
  }

  if (width >= 991.98) {
    __breakpoint = 'lg';
  }

  if (width >= 1199.98) {
    __breakpoint = 'xl';
  }

  if (width >= 1399.98) {
    __breakpoint = 'xxl';
  }

  Application.getVariablesProvider().set('Breakpoint', __breakpoint);
  Breakpoint = __breakpoint;
});

/***/ }),

/***/ "./assets/src/JavaScript/App/Project.js":
/*!**********************************************!*\
  !*** ./assets/src/JavaScript/App/Project.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/**
 * Load-Listeners
 */
__webpack_require__(/*! ./Listener/Load/LoadListener */ "./assets/src/JavaScript/App/Listener/Load/LoadListener.js");

__webpack_require__(/*! ./Listener/Load/EventLoadListener */ "./assets/src/JavaScript/App/Listener/Load/EventLoadListener.js");
/**
 * Resize-Listeners
 */


__webpack_require__(/*! ./Listener/Resize/ResizeListener */ "./assets/src/JavaScript/App/Listener/Resize/ResizeListener.js");
/**
 * Globals / Utilities
 */


__webpack_require__(/*! ./Shortcuts */ "./assets/src/JavaScript/App/Shortcuts.js");

/***/ }),

/***/ "./assets/src/JavaScript/App/Shortcuts.js":
/*!************************************************!*\
  !*** ./assets/src/JavaScript/App/Shortcuts.js ***!
  \************************************************/
/***/ (() => {

var Breakpoint = Application.getVariablesProvider().get('Breakpoint');

/***/ }),

/***/ "./assets/src/JavaScript/Application.js":
/*!**********************************************!*\
  !*** ./assets/src/JavaScript/Application.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Bootstrap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Bootstrap */ "./assets/src/JavaScript/Bootstrap.js");
/* harmony import */ var _Config_MiddlewareConfig__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Config/MiddlewareConfig */ "./assets/src/JavaScript/Config/MiddlewareConfig.js");
window.BOOTTIME_START = performance.now();


new _Bootstrap__WEBPACK_IMPORTED_MODULE_0__.default((0,_Config_MiddlewareConfig__WEBPACK_IMPORTED_MODULE_1__.default)());
window.BOOTTIME_END = performance.now();
window.MEASURED_TIME = Math.round((window.BOOTTIME_END - window.BOOTTIME_START + Number.EPSILON) * 100) / 100 + 'ms';
console.log(window.MEASURED_TIME);
var Application = window.Application;

__webpack_require__(/*! ./Project */ "./assets/src/JavaScript/Project.js");

/***/ }),

/***/ "./assets/src/JavaScript/Bootstrap.js":
/*!********************************************!*\
  !*** ./assets/src/JavaScript/Bootstrap.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Bootstrap)
/* harmony export */ });
/* harmony import */ var _Core_Container_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Core/Container.js */ "./assets/src/JavaScript/Core/Container.js");
/* harmony import */ var _Provider_VariablesProvider_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Provider/VariablesProvider.js */ "./assets/src/JavaScript/Provider/VariablesProvider.js");
/* harmony import */ var _Renderer_PageRenderer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Renderer/PageRenderer.js */ "./assets/src/JavaScript/Renderer/PageRenderer.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }





var Bootstrap = function Bootstrap(MiddlewareConfig) {
  _classCallCheck(this, Bootstrap);

  // Instancing and setting the global namespace Application inside the window object.
  window.Application = new function Application() {
    var _this = this;

    _classCallCheck(this, Application);

    _defineProperty(this, "getContainer", function () {
      return _this.container;
    });

    _defineProperty(this, "getVariablesProvider", function () {
      return _this.variablesProvider;
    });

    this.container = new _Core_Container_js__WEBPACK_IMPORTED_MODULE_0__.default(this, MiddlewareConfig); // Runs the Middleware-Stacks

    this.getContainer().getInstanceByIdentifier('MiddlewareInstance').go({// default data any middleware has
    }, function (hook) {// hook represents the object above with the default-comment
      // console.log(hook);
    }); // Variables

    this.variablesProvider = new _Provider_VariablesProvider_js__WEBPACK_IMPORTED_MODULE_1__.default(); // Renderers

    this.page = new _Renderer_PageRenderer_js__WEBPACK_IMPORTED_MODULE_2__.default();
  }();
};



/***/ }),

/***/ "./assets/src/JavaScript/Config/MiddlewareConfig.js":
/*!**********************************************************!*\
  !*** ./assets/src/JavaScript/Config/MiddlewareConfig.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ MiddlewareConfig)
/* harmony export */ });
/* harmony import */ var _Middleware_AjaxMiddleware__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../Middleware/AjaxMiddleware */ "./assets/src/JavaScript/Middleware/AjaxMiddleware.js");
/* harmony import */ var _Middleware_QueryParametersMiddleware__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Middleware/QueryParametersMiddleware */ "./assets/src/JavaScript/Middleware/QueryParametersMiddleware.js");


function MiddlewareConfig() {
  return {
    config: {
      usePriorities: true
    },
    middlewares: [{
      instance: new _Middleware_QueryParametersMiddleware__WEBPACK_IMPORTED_MODULE_1__.default(),
      priority: 1
    }, {
      instance: new _Middleware_AjaxMiddleware__WEBPACK_IMPORTED_MODULE_0__.default(),
      priority: 2
    }]
  };
}
;

/***/ }),

/***/ "./assets/src/JavaScript/Core/Container.js":
/*!*************************************************!*\
  !*** ./assets/src/JavaScript/Core/Container.js ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Container)
/* harmony export */ });
/* harmony import */ var _Middleware__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Middleware */ "./assets/src/JavaScript/Core/Middleware.js");
/* harmony import */ var _Event_DOM_LoadEvent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Event/DOM/LoadEvent */ "./assets/src/JavaScript/Event/DOM/LoadEvent.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }




var Container = function Container(Application, MiddlewareConfig) {
  var _this = this;

  _classCallCheck(this, Container);

  _defineProperty(this, "getInstanceByIdentifier", function (identifier) {
    return _this.instances[identifier];
  });

  _defineProperty(this, "add", function (identifier, instance) {
    if (typeof _this.instances[identifier] != 'undefined') {
      if (_this.instances[identifier] == instance) {
        return _this.instances[identifier];
      }

      return console.error('Container -> The identifier "' + identifier + '" has already registered for the instance: "' + _this.instances[identifier] + '"');
    }

    _this.instances[identifier] = instance;
    window.Container = {
      instances: _this.instances
    };
    return instance;
  });

  if (typeof window.Container != 'undefined') {
    return window.Container;
  } // Container Instances


  this.instances = {}; // Middlewares - Iterating through the stacks and calling each middleware

  var MiddlewareInstance = new _Middleware__WEBPACK_IMPORTED_MODULE_0__.default();
  MiddlewareConfig.middlewares.forEach(function (middleware) {
    MiddlewareInstance.use(function (hook, next) {
      middleware.instance.call(hook, next);
    });
  });
  this.add('MiddlewareInstance', MiddlewareInstance); // Event-Registrations

  this.add('DOMLoadEvent', new _Event_DOM_LoadEvent__WEBPACK_IMPORTED_MODULE_1__.default(this));
  window.Container = {
    instances: this.instances
  };
};



/***/ }),

/***/ "./assets/src/JavaScript/Core/Middleware.js":
/*!**************************************************!*\
  !*** ./assets/src/JavaScript/Core/Middleware.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Middleware)
/* harmony export */ });
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Middleware = /*#__PURE__*/function () {
  function Middleware() {
    _classCallCheck(this, Middleware);

    // Array prototype last
    if (!Array.prototype.last) {
      Array.prototype.last = function () {
        return this[this.length - 1];
      };
    } // Array prototype reduceOneRight


    if (!Array.prototype.reduceOneRight) {
      Array.prototype.reduceOneRight = function () {
        return this.slice(0, -1);
      };
    }
  }

  _createClass(Middleware, [{
    key: "use",
    value: function use(fn) {
      var _this = this;

      this.go = function (stack) {
        return function () {
          for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
            args[_key] = arguments[_key];
          }

          return stack.apply(void 0, _toConsumableArray(args.reduceOneRight()).concat([function () {
            var _next = args.last();

            fn.apply(_this, [].concat(_toConsumableArray(args.reduceOneRight()), [_next.bind.apply(_next, [null].concat(_toConsumableArray(args.reduceOneRight())))]));
          }]));
        };
      }(this.go);

      return this;
    }
  }, {
    key: "go",
    value: function go() {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      var _next = args.last();

      _next.apply(this, args.reduceOneRight());
    }
  }]);

  return Middleware;
}();



/***/ }),

/***/ "./assets/src/JavaScript/Event/AbstractEvent.js":
/*!******************************************************!*\
  !*** ./assets/src/JavaScript/Event/AbstractEvent.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ AbstractEvent)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var AbstractEvent = function AbstractEvent() {
  var _this = this;

  _classCallCheck(this, AbstractEvent);

  _defineProperty(this, "addListener", function (fn) {
    return _this.listeners.push(fn);
  });

  _defineProperty(this, "getListeners", function () {
    return _this.listeners;
  });

  _defineProperty(this, "exec", function () {
    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    return _this.listeners.forEach(function (listener) {
      return listener.apply(void 0, args);
    });
  });

  this.listeners = [];
};



/***/ }),

/***/ "./assets/src/JavaScript/Event/DOM/LoadEvent.js":
/*!******************************************************!*\
  !*** ./assets/src/JavaScript/Event/DOM/LoadEvent.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ LoadEvent)
/* harmony export */ });
/* harmony import */ var _Window_ResizeEvent__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../Window/ResizeEvent */ "./assets/src/JavaScript/Event/Window/ResizeEvent.js");
/* harmony import */ var _AbstractEvent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../AbstractEvent */ "./assets/src/JavaScript/Event/AbstractEvent.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }




var LoadEvent = /*#__PURE__*/function (_AbstractEvent) {
  _inherits(LoadEvent, _AbstractEvent);

  var _super = _createSuper(LoadEvent);

  function LoadEvent(Container) {
    var _this;

    _classCallCheck(this, LoadEvent);

    _this = _super.call(this);
    window.addEventListener('load', function (e) {
      var width = document.body.clientWidth;
      Application.getVariablesProvider().set('Width', width);

      _this.exec(e);
    });
    Container.add('LoadEvent', _assertThisInitialized(_this));
    Container.add('ResizeEvent', new _Window_ResizeEvent__WEBPACK_IMPORTED_MODULE_0__.default(Container));
    return _this;
  }

  return LoadEvent;
}(_AbstractEvent__WEBPACK_IMPORTED_MODULE_1__.default);



/***/ }),

/***/ "./assets/src/JavaScript/Event/Window/ResizeEvent.js":
/*!***********************************************************!*\
  !*** ./assets/src/JavaScript/Event/Window/ResizeEvent.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ ResizeEvent)
/* harmony export */ });
/* harmony import */ var _AbstractEvent__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../AbstractEvent */ "./assets/src/JavaScript/Event/AbstractEvent.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var ResizeEvent = /*#__PURE__*/function (_AbstractEvent) {
  _inherits(ResizeEvent, _AbstractEvent);

  var _super = _createSuper(ResizeEvent);

  function ResizeEvent() {
    var _this;

    _classCallCheck(this, ResizeEvent);

    _this = _super.call(this);

    var callback = function callback(e) {
      var init = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var width = document.body.clientWidth;
      Application.getVariablesProvider().set('Width', width);

      _this.exec(e, {
        init: init,
        width: width
      });
    };

    window.addEventListener('load', function (e) {
      return callback(e, true);
    });
    window.addEventListener('resize', function (e) {
      return callback(e);
    });
    return _this;
  }

  return ResizeEvent;
}(_AbstractEvent__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./assets/src/JavaScript/Middleware/AjaxMiddleware.js":
/*!************************************************************!*\
  !*** ./assets/src/JavaScript/Middleware/AjaxMiddleware.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ AjaxMiddleware)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var AjaxMiddleware = function AjaxMiddleware() {
  _classCallCheck(this, AjaxMiddleware);

  _defineProperty(this, "call", function (hook, next) {
    // console.log('AJAX');
    next();
  });
};



/***/ }),

/***/ "./assets/src/JavaScript/Middleware/QueryParametersMiddleware.js":
/*!***********************************************************************!*\
  !*** ./assets/src/JavaScript/Middleware/QueryParametersMiddleware.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ QueryParametersMiddleware)
/* harmony export */ });
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var QueryParametersMiddleware = function QueryParametersMiddleware() {
  _classCallCheck(this, QueryParametersMiddleware);

  _defineProperty(this, "call", function (hook, next) {
    // console.log('3AAAAAAA4 QPM');
    var queryParams = [];
    var searchParams = new URLSearchParams(location.search);

    var _iterator = _createForOfIteratorHelper(searchParams.entries()),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var pair = _step.value;
        var key = pair[0];
        var value = pair[1];
        queryParams[key] = value;
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    next();
  });
};



/***/ }),

/***/ "./assets/src/JavaScript/Project.js":
/*!******************************************!*\
  !*** ./assets/src/JavaScript/Project.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! ./App/Project */ "./assets/src/JavaScript/App/Project.js");

/***/ }),

/***/ "./assets/src/JavaScript/Provider/VariablesProvider.js":
/*!*************************************************************!*\
  !*** ./assets/src/JavaScript/Provider/VariablesProvider.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ VariablesProvider)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var VariablesProvider = function VariablesProvider() {
  var _this = this;

  _classCallCheck(this, VariablesProvider);

  _defineProperty(this, "getStorage", function () {
    return _this.storage;
  });

  _defineProperty(this, "set", function (identifier, value) {
    return _this.storage[identifier] = value;
  });

  _defineProperty(this, "get", function (identifier) {
    return _this.storage[identifier];
  });

  this.storage = {
    Breakpoint: 'xs'
  };
};



/***/ }),

/***/ "./assets/src/JavaScript/Renderer/PageRenderer.js":
/*!********************************************************!*\
  !*** ./assets/src/JavaScript/Renderer/PageRenderer.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ PageRenderer)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var PageRenderer =
/**
 * @type {bool}
 * @description Rootpage state of the current TYPO3 page.
 */

/**
 * @type {bool}
 * @description Whether the client scrolled on the web-application yet.
 */
function PageRenderer() {
  var _this = this;

  _classCallCheck(this, PageRenderer);

  _defineProperty(this, "pageType", null);

  _defineProperty(this, "hasScrolled", false);

  _defineProperty(this, "isRootPage", function () {
    return _this.rootPage;
  });

  _defineProperty(this, "isHeaderActive", function () {
    return Elements.$header.hasClass('active');
  });

  _defineProperty(this, "isBrowser", function (browser) {
    var isBrowser = false;
    browser = browser.toLowerCase();

    switch (browser) {
      case 'firefox':
        isBrowser = navigator.userAgent.search('Firefox');
        break;

      default:
        break;
    }

    return isBrowser === true;
  });

  if (document.body.dataset.pagetype) {
    this.pageType = document.body.dataset.pagetype;
  }
}
/**
 * @function isRootPage
 * @description Checks if the page is a root page.
 * 
 * @returns {bool}
 */
;



/***/ }),

/***/ "./assets/src/Scss/app.scss":
/*!**********************************!*\
  !*** ./assets/src/Scss/app.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/public/typo3conf/ext/site_frontend/Resources/Public/JavaScript/app": 0,
/******/ 			"public/typo3conf/ext/site_frontend/Resources/Public/Css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			__webpack_require__.O();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["public/typo3conf/ext/site_frontend/Resources/Public/Css/app"], () => (__webpack_require__("./assets/src/JavaScript/Application.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["public/typo3conf/ext/site_frontend/Resources/Public/Css/app"], () => (__webpack_require__("./assets/src/Scss/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;