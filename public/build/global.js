(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["global"],{

/***/ "./assets/css/global/global_footer.css":
/*!*********************************************!*\
  !*** ./assets/css/global/global_footer.css ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/global/global_form.css":
/*!*******************************************!*\
  !*** ./assets/css/global/global_form.css ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/global/global_main.css":
/*!*******************************************!*\
  !*** ./assets/css/global/global_main.css ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/global/global_navbar.css":
/*!*********************************************!*\
  !*** ./assets/css/global/global_navbar.css ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/global/global_pagination.css":
/*!*************************************************!*\
  !*** ./assets/css/global/global_pagination.css ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/global/global_datepicker.js":
/*!***********************************************!*\
  !*** ./assets/js/global/global_datepicker.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.date.to-string */ "./node_modules/core-js/modules/es.date.to-string.js");

$(document).ready(function () {
  $('.datepicker').datepicker({
    setDefaultDate: true,
    firstDay: 1,
    format: 'yyyy-mm-dd',
    minDate: new Date(1900, 1, 1),
    maxDate: new Date(),
    i18n: {
      done: 'Valider',
      cancel: 'Annuler',
      months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
      monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Dec'],
      weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
      weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
      weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
    }
  });
});

/***/ }),

/***/ "./assets/js/global/global_datetimepicker.js":
/*!***************************************************!*\
  !*** ./assets/js/global/global_datetimepicker.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.array.index-of */ "./node_modules/core-js/modules/es.array.index-of.js");

__webpack_require__(/*! core-js/modules/es.date.to-string */ "./node_modules/core-js/modules/es.date.to-string.js");

__webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.regexp.to-string */ "./node_modules/core-js/modules/es.regexp.to-string.js");

var MaterialDateTimePicker = {
  control: null,
  dateRange: null,
  pickerOptions: null,
  create: function create(element) {
    this.control = element == undefined ? $('#' + localStorage.getItem('element')) : element;
    element = this.control;

    if (this.control.is("input[type='text']")) {
      var defaultDate = new Date();
      element.off('click');
      element.datepicker({
        firstDay: 1,
        format: 'yyyy-mm-dd',
        selectMonths: true,
        dismissable: false,
        autoClose: true,
        setDefaultDate: true,
        minDate: new Date(),
        i18n: {
          done: 'Valider',
          cancel: 'Annuler',
          months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
          monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Dec'],
          weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
          weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
          weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
        },
        onClose: function onClose() {
          element.datepicker('destroy');
          element.timepicker({
            dismissable: false,
            twelveHour: false,
            onSelect: function onSelect(hr, min) {
              element.attr('selectedTime', (hr + ":" + min).toString());
            },
            onCloseEnd: function onCloseEnd() {
              element.blur();
            }
          });
          $('button.timepicker-close')[0].remove();

          if (element.val() != "") {
            element.attr('selectedDate', element.val().toString());
          } else {
            element.val(defaultDate.getFullYear().toString() + "/" + (defaultDate.getMonth() + 1).toString() + "/" + defaultDate.getDate().toString());
            element.attr('selectedDate', element.val().toString());
          }

          element.timepicker('open');
        }
      });
      element.unbind('change');
      element.off('change');
      element.on('change', function () {
        if (element.val().indexOf(':') > -1) {
          element.attr('selectedTime', element.val().toString());
          element.val(element.attr('selectedDate') + " " + element.attr('selectedTime'));
          element.timepicker('destroy');
          element.unbind('click');
          element.off('click');
          element.on('click', function (e) {
            element.val("");
            element.removeAttr("selectedDate");
            element.removeAttr("selectedTime");
            localStorage.setItem('element', element.attr('id'));
            MaterialDateTimePicker.create.call(element);
            element.trigger('click');
          });
        }
      });
      $('button.btn-flat.datepicker-cancel.waves-effect, button.btn-flat.datepicker-done.waves-effect').remove();
      return element;
    }
  },
  addCSSRules: function addCSSRules() {
    $('html > head').append($('<style>div.modal-overlay { pointer-events:none; }</style>'));
  }
};
$(document).ready(function () {
  var DateField1 = MaterialDateTimePicker.create($('.datetimepicker'));
});

/***/ }),

/***/ "./assets/js/global/global_form.js":
/*!*****************************************!*\
  !*** ./assets/js/global/global_form.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('input#name, input#pass').characterCounter();
});

/***/ }),

/***/ "./assets/js/global/global_main.js":
/*!*****************************************!*\
  !*** ./assets/js/global/global_main.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

M.AutoInit();
$('.dropdown-trigger').dropdown({
  coverTrigger: false
});

/***/ }),

/***/ "./assets/js/global/global_timepicker.js":
/*!***********************************************!*\
  !*** ./assets/js/global/global_timepicker.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.datepicker').datepicker({
    twelveHour: false,
    defaultTime: 'now',
    i18n: {
      done: 'Valider',
      cancel: 'Annuler'
    }
  });
});

/***/ }),

/***/ "./assets/js/global_app.js":
/*!*********************************!*\
  !*** ./assets/js/global_app.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you require will output into a single css file (global.css in this case)
__webpack_require__(/*! ../css/global/global_footer.css */ "./assets/css/global/global_footer.css");

__webpack_require__(/*! ../css/global/global_form.css */ "./assets/css/global/global_form.css");

__webpack_require__(/*! ../css/global/global_main.css */ "./assets/css/global/global_main.css");

__webpack_require__(/*! ../css/global/global_navbar.css */ "./assets/css/global/global_navbar.css");

__webpack_require__(/*! ../css/global/global_pagination.css */ "./assets/css/global/global_pagination.css"); // any JS / JQ you require will output into a single js file too.


__webpack_require__(/*! ./global/global_form.js */ "./assets/js/global/global_form.js");

__webpack_require__(/*! ./global/global_main.js */ "./assets/js/global/global_main.js");

__webpack_require__(/*! ./global/global_datepicker.js */ "./assets/js/global/global_datepicker.js");

__webpack_require__(/*! ./global/global_timepicker.js */ "./assets/js/global/global_timepicker.js");

__webpack_require__(/*! ./global/global_datetimepicker.js */ "./assets/js/global/global_datetimepicker.js");

/***/ }),

/***/ "./node_modules/core-js/internals/classof.js":
/*!***************************************************!*\
  !*** ./node_modules/core-js/internals/classof.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var classofRaw = __webpack_require__(/*! ../internals/classof-raw */ "./node_modules/core-js/internals/classof-raw.js");
var wellKnownSymbol = __webpack_require__(/*! ../internals/well-known-symbol */ "./node_modules/core-js/internals/well-known-symbol.js");

var TO_STRING_TAG = wellKnownSymbol('toStringTag');
// ES3 wrong here
var CORRECT_ARGUMENTS = classofRaw(function () { return arguments; }()) == 'Arguments';

// fallback for IE11 Script Access Denied error
var tryGet = function (it, key) {
  try {
    return it[key];
  } catch (error) { /* empty */ }
};

// getting tag from ES6+ `Object.prototype.toString`
module.exports = function (it) {
  var O, tag, result;
  return it === undefined ? 'Undefined' : it === null ? 'Null'
    // @@toStringTag case
    : typeof (tag = tryGet(O = Object(it), TO_STRING_TAG)) == 'string' ? tag
    // builtinTag case
    : CORRECT_ARGUMENTS ? classofRaw(O)
    // ES3 arguments fallback
    : (result = classofRaw(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : result;
};


/***/ }),

/***/ "./node_modules/core-js/internals/native-symbol.js":
/*!*********************************************************!*\
  !*** ./node_modules/core-js/internals/native-symbol.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");

module.exports = !!Object.getOwnPropertySymbols && !fails(function () {
  // Chrome 38 Symbol has incorrect toString conversion
  // eslint-disable-next-line no-undef
  return !String(Symbol());
});


/***/ }),

/***/ "./node_modules/core-js/internals/object-to-string.js":
/*!************************************************************!*\
  !*** ./node_modules/core-js/internals/object-to-string.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var classof = __webpack_require__(/*! ../internals/classof */ "./node_modules/core-js/internals/classof.js");
var wellKnownSymbol = __webpack_require__(/*! ../internals/well-known-symbol */ "./node_modules/core-js/internals/well-known-symbol.js");

var TO_STRING_TAG = wellKnownSymbol('toStringTag');
var test = {};

test[TO_STRING_TAG] = 'z';

// `Object.prototype.toString` method implementation
// https://tc39.github.io/ecma262/#sec-object.prototype.tostring
module.exports = String(test) !== '[object z]' ? function toString() {
  return '[object ' + classof(this) + ']';
} : test.toString;


/***/ }),

/***/ "./node_modules/core-js/internals/regexp-flags.js":
/*!********************************************************!*\
  !*** ./node_modules/core-js/internals/regexp-flags.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var anObject = __webpack_require__(/*! ../internals/an-object */ "./node_modules/core-js/internals/an-object.js");

// `RegExp.prototype.flags` getter implementation
// https://tc39.github.io/ecma262/#sec-get-regexp.prototype.flags
module.exports = function () {
  var that = anObject(this);
  var result = '';
  if (that.global) result += 'g';
  if (that.ignoreCase) result += 'i';
  if (that.multiline) result += 'm';
  if (that.dotAll) result += 's';
  if (that.unicode) result += 'u';
  if (that.sticky) result += 'y';
  return result;
};


/***/ }),

/***/ "./node_modules/core-js/internals/sloppy-array-method.js":
/*!***************************************************************!*\
  !*** ./node_modules/core-js/internals/sloppy-array-method.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");

module.exports = function (METHOD_NAME, argument) {
  var method = [][METHOD_NAME];
  return !method || !fails(function () {
    // eslint-disable-next-line no-useless-call,no-throw-literal
    method.call(null, argument || function () { throw 1; }, 1);
  });
};


/***/ }),

/***/ "./node_modules/core-js/internals/well-known-symbol.js":
/*!*************************************************************!*\
  !*** ./node_modules/core-js/internals/well-known-symbol.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__(/*! ../internals/global */ "./node_modules/core-js/internals/global.js");
var shared = __webpack_require__(/*! ../internals/shared */ "./node_modules/core-js/internals/shared.js");
var uid = __webpack_require__(/*! ../internals/uid */ "./node_modules/core-js/internals/uid.js");
var NATIVE_SYMBOL = __webpack_require__(/*! ../internals/native-symbol */ "./node_modules/core-js/internals/native-symbol.js");

var Symbol = global.Symbol;
var store = shared('wks');

module.exports = function (name) {
  return store[name] || (store[name] = NATIVE_SYMBOL && Symbol[name]
    || (NATIVE_SYMBOL ? Symbol : uid)('Symbol.' + name));
};


/***/ }),

/***/ "./node_modules/core-js/modules/es.array.index-of.js":
/*!***********************************************************!*\
  !*** ./node_modules/core-js/modules/es.array.index-of.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var $indexOf = __webpack_require__(/*! ../internals/array-includes */ "./node_modules/core-js/internals/array-includes.js").indexOf;
var sloppyArrayMethod = __webpack_require__(/*! ../internals/sloppy-array-method */ "./node_modules/core-js/internals/sloppy-array-method.js");

var nativeIndexOf = [].indexOf;

var NEGATIVE_ZERO = !!nativeIndexOf && 1 / [1].indexOf(1, -0) < 0;
var SLOPPY_METHOD = sloppyArrayMethod('indexOf');

// `Array.prototype.indexOf` method
// https://tc39.github.io/ecma262/#sec-array.prototype.indexof
$({ target: 'Array', proto: true, forced: NEGATIVE_ZERO || SLOPPY_METHOD }, {
  indexOf: function indexOf(searchElement /* , fromIndex = 0 */) {
    return NEGATIVE_ZERO
      // convert -0 to +0
      ? nativeIndexOf.apply(this, arguments) || 0
      : $indexOf(this, searchElement, arguments.length > 1 ? arguments[1] : undefined);
  }
});


/***/ }),

/***/ "./node_modules/core-js/modules/es.date.to-string.js":
/*!***********************************************************!*\
  !*** ./node_modules/core-js/modules/es.date.to-string.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var redefine = __webpack_require__(/*! ../internals/redefine */ "./node_modules/core-js/internals/redefine.js");

var DatePrototype = Date.prototype;
var INVALID_DATE = 'Invalid Date';
var TO_STRING = 'toString';
var nativeDateToString = DatePrototype[TO_STRING];
var getTime = DatePrototype.getTime;

// `Date.prototype.toString` method
// https://tc39.github.io/ecma262/#sec-date.prototype.tostring
if (new Date(NaN) + '' != INVALID_DATE) {
  redefine(DatePrototype, TO_STRING, function toString() {
    var value = getTime.call(this);
    // eslint-disable-next-line no-self-compare
    return value === value ? nativeDateToString.call(this) : INVALID_DATE;
  });
}


/***/ }),

/***/ "./node_modules/core-js/modules/es.object.to-string.js":
/*!*************************************************************!*\
  !*** ./node_modules/core-js/modules/es.object.to-string.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var redefine = __webpack_require__(/*! ../internals/redefine */ "./node_modules/core-js/internals/redefine.js");
var toString = __webpack_require__(/*! ../internals/object-to-string */ "./node_modules/core-js/internals/object-to-string.js");

var ObjectPrototype = Object.prototype;

// `Object.prototype.toString` method
// https://tc39.github.io/ecma262/#sec-object.prototype.tostring
if (toString !== ObjectPrototype.toString) {
  redefine(ObjectPrototype, 'toString', toString, { unsafe: true });
}


/***/ }),

/***/ "./node_modules/core-js/modules/es.regexp.to-string.js":
/*!*************************************************************!*\
  !*** ./node_modules/core-js/modules/es.regexp.to-string.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var redefine = __webpack_require__(/*! ../internals/redefine */ "./node_modules/core-js/internals/redefine.js");
var anObject = __webpack_require__(/*! ../internals/an-object */ "./node_modules/core-js/internals/an-object.js");
var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");
var flags = __webpack_require__(/*! ../internals/regexp-flags */ "./node_modules/core-js/internals/regexp-flags.js");

var TO_STRING = 'toString';
var RegExpPrototype = RegExp.prototype;
var nativeToString = RegExpPrototype[TO_STRING];

var NOT_GENERIC = fails(function () { return nativeToString.call({ source: 'a', flags: 'b' }) != '/a/b'; });
// FF44- RegExp#toString has a wrong name
var INCORRECT_NAME = nativeToString.name != TO_STRING;

// `RegExp.prototype.toString` method
// https://tc39.github.io/ecma262/#sec-regexp.prototype.tostring
if (NOT_GENERIC || INCORRECT_NAME) {
  redefine(RegExp.prototype, TO_STRING, function toString() {
    var R = anObject(this);
    var p = String(R.source);
    var rf = R.flags;
    var f = String(rf === undefined && R instanceof RegExp && !('flags' in RegExpPrototype) ? flags.call(R) : rf);
    return '/' + p + '/' + f;
  }, { unsafe: true });
}


/***/ })

},[["./assets/js/global_app.js","runtime","vendors~global~home"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2dsb2JhbC9nbG9iYWxfZm9vdGVyLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2dsb2JhbC9nbG9iYWxfZm9ybS5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Nzcy9nbG9iYWwvZ2xvYmFsX21haW4uY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jc3MvZ2xvYmFsL2dsb2JhbF9uYXZiYXIuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jc3MvZ2xvYmFsL2dsb2JhbF9wYWdpbmF0aW9uLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZ2xvYmFsL2dsb2JhbF9kYXRlcGlja2VyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9nbG9iYWwvZ2xvYmFsX2RhdGV0aW1lcGlja2VyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9nbG9iYWwvZ2xvYmFsX2Zvcm0uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2dsb2JhbC9nbG9iYWxfbWFpbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZ2xvYmFsL2dsb2JhbF90aW1lcGlja2VyLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9nbG9iYWxfYXBwLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9jbGFzc29mLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9uYXRpdmUtc3ltYm9sLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9vYmplY3QtdG8tc3RyaW5nLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL2ludGVybmFscy9yZWdleHAtZmxhZ3MuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3Nsb3BweS1hcnJheS1tZXRob2QuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvaW50ZXJuYWxzL3dlbGwta25vd24tc3ltYm9sLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9jb3JlLWpzL21vZHVsZXMvZXMuYXJyYXkuaW5kZXgtb2YuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5kYXRlLnRvLXN0cmluZy5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvY29yZS1qcy9tb2R1bGVzL2VzLm9iamVjdC50by1zdHJpbmcuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5yZWdleHAudG8tc3RyaW5nLmpzIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiZGF0ZXBpY2tlciIsInNldERlZmF1bHREYXRlIiwiZmlyc3REYXkiLCJmb3JtYXQiLCJtaW5EYXRlIiwiRGF0ZSIsIm1heERhdGUiLCJpMThuIiwiZG9uZSIsImNhbmNlbCIsIm1vbnRocyIsIm1vbnRoc1Nob3J0Iiwid2Vla2RheXMiLCJ3ZWVrZGF5c1Nob3J0Iiwid2Vla2RheXNBYmJyZXYiLCJNYXRlcmlhbERhdGVUaW1lUGlja2VyIiwiY29udHJvbCIsImRhdGVSYW5nZSIsInBpY2tlck9wdGlvbnMiLCJjcmVhdGUiLCJlbGVtZW50IiwidW5kZWZpbmVkIiwibG9jYWxTdG9yYWdlIiwiZ2V0SXRlbSIsImlzIiwiZGVmYXVsdERhdGUiLCJvZmYiLCJzZWxlY3RNb250aHMiLCJkaXNtaXNzYWJsZSIsImF1dG9DbG9zZSIsIm9uQ2xvc2UiLCJ0aW1lcGlja2VyIiwidHdlbHZlSG91ciIsIm9uU2VsZWN0IiwiaHIiLCJtaW4iLCJhdHRyIiwidG9TdHJpbmciLCJvbkNsb3NlRW5kIiwiYmx1ciIsInJlbW92ZSIsInZhbCIsImdldEZ1bGxZZWFyIiwiZ2V0TW9udGgiLCJnZXREYXRlIiwidW5iaW5kIiwib24iLCJpbmRleE9mIiwiZSIsInJlbW92ZUF0dHIiLCJzZXRJdGVtIiwiY2FsbCIsInRyaWdnZXIiLCJhZGRDU1NSdWxlcyIsImFwcGVuZCIsIkRhdGVGaWVsZDEiLCJjaGFyYWN0ZXJDb3VudGVyIiwiTSIsIkF1dG9Jbml0IiwiZHJvcGRvd24iLCJjb3ZlclRyaWdnZXIiLCJkZWZhdWx0VGltZSIsInJlcXVpcmUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBLHVDOzs7Ozs7Ozs7OztBQ0FBLHVDOzs7Ozs7Ozs7OztBQ0FBLHVDOzs7Ozs7Ozs7OztBQ0FBLHVDOzs7Ozs7Ozs7OztBQ0FBLHVDOzs7Ozs7Ozs7Ozs7O0FDQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVTtBQUN4QkYsR0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkcsVUFBakIsQ0FBNEI7QUFDeEJDLGtCQUFjLEVBQUUsSUFEUTtBQUV4QkMsWUFBUSxFQUFFLENBRmM7QUFHeEJDLFVBQU0sRUFBRSxZQUhnQjtBQUl4QkMsV0FBTyxFQUFFLElBQUlDLElBQUosQ0FBUyxJQUFULEVBQWMsQ0FBZCxFQUFnQixDQUFoQixDQUplO0FBS3hCQyxXQUFPLEVBQUUsSUFBSUQsSUFBSixFQUxlO0FBTXhCRSxRQUFJLEVBQUU7QUFDRkMsVUFBSSxFQUFFLFNBREo7QUFFRkMsWUFBTSxFQUFFLFNBRk47QUFHRkMsWUFBTSxFQUNGLENBQ0ksU0FESixFQUVJLFNBRkosRUFHSSxNQUhKLEVBSUksT0FKSixFQUtJLEtBTEosRUFNSSxNQU5KLEVBT0ksU0FQSixFQVFJLE1BUkosRUFTSSxXQVRKLEVBVUksU0FWSixFQVdJLFVBWEosRUFZSSxVQVpKLENBSkY7QUFrQkZDLGlCQUFXLEVBQ1AsQ0FDSSxLQURKLEVBRUksS0FGSixFQUdJLEtBSEosRUFJSSxLQUpKLEVBS0ksS0FMSixFQU1JLEtBTkosRUFPSSxLQVBKLEVBUUksS0FSSixFQVNJLEtBVEosRUFVSSxLQVZKLEVBV0ksS0FYSixFQVlJLEtBWkosQ0FuQkY7QUFpQ0ZDLGNBQVEsRUFDSixDQUNJLFVBREosRUFFSSxPQUZKLEVB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Q0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOzs7Ozs7Ozs7Ozs7QUNoQkEsZUFBZSxtQkFBTyxDQUFDLDJFQUF1QjtBQUM5QyxlQUFlLG1CQUFPLENBQUMsMkZBQStCOztBQUV0RDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxtREFBbUQsZUFBZTtBQUNsRTs7Ozs7Ozs7Ozs7OztBQ1RhO0FBQ2IsZUFBZSxtQkFBTyxDQUFDLDJFQUF1QjtBQUM5QyxlQUFlLG1CQUFPLENBQUMsNkVBQXdCO0FBQy9DLFlBQVksbUJBQU8sQ0FBQyxxRUFBb0I7QUFDeEMsWUFBWSxtQkFBTyxDQUFDLG1GQUEyQjs7QUFFL0M7QUFDQTtBQUNBOztBQUVBLHFDQUFxQyw2QkFBNkIsMEJBQTBCLFlBQVksRUFBRTtBQUMxRztBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUcsR0FBRyxlQUFlO0FBQ3JCIiwiZmlsZSI6Imdsb2JhbC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCl7XHJcbiAgICAkKCcuZGF0ZXBpY2tlcicpLmRhdGVwaWNrZXIoe1xyXG4gICAgICAgIHNldERlZmF1bHREYXRlOiB0cnVlLFxyXG4gICAgICAgIGZpcnN0RGF5OiAxLFxyXG4gICAgICAgIGZvcm1hdDogJ3l5eXktbW0tZGQnLFxyXG4gICAgICAgIG1pbkRhdGU6IG5ldyBEYXRlKDE5MDAsMSwxKSxcclxuICAgICAgICBtYXhEYXRlOiBuZXcgRGF0ZSgpLFxyXG4gICAgICAgIGkxOG46IHtcclxuICAgICAgICAgICAgZG9uZTogJ1ZhbGlkZXInLFxyXG4gICAgICAgICAgICBjYW5jZWw6ICdBbm51bGVyJyxcclxuICAgICAgICAgICAgbW9udGhzOlxyXG4gICAgICAgICAgICAgICAgW1xyXG4gICAgICAgICAgICAgICAgICAgICdKYW52aWVyJyxcclxuICAgICAgICAgICAgICAgICAgICAnRsOpdnJpZXInLFxyXG4gICAgICAgICAgICAgICAgICAgICdNYXJzJyxcclxuICAgICAgICAgICAgICAgICAgICAnQXZyaWwnLFxyXG4gICAgICAgICAgICAgICAgICAgICdNYWknLFxyXG4gICAgICAgICAgICAgICAgICAgICdKdWluJyxcclxuICAgICAgICAgICAgICAgICAgICAnSnVpbGxldCcsXHJcbiAgICAgICAgICAgICAgICAgICAgJ0Fvw7t0JyxcclxuICAgICAgICAgICAgICAgICAgICAnU2VwdGVtYnJlJyxcclxuICAgICAgICAgICAgICAgICAgICAnT2N0b2JyZScsXHJcbiAgICAgICAgICAgICAgICAgICAgJ05vdmVtYnJlJyxcclxuICAgICAgICAgICAgICAgICAgICAnRMOpY2VtYnJlJ1xyXG4gICAgICAgICAgICAgICAgXSxcclxuICAgICAgICAgICAgbW9udGhzU2hvcnQ6XHJcbiAgICAgICAgICAgICAgICBbXHJcbiAgICAgICAgICAgICAgICAgICAgJ0phbicsXHJcbiAgICAgICAgICAgICAgICAgICAgJ0ZldicsXHJcbiAgICAgICAgICAgICAgICAgICAgJ01hcicsXHJcbiAgICAgICAgICAgICAgICAgICAgJ0F2cicsXHJcbiAgICAgICAgICAgICAgICAgICAgJ01haScsXHJcbiAgICAgICAgICAgICAgICAgICAgJ0p1bicsXHJcbiAgICAgICAgICAgICAgICAgICAgJ0p1bCcsXHJcbiAgICAgICAgICAgICAgICAgICAgJ0Fvw7snLFxyXG4gICAgICAgICAgICAgICAgICAgICdTZXAnLFxyXG4gICAgICAgICAgICAgICAgICAgICdPY3QnLFxyXG4gICAgICAgICAgICAgICAgICAgICdOb3YnLFxyXG4gICAgICAgICAgICAgICAgICAgICdEZWMnXHJcbiAgICAgICAgICAgICAgICBdLFxyXG4gICAgICAgICAgICB3ZWVrZGF5czpcclxuICAgICAgICAgICAgICAgIFtcclxuICAgICAgICAgICAgICAgICAgICAnRGltYW5jaGUnLFxyXG4gICAgICAgICAgICAgICAgICAgICdMdW5kaScsXHJcbiAgICAgICAgICAgICAgICAgICAgJ01hcmRpJyxcclxuICAgICAgICAgICAgICAgICAgICAnTWVyY3JlZGknLFxyXG4gICAgICAgICAgICAgICAgICAgICdKZXVkaScsXHJcbiAgICAgICAgICAgICAgICAgICAgJ1ZlbmRyZWRpJyxcclxuICAgICAgICAgICAgICAgICAgICAnU2FtZWRpJ1xyXG4gICAgICAgICAgICAgICAgXSxcclxuICAgICAgICAgICAgd2Vla2RheXNTaG9ydDpcclxuICAgICAgICAgICAgICAgIFtcclxuICAgICAgICAgICAgICAgICAgICAnRGltJyxcclxuICAgICAgICAgICAgICAgICAgICAnTHVuJyxcclxuICAgICAgICAgICAgICAgICAgICAnTWFyJyxcclxuICAgICAgICAgICAgICAgICAgICAnTWVyJyxcclxuICAgICAgICAgICAgICAgICAgICAnSmV1JyxcclxuICAgICAgICAgICAgICAgICAgICAnVmVuJyxcclxuICAgICAgICAgICAgICAgICAgICAnU2FtJ1xyXG4gICAgICAgICAgICAgICAgXSxcclxuICAgICAgICAgICAgd2Vla2RheXNBYmJyZXY6XHJcbiAgICAgICAgICAgICAgICBbJ0QnLCAnTCcsICdNJywgJ00nLCAnSicsICdWJywgJ1MnXVxyXG4gICAgICAgIH1cclxuICAgIH0pO1xyXG59KTsiLCJ2YXIgTWF0ZXJpYWxEYXRlVGltZVBpY2tlciA9IHtcclxuICAgIGNvbnRyb2w6IG51bGwsXHJcbiAgICBkYXRlUmFuZ2U6IG51bGwsXHJcbiAgICBwaWNrZXJPcHRpb25zOiBudWxsLFxyXG4gICAgY3JlYXRlOiBmdW5jdGlvbihlbGVtZW50KXtcclxuICAgICAgICB0aGlzLmNvbnRyb2wgPSBlbGVtZW50ID09IHVuZGVmaW5lZD8gJCgnIycgKyBsb2NhbFN0b3JhZ2UuZ2V0SXRlbSgnZWxlbWVudCcpKSA6IGVsZW1lbnQ7XHJcbiAgICAgICAgZWxlbWVudCA9IHRoaXMuY29udHJvbDtcclxuICAgICAgICBpZiAodGhpcy5jb250cm9sLmlzKFwiaW5wdXRbdHlwZT0ndGV4dCddXCIpKVxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgdmFyIGRlZmF1bHREYXRlID0gbmV3IERhdGUoKTtcclxuICAgICAgICAgICAgZWxlbWVudC5vZmYoJ2NsaWNrJyk7XHJcbiAgICAgICAgICAgIGVsZW1lbnQuZGF0ZXBpY2tlcih7XHJcbiAgICAgICAgICAgICAgICBmaXJzdERheTogMSxcclxuICAgICAgICAgICAgICAgIGZvcm1hdDogJ3l5eXktbW0tZGQnLFxyXG4gICAgICAgICAgICAgICAgc2VsZWN0TW9udGhzOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgZGlzbWlzc2FibGU6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgYXV0b0Nsb3NlOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgc2V0RGVmYXVsdERhdGU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBtaW5EYXRlOiBuZXcgRGF0ZSgpLFxyXG4gICAgICAgICAgICAgICAgaTE4bjoge1xyXG4gICAgICAgICAgICAgICAgICAgIGRvbmU6ICdWYWxpZGVyJyxcclxuICAgICAgICAgICAgICAgICAgICBjYW5jZWw6ICdBbm51bGVyJyxcclxuICAgICAgICAgICAgICAgICAgICBtb250aHM6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIFtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdKYW52aWVyJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdGw6l2cmllcicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnTWFycycsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnQXZyaWwnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ01haScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnSnVpbicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnSnVpbGxldCcsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnQW/Du3QnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ1NlcHRlbWJyZScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnT2N0b2JyZScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnTm92ZW1icmUnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0TDqWNlbWJyZSdcclxuICAgICAgICAgICAgICAgICAgICAgICAgXSxcclxuICAgICAgICAgICAgICAgICAgICBtb250aHNTaG9ydDpcclxuICAgICAgICAgICAgICAgICAgICAgICAgW1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0phbicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnRmV2JyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdNYXInLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0F2cicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnTWFpJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdKdW4nLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0p1bCcsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnQW/DuycsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnU2VwJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdPY3QnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ05vdicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnRGVjJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBdLFxyXG4gICAgICAgICAgICAgICAgICAgIHdlZWtkYXlzOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICBbXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnRGltYW5jaGUnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0x1bmRpJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdNYXJkaScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnTWVyY3JlZGknLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0pldWRpJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdWZW5kcmVkaScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnU2FtZWRpJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBdLFxyXG4gICAgICAgICAgICAgICAgICAgIHdlZWtkYXlzU2hvcnQ6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIFtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdEaW0nLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0x1bicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnTWFyJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdNZXInLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJ0pldScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnVmVuJyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICdTYW0nXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIF0sXHJcbiAgICAgICAgICAgICAgICAgICAgd2Vla2RheXNBYmJyZXY6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIFsnRCcsICdMJywgJ00nLCAnTScsICdKJywgJ1YnLCAnUyddXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgb25DbG9zZTogZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50LmRhdGVwaWNrZXIoJ2Rlc3Ryb3knKTtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnRpbWVwaWNrZXIoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBkaXNtaXNzYWJsZTogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHR3ZWx2ZUhvdXI6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBvblNlbGVjdDogZnVuY3Rpb24oaHIsIG1pbil7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBlbGVtZW50LmF0dHIoJ3NlbGVjdGVkVGltZScsIChociArIFwiOlwiICsgbWluKS50b1N0cmluZygpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgb25DbG9zZUVuZDogZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGVsZW1lbnQuYmx1cigpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnYnV0dG9uLnRpbWVwaWNrZXItY2xvc2UnKVswXS5yZW1vdmUoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYoZWxlbWVudC52YWwoKSAhPSBcIlwiKVxyXG4gICAgICAgICAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlbWVudC5hdHRyKCdzZWxlY3RlZERhdGUnLCBlbGVtZW50LnZhbCgpLnRvU3RyaW5nKCkpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICBlbHNlXHJcbiAgICAgICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnZhbChkZWZhdWx0RGF0ZS5nZXRGdWxsWWVhcigpLnRvU3RyaW5nKCkgKyBcIi9cIiArIChkZWZhdWx0RGF0ZS5nZXRNb250aCgpICsgMSkudG9TdHJpbmcoKSArIFwiL1wiICsgZGVmYXVsdERhdGUuZ2V0RGF0ZSgpLnRvU3RyaW5nKCkpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGVsZW1lbnQuYXR0cignc2VsZWN0ZWREYXRlJywgZWxlbWVudC52YWwoKS50b1N0cmluZygpKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgZWxlbWVudC50aW1lcGlja2VyKCdvcGVuJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBlbGVtZW50LnVuYmluZCgnY2hhbmdlJyk7XHJcbiAgICAgICAgICAgIGVsZW1lbnQub2ZmKCdjaGFuZ2UnKTtcclxuICAgICAgICAgICAgZWxlbWVudC5vbignY2hhbmdlJywgZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgICAgIGlmKGVsZW1lbnQudmFsKCkuaW5kZXhPZignOicpID4gLTEpe1xyXG4gICAgICAgICAgICAgICAgICAgIGVsZW1lbnQuYXR0cignc2VsZWN0ZWRUaW1lJywgZWxlbWVudC52YWwoKS50b1N0cmluZygpKTtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnZhbChlbGVtZW50LmF0dHIoJ3NlbGVjdGVkRGF0ZScpICsgXCIgXCIgKyBlbGVtZW50LmF0dHIoJ3NlbGVjdGVkVGltZScpKTtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnRpbWVwaWNrZXIoJ2Rlc3Ryb3knKTtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnVuYmluZCgnY2xpY2snKTtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50Lm9mZignY2xpY2snKTtcclxuICAgICAgICAgICAgICAgICAgICBlbGVtZW50Lm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnZhbChcIlwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlbWVudC5yZW1vdmVBdHRyKFwic2VsZWN0ZWREYXRlXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBlbGVtZW50LnJlbW92ZUF0dHIoXCJzZWxlY3RlZFRpbWVcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxvY2FsU3RvcmFnZS5zZXRJdGVtKCdlbGVtZW50JywgZWxlbWVudC5hdHRyKCdpZCcpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgTWF0ZXJpYWxEYXRlVGltZVBpY2tlci5jcmVhdGUuY2FsbChlbGVtZW50KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZWxlbWVudC50cmlnZ2VyKCdjbGljaycpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgJCgnYnV0dG9uLmJ0bi1mbGF0LmRhdGVwaWNrZXItY2FuY2VsLndhdmVzLWVmZmVjdCwgYnV0dG9uLmJ0bi1mbGF0LmRhdGVwaWNrZXItZG9uZS53YXZlcy1lZmZlY3QnKS5yZW1vdmUoKTtcclxuICAgICAgICAgICAgcmV0dXJuIGVsZW1lbnQ7XHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuICAgIGFkZENTU1J1bGVzOiBmdW5jdGlvbigpe1xyXG4gICAgICAgICQoJ2h0bWwgPiBoZWFkJykuYXBwZW5kKCQoJzxzdHlsZT5kaXYubW9kYWwtb3ZlcmxheSB7IHBvaW50ZXItZXZlbnRzOm5vbmU7IH08L3N0eWxlPicpKTtcclxuICAgIH0sXHJcbn07XHJcblxyXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xyXG4gICAgdmFyIERhdGVGaWVsZDEgPSBNYXRlcmlhbERhdGVUaW1lUGlja2VyLmNyZWF0ZSgkKCcuZGF0ZXRpbWVwaWNrZXInKSk7XHJcbn0pO1xyXG5cclxuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcclxuICAgICQoJ2lucHV0I25hbWUsIGlucHV0I3Bhc3MnKS5jaGFyYWN0ZXJDb3VudGVyKCk7XHJcbn0pOyIsIk0uQXV0b0luaXQoKTtcclxuXHJcbiQoJy5kcm9wZG93bi10cmlnZ2VyJykuZHJvcGRvd24oe1xyXG4gICAgICAgIGNvdmVyVHJpZ2dlcjogZmFsc2VcclxuICAgIH1cclxuKTtcclxuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcclxuICAgICQoJy5kYXRlcGlja2VyJykuZGF0ZXBpY2tlcih7XHJcbiAgICAgICAgdHdlbHZlSG91cjogZmFsc2UsXHJcbiAgICAgICAgZGVmYXVsdFRpbWU6ICdub3cnLFxyXG4gICAgICAgIGkxOG46IHtcclxuICAgICAgICAgICAgZG9uZTogJ1ZhbGlkZXInLFxyXG4gICAgICAgICAgICBjYW5jZWw6ICdBbm51bGVyJyxcclxuICAgICAgICB9XHJcbiAgICB9KTtcclxufSk7IiwiLypcclxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxyXG4gKlxyXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXHJcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXHJcbiAqL1xyXG5cclxuLy8gYW55IENTUyB5b3UgcmVxdWlyZSB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChnbG9iYWwuY3NzIGluIHRoaXMgY2FzZSlcclxucmVxdWlyZSgnLi4vY3NzL2dsb2JhbC9nbG9iYWxfZm9vdGVyLmNzcycpO1xyXG5yZXF1aXJlKCcuLi9jc3MvZ2xvYmFsL2dsb2JhbF9mb3JtLmNzcycpO1xyXG5yZXF1aXJlKCcuLi9jc3MvZ2xvYmFsL2dsb2JhbF9tYWluLmNzcycpO1xyXG5yZXF1aXJlKCcuLi9jc3MvZ2xvYmFsL2dsb2JhbF9uYXZiYXIuY3NzJyk7XHJcbnJlcXVpcmUoJy4uL2Nzcy9nbG9iYWwvZ2xvYmFsX3BhZ2luYXRpb24uY3NzJyk7XHJcblxyXG5cclxuLy8gYW55IEpTIC8gSlEgeW91IHJlcXVpcmUgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBqcyBmaWxlIHRvby5cclxucmVxdWlyZSgnLi9nbG9iYWwvZ2xvYmFsX2Zvcm0uanMnKTtcclxucmVxdWlyZSgnLi9nbG9iYWwvZ2xvYmFsX21haW4uanMnKTtcclxucmVxdWlyZSgnLi9nbG9iYWwvZ2xvYmFsX2RhdGVwaWNrZXIuanMnKTtcclxucmVxdWlyZSgnLi9nbG9iYWwvZ2xvYmFsX3RpbWVwaWNrZXIuanMnKTtcclxucmVxdWlyZSgnLi9nbG9iYWwvZ2xvYmFsX2RhdGV0aW1lcGlja2VyLmpzJyk7IiwidmFyIGNsYXNzb2ZSYXcgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvY2xhc3NvZi1yYXcnKTtcclxudmFyIHdlbGxLbm93blN5bWJvbCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy93ZWxsLWtub3duLXN5bWJvbCcpO1xyXG5cclxudmFyIFRPX1NUUklOR19UQUcgPSB3ZWxsS25vd25TeW1ib2woJ3RvU3RyaW5nVGFnJyk7XHJcbi8vIEVTMyB3cm9uZyBoZXJlXHJcbnZhciBDT1JSRUNUX0FSR1VNRU5UUyA9IGNsYXNzb2ZSYXcoZnVuY3Rpb24gKCkgeyByZXR1cm4gYXJndW1lbnRzOyB9KCkpID09ICdBcmd1bWVudHMnO1xyXG5cclxuLy8gZmFsbGJhY2sgZm9yIElFMTEgU2NyaXB0IEFjY2VzcyBEZW5pZWQgZXJyb3JcclxudmFyIHRyeUdldCA9IGZ1bmN0aW9uIChpdCwga2V5KSB7XHJcbiAgdHJ5IHtcclxuICAgIHJldHVybiBpdFtrZXldO1xyXG4gIH0gY2F0Y2ggKGVycm9yKSB7IC8qIGVtcHR5ICovIH1cclxufTtcclxuXHJcbi8vIGdldHRpbmcgdGFnIGZyb20gRVM2KyBgT2JqZWN0LnByb3RvdHlwZS50b1N0cmluZ2BcclxubW9kdWxlLmV4cG9ydHMgPSBmdW5jdGlvbiAoaXQpIHtcclxuICB2YXIgTywgdGFnLCByZXN1bHQ7XHJcbiAgcmV0dXJuIGl0ID09PSB1bmRlZmluZWQgPyAnVW5kZWZpbmVkJyA6IGl0ID09PSBudWxsID8gJ051bGwnXHJcbiAgICAvLyBAQHRvU3RyaW5nVGFnIGNhc2VcclxuICAgIDogdHlwZW9mICh0YWcgPSB0cnlHZXQoTyA9IE9iamVjdChpdCksIFRPX1NUUklOR19UQUcpKSA9PSAnc3RyaW5nJyA/IHRhZ1xyXG4gICAgLy8gYnVpbHRpblRhZyBjYXNlXHJcbiAgICA6IENPUlJFQ1RfQVJHVU1FTlRTID8gY2xhc3NvZlJhdyhPKVxyXG4gICAgLy8gRVMzIGFyZ3VtZW50cyBmYWxsYmFja1xyXG4gICAgOiAocmVzdWx0ID0gY2xhc3NvZlJhdyhPKSkgPT0gJ09iamVjdCcgJiYgdHlwZW9mIE8uY2FsbGVlID09ICdmdW5jdGlvbicgPyAnQXJndW1lbnRzJyA6IHJlc3VsdDtcclxufTtcclxuIiwidmFyIGZhaWxzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2ZhaWxzJyk7XHJcblxyXG5tb2R1bGUuZXhwb3J0cyA9ICEhT2JqZWN0LmdldE93blByb3BlcnR5U3ltYm9scyAmJiAhZmFpbHMoZnVuY3Rpb24gKCkge1xyXG4gIC8vIENocm9tZSAzOCBTeW1ib2wgaGFzIGluY29ycmVjdCB0b1N0cmluZyBjb252ZXJzaW9uXHJcbiAgLy8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIG5vLXVuZGVmXHJcbiAgcmV0dXJuICFTdHJpbmcoU3ltYm9sKCkpO1xyXG59KTtcclxuIiwiJ3VzZSBzdHJpY3QnO1xyXG52YXIgY2xhc3NvZiA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9jbGFzc29mJyk7XHJcbnZhciB3ZWxsS25vd25TeW1ib2wgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvd2VsbC1rbm93bi1zeW1ib2wnKTtcclxuXHJcbnZhciBUT19TVFJJTkdfVEFHID0gd2VsbEtub3duU3ltYm9sKCd0b1N0cmluZ1RhZycpO1xyXG52YXIgdGVzdCA9IHt9O1xyXG5cclxudGVzdFtUT19TVFJJTkdfVEFHXSA9ICd6JztcclxuXHJcbi8vIGBPYmplY3QucHJvdG90eXBlLnRvU3RyaW5nYCBtZXRob2QgaW1wbGVtZW50YXRpb25cclxuLy8gaHR0cHM6Ly90YzM5LmdpdGh1Yi5pby9lY21hMjYyLyNzZWMtb2JqZWN0LnByb3RvdHlwZS50b3N0cmluZ1xyXG5tb2R1bGUuZXhwb3J0cyA9IFN0cmluZyh0ZXN0KSAhPT0gJ1tvYmplY3Qgel0nID8gZnVuY3Rpb24gdG9TdHJpbmcoKSB7XHJcbiAgcmV0dXJuICdbb2JqZWN0ICcgKyBjbGFzc29mKHRoaXMpICsgJ10nO1xyXG59IDogdGVzdC50b1N0cmluZztcclxuIiwiJ3VzZSBzdHJpY3QnO1xyXG52YXIgYW5PYmplY3QgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYW4tb2JqZWN0Jyk7XHJcblxyXG4vLyBgUmVnRXhwLnByb3RvdHlwZS5mbGFnc2AgZ2V0dGVyIGltcGxlbWVudGF0aW9uXHJcbi8vIGh0dHBzOi8vdGMzOS5naXRodWIuaW8vZWNtYTI2Mi8jc2VjLWdldC1yZWdleHAucHJvdG90eXBlLmZsYWdzXHJcbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKCkge1xyXG4gIHZhciB0aGF0ID0gYW5PYmplY3QodGhpcyk7XHJcbiAgdmFyIHJlc3VsdCA9ICcnO1xyXG4gIGlmICh0aGF0Lmdsb2JhbCkgcmVzdWx0ICs9ICdnJztcclxuICBpZiAodGhhdC5pZ25vcmVDYXNlKSByZXN1bHQgKz0gJ2knO1xyXG4gIGlmICh0aGF0Lm11bHRpbGluZSkgcmVzdWx0ICs9ICdtJztcclxuICBpZiAodGhhdC5kb3RBbGwpIHJlc3VsdCArPSAncyc7XHJcbiAgaWYgKHRoYXQudW5pY29kZSkgcmVzdWx0ICs9ICd1JztcclxuICBpZiAodGhhdC5zdGlja3kpIHJlc3VsdCArPSAneSc7XHJcbiAgcmV0dXJuIHJlc3VsdDtcclxufTtcclxuIiwiJ3VzZSBzdHJpY3QnO1xyXG52YXIgZmFpbHMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvZmFpbHMnKTtcclxuXHJcbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKE1FVEhPRF9OQU1FLCBhcmd1bWVudCkge1xyXG4gIHZhciBtZXRob2QgPSBbXVtNRVRIT0RfTkFNRV07XHJcbiAgcmV0dXJuICFtZXRob2QgfHwgIWZhaWxzKGZ1bmN0aW9uICgpIHtcclxuICAgIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBuby11c2VsZXNzLWNhbGwsbm8tdGhyb3ctbGl0ZXJhbFxyXG4gICAgbWV0aG9kLmNhbGwobnVsbCwgYXJndW1lbnQgfHwgZnVuY3Rpb24gKCkgeyB0aHJvdyAxOyB9LCAxKTtcclxuICB9KTtcclxufTtcclxuIiwidmFyIGdsb2JhbCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9nbG9iYWwnKTtcclxudmFyIHNoYXJlZCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9zaGFyZWQnKTtcclxudmFyIHVpZCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy91aWQnKTtcclxudmFyIE5BVElWRV9TWU1CT0wgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvbmF0aXZlLXN5bWJvbCcpO1xyXG5cclxudmFyIFN5bWJvbCA9IGdsb2JhbC5TeW1ib2w7XHJcbnZhciBzdG9yZSA9IHNoYXJlZCgnd2tzJyk7XHJcblxyXG5tb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIChuYW1lKSB7XHJcbiAgcmV0dXJuIHN0b3JlW25hbWVdIHx8IChzdG9yZVtuYW1lXSA9IE5BVElWRV9TWU1CT0wgJiYgU3ltYm9sW25hbWVdXHJcbiAgICB8fCAoTkFUSVZFX1NZTUJPTCA/IFN5bWJvbCA6IHVpZCkoJ1N5bWJvbC4nICsgbmFtZSkpO1xyXG59O1xyXG4iLCIndXNlIHN0cmljdCc7XHJcbnZhciAkID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2V4cG9ydCcpO1xyXG52YXIgJGluZGV4T2YgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYXJyYXktaW5jbHVkZXMnKS5pbmRleE9mO1xyXG52YXIgc2xvcHB5QXJyYXlNZXRob2QgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvc2xvcHB5LWFycmF5LW1ldGhvZCcpO1xyXG5cclxudmFyIG5hdGl2ZUluZGV4T2YgPSBbXS5pbmRleE9mO1xyXG5cclxudmFyIE5FR0FUSVZFX1pFUk8gPSAhIW5hdGl2ZUluZGV4T2YgJiYgMSAvIFsxXS5pbmRleE9mKDEsIC0wKSA8IDA7XHJcbnZhciBTTE9QUFlfTUVUSE9EID0gc2xvcHB5QXJyYXlNZXRob2QoJ2luZGV4T2YnKTtcclxuXHJcbi8vIGBBcnJheS5wcm90b3R5cGUuaW5kZXhPZmAgbWV0aG9kXHJcbi8vIGh0dHBzOi8vdGMzOS5naXRodWIuaW8vZWNtYTI2Mi8jc2VjLWFycmF5LnByb3RvdHlwZS5pbmRleG9mXHJcbiQoeyB0YXJnZXQ6ICdBcnJheScsIHByb3RvOiB0cnVlLCBmb3JjZWQ6IE5FR0FUSVZFX1pFUk8gfHwgU0xPUFBZX01FVEhPRCB9LCB7XHJcbiAgaW5kZXhPZjogZnVuY3Rpb24gaW5kZXhPZihzZWFyY2hFbGVtZW50IC8qICwgZnJvbUluZGV4ID0gMCAqLykge1xyXG4gICAgcmV0dXJuIE5FR0FUSVZFX1pFUk9cclxuICAgICAgLy8gY29udmVydCAtMCB0byArMFxyXG4gICAgICA/IG5hdGl2ZUluZGV4T2YuYXBwbHkodGhpcywgYXJndW1lbnRzKSB8fCAwXHJcbiAgICAgIDogJGluZGV4T2YodGhpcywgc2VhcmNoRWxlbWVudCwgYXJndW1lbnRzLmxlbmd0aCA+IDEgPyBhcmd1bWVudHNbMV0gOiB1bmRlZmluZWQpO1xyXG4gIH1cclxufSk7XHJcbiIsInZhciByZWRlZmluZSA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9yZWRlZmluZScpO1xyXG5cclxudmFyIERhdGVQcm90b3R5cGUgPSBEYXRlLnByb3RvdHlwZTtcclxudmFyIElOVkFMSURfREFURSA9ICdJbnZhbGlkIERhdGUnO1xyXG52YXIgVE9fU1RSSU5HID0gJ3RvU3RyaW5nJztcclxudmFyIG5hdGl2ZURhdGVUb1N0cmluZyA9IERhdGVQcm90b3R5cGVbVE9fU1RSSU5HXTtcclxudmFyIGdldFRpbWUgPSBEYXRlUHJvdG90eXBlLmdldFRpbWU7XHJcblxyXG4vLyBgRGF0ZS5wcm90b3R5cGUudG9TdHJpbmdgIG1ldGhvZFxyXG4vLyBodHRwczovL3RjMzkuZ2l0aHViLmlvL2VjbWEyNjIvI3NlYy1kYXRlLnByb3RvdHlwZS50b3N0cmluZ1xyXG5pZiAobmV3IERhdGUoTmFOKSArICcnICE9IElOVkFMSURfREFURSkge1xyXG4gIHJlZGVmaW5lKERhdGVQcm90b3R5cGUsIFRPX1NUUklORywgZnVuY3Rpb24gdG9TdHJpbmcoKSB7XHJcbiAgICB2YXIgdmFsdWUgPSBnZXRUaW1lLmNhbGwodGhpcyk7XHJcbiAgICAvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgbm8tc2VsZi1jb21wYXJlXHJcbiAgICByZXR1cm4gdmFsdWUgPT09IHZhbHVlID8gbmF0aXZlRGF0ZVRvU3RyaW5nLmNhbGwodGhpcykgOiBJTlZBTElEX0RBVEU7XHJcbiAgfSk7XHJcbn1cclxuIiwidmFyIHJlZGVmaW5lID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3JlZGVmaW5lJyk7XHJcbnZhciB0b1N0cmluZyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9vYmplY3QtdG8tc3RyaW5nJyk7XHJcblxyXG52YXIgT2JqZWN0UHJvdG90eXBlID0gT2JqZWN0LnByb3RvdHlwZTtcclxuXHJcbi8vIGBPYmplY3QucHJvdG90eXBlLnRvU3RyaW5nYCBtZXRob2RcclxuLy8gaHR0cHM6Ly90YzM5LmdpdGh1Yi5pby9lY21hMjYyLyNzZWMtb2JqZWN0LnByb3RvdHlwZS50b3N0cmluZ1xyXG5pZiAodG9TdHJpbmcgIT09IE9iamVjdFByb3RvdHlwZS50b1N0cmluZykge1xyXG4gIHJlZGVmaW5lKE9iamVjdFByb3RvdHlwZSwgJ3RvU3RyaW5nJywgdG9TdHJpbmcsIHsgdW5zYWZlOiB0cnVlIH0pO1xyXG59XHJcbiIsIid1c2Ugc3RyaWN0JztcclxudmFyIHJlZGVmaW5lID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL3JlZGVmaW5lJyk7XHJcbnZhciBhbk9iamVjdCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hbi1vYmplY3QnKTtcclxudmFyIGZhaWxzID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2ZhaWxzJyk7XHJcbnZhciBmbGFncyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9yZWdleHAtZmxhZ3MnKTtcclxuXHJcbnZhciBUT19TVFJJTkcgPSAndG9TdHJpbmcnO1xyXG52YXIgUmVnRXhwUHJvdG90eXBlID0gUmVnRXhwLnByb3RvdHlwZTtcclxudmFyIG5hdGl2ZVRvU3RyaW5nID0gUmVnRXhwUHJvdG90eXBlW1RPX1NUUklOR107XHJcblxyXG52YXIgTk9UX0dFTkVSSUMgPSBmYWlscyhmdW5jdGlvbiAoKSB7IHJldHVybiBuYXRpdmVUb1N0cmluZy5jYWxsKHsgc291cmNlOiAnYScsIGZsYWdzOiAnYicgfSkgIT0gJy9hL2InOyB9KTtcclxuLy8gRkY0NC0gUmVnRXhwI3RvU3RyaW5nIGhhcyBhIHdyb25nIG5hbWVcclxudmFyIElOQ09SUkVDVF9OQU1FID0gbmF0aXZlVG9TdHJpbmcubmFtZSAhPSBUT19TVFJJTkc7XHJcblxyXG4vLyBgUmVnRXhwLnByb3RvdHlwZS50b1N0cmluZ2AgbWV0aG9kXHJcbi8vIGh0dHBzOi8vdGMzOS5naXRodWIuaW8vZWNtYTI2Mi8jc2VjLXJlZ2V4cC5wcm90b3R5cGUudG9zdHJpbmdcclxuaWYgKE5PVF9HRU5FUklDIHx8IElOQ09SUkVDVF9OQU1FKSB7XHJcbiAgcmVkZWZpbmUoUmVnRXhwLnByb3RvdHlwZSwgVE9fU1RSSU5HLCBmdW5jdGlvbiB0b1N0cmluZygpIHtcclxuICAgIHZhciBSID0gYW5PYmplY3QodGhpcyk7XHJcbiAgICB2YXIgcCA9IFN0cmluZyhSLnNvdXJjZSk7XHJcbiAgICB2YXIgcmYgPSBSLmZsYWdzO1xyXG4gICAgdmFyIGYgPSBTdHJpbmcocmYgPT09IHVuZGVmaW5lZCAmJiBSIGluc3RhbmNlb2YgUmVnRXhwICYmICEoJ2ZsYWdzJyBpbiBSZWdFeHBQcm90b3R5cGUpID8gZmxhZ3MuY2FsbChSKSA6IHJmKTtcclxuICAgIHJldHVybiAnLycgKyBwICsgJy8nICsgZjtcclxuICB9LCB7IHVuc2FmZTogdHJ1ZSB9KTtcclxufVxyXG4iXSwic291cmNlUm9vdCI6IiJ9