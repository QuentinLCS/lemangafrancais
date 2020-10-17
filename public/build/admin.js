(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["admin"],{

/***/ "./assets/css/admin/admin_charts.css":
/*!*******************************************!*\
  !*** ./assets/css/admin/admin_charts.css ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/admin/admin_datepicker.css":
/*!***********************************************!*\
  !*** ./assets/css/admin/admin_datepicker.css ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/admin/global/admin_global_forms.css":
/*!********************************************************!*\
  !*** ./assets/css/admin/global/admin_global_forms.css ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/admin/global/admin_global_main.css":
/*!*******************************************************!*\
  !*** ./assets/css/admin/global/admin_global_main.css ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/admin/global/admin_global_pagination.css":
/*!*************************************************************!*\
  !*** ./assets/css/admin/global/admin_global_pagination.css ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/admin/global/admin_global_sidenav.css":
/*!**********************************************************!*\
  !*** ./assets/css/admin/global/admin_global_sidenav.css ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/admin/admin_charts.js":
/*!*****************************************!*\
  !*** ./assets/js/admin/admin_charts.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Load the Visualization API and the corechart package.
google.charts.load('current', {
  'packages': ['corechart']
}); // Set a callback to run when the Google Visualization API is loaded.

google.charts.setOnLoadCallback(drawCoreChart); // Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.

function drawCoreChart() {
  // Create the data table.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Slices');
  data.addRows([['Mushrooms', 3], ['Onions', 1], ['Olives', 1], ['Zucchini', 1], ['Pepperoni', 2]]); // Set chart options

  var options = {
    chart: {
      title: 'Box Office Earnings in First Two Weeks of Opening',
      subtitle: 'in millions of dollars (USD)'
    },
    width: 900,
    height: 500,
    backgroundColor: '#455A64'
  }; // Instantiate and draw our chart, passing in some options.

  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}

google.charts.load('current', {
  'packages': ['line']
});
google.charts.setOnLoadCallback(drawLineChart);

function drawLineChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'Day');
  data.addColumn('number', 'Guardians of the Galaxy');
  data.addColumn('number', 'The Avengers');
  data.addColumn('number', 'Transformers: Age of Extinction');
  data.addRows([[1, 37.8, 80.8, 41.8], [2, 30.9, 69.5, 32.4], [3, 25.4, 57, 25.7], [4, 11.7, 18.8, 10.5], [5, 11.9, 17.6, 10.4], [6, 8.8, 13.6, 7.7], [7, 7.6, 12.3, 9.6], [8, 12.3, 29.2, 10.6], [9, 16.9, 42.9, 14.8], [10, 12.8, 30.9, 11.6], [11, 5.3, 7.9, 4.7], [12, 6.6, 8.4, 5.2], [13, 4.8, 6.3, 3.6], [14, 4.2, 6.2, 3.4]]);
  var options = {
    chart: {
      title: 'Box Office Earnings in First Two Weeks of Opening',
      subtitle: 'in millions of dollars (USD)'
    },
    width: 900,
    height: 500,
    backgroundColor: '#455A64'
  };
  var chart = new google.charts.Line(document.getElementById('linechart_material'));
  chart.draw(data, google.charts.Line.convertOptions(options));
}

/***/ }),

/***/ "./assets/js/admin_app.js":
/*!********************************!*\
  !*** ./assets/js/admin_app.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../css/admin/global/admin_global_sidenav.css */ "./assets/css/admin/global/admin_global_sidenav.css");

__webpack_require__(/*! ../css/admin/global/admin_global_main.css */ "./assets/css/admin/global/admin_global_main.css");

__webpack_require__(/*! ../css/admin/global/admin_global_forms.css */ "./assets/css/admin/global/admin_global_forms.css");

__webpack_require__(/*! ../css/admin/global/admin_global_pagination.css */ "./assets/css/admin/global/admin_global_pagination.css");

__webpack_require__(/*! ../css/admin/admin_datepicker.css */ "./assets/css/admin/admin_datepicker.css");

__webpack_require__(/*! ../css/admin/admin_charts.css */ "./assets/css/admin/admin_charts.css");

__webpack_require__(/*! ./admin/admin_charts.js */ "./assets/js/admin/admin_charts.js");

/***/ })

},[["./assets/js/admin_app.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FkbWluL2FkbWluX2NoYXJ0cy5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Nzcy9hZG1pbi9hZG1pbl9kYXRlcGlja2VyLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FkbWluL2dsb2JhbC9hZG1pbl9nbG9iYWxfZm9ybXMuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jc3MvYWRtaW4vZ2xvYmFsL2FkbWluX2dsb2JhbF9tYWluLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FkbWluL2dsb2JhbC9hZG1pbl9nbG9iYWxfcGFnaW5hdGlvbi5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Nzcy9hZG1pbi9nbG9iYWwvYWRtaW5fZ2xvYmFsX3NpZGVuYXYuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hZG1pbi9hZG1pbl9jaGFydHMuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2FkbWluX2FwcC5qcyJdLCJuYW1lcyI6WyJnb29nbGUiLCJjaGFydHMiLCJsb2FkIiwic2V0T25Mb2FkQ2FsbGJhY2siLCJkcmF3Q29yZUNoYXJ0IiwiZGF0YSIsInZpc3VhbGl6YXRpb24iLCJEYXRhVGFibGUiLCJhZGRDb2x1bW4iLCJhZGRSb3dzIiwib3B0aW9ucyIsImNoYXJ0IiwidGl0bGUiLCJzdWJ0aXRsZSIsIndpZHRoIiwiaGVpZ2h0IiwiYmFja2dyb3VuZENvbG9yIiwiUGllQ2hhcnQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiZHJhdyIsImRyYXdMaW5lQ2hhcnQiLCJMaW5lIiwiY29udmVydE9wdGlvbnMiLCJyZXF1aXJlIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQTtBQUNB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LEVBQU0sR0FBTixFQUFZLEdBQVosRUFBa0IsR0FBbEIsQ0FYUyxFQVlULENBQUMsRUFBRCxFQUFNLEdBQU4sRUFBWSxHQUFaLEVBQWtCLEdBQWxCLENBWlMsRUFhVCxDQUFDLEVBQUQsRUFBTSxHQUFOLEVBQVksR0FBWixFQUFrQixHQUFsQixDQWJTLEVBY1QsQ0FBQyxFQUFELEVBQU0sR0FBTixFQUFZLEdBQVosRUFBa0IsR0FBbEIsQ0FkUyxDQUFiO0FBaUJBLE1BQUlDLE9BQU8sR0FBRztBQUNWQyxTQUFLLEVBQUU7QUFDSEMsV0FBSyxFQUFFLG1EQURKO0FBRUhDLGNBQVEsRUFBRTtBQUZQLEtBREc7QUFLVkMsU0FBSyxFQUFFLEdBTEc7QUFNVkMsVUFBTSxFQUFFLEdBTkU7QUFPVkMsbUJBQWUsRUFBRTtBQVBQLEdBQWQ7QUFVQSxNQUFJTCxLQUFLLEdBQUcsSUFBSVgsTUFBTSxDQUFDQyxNQUFQLENBQWNxQixJQUFsQixDQUF1QkosUUFBUSxDQUFDQyxjQUFULENBQXdCLG9CQUF4QixDQUF2QixDQUFaO0FBRUFSLE9BQUssQ0FBQ1MsSUFBTixDQUFXZixJQUFYLEVBQWlCTCxNQUFNLENBQUNDLE1BQVAsQ0FBY3FCLElBQWQsQ0FBbUJDLGNBQW5CLENBQWtDYixPQUFsQyxDQUFqQjtBQUNILEM7Ozs7Ozs7Ozs7O0FDakZEYyxtQkFBTyxDQUFDLHdHQUFELENBQVA7O0FBQ0FBLG1CQUFPLENBQUMsa0dBQUQsQ0FBUDs7QUFDQUEsbUJBQU8sQ0FBQyxvR0FBRCxDQUFQOztBQUNBQSxtQkFBTyxDQUFDLDhHQUFELENBQVA7O0FBQ0FBLG1CQUFPLENBQUMsa0ZBQUQsQ0FBUDs7QUFDQUEsbUJBQU8sQ0FBQywwRUFBRCxDQUFQOztBQUNBQSxtQkFBTyxDQUFDLGtFQUFELENBQVAsQyIsImZpbGUiOiJhZG1pbi5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIExvYWQgdGhlIFZpc3VhbGl6YXRpb24gQVBJIGFuZCB0aGUgY29yZWNoYXJ0IHBhY2thZ2UuXHJcbmdvb2dsZS5jaGFydHMubG9hZCgnY3VycmVudCcsIHsncGFja2FnZXMnOlsnY29yZWNoYXJ0J119KTtcclxuXHJcbi8vIFNldCBhIGNhbGxiYWNrIHRvIHJ1biB3aGVuIHRoZSBHb29nbGUgVmlzdWFsaXphdGlvbiBBUEkgaXMgbG9hZGVkLlxyXG5nb29nbGUuY2hhcnRzLnNldE9uTG9hZENhbGxiYWNrKGRyYXdDb3JlQ2hhcnQpO1xyXG5cclxuLy8gQ2FsbGJhY2sgdGhhdCBjcmVhdGVzIGFuZCBwb3B1bGF0ZXMgYSBkYXRhIHRhYmxlLFxyXG4vLyBpbnN0YW50aWF0ZXMgdGhlIHBpZSBjaGFydCwgcGFzc2VzIGluIHRoZSBkYXRhIGFuZFxyXG4vLyBkcmF3cyBpdC5cclxuZnVuY3Rpb24gZHJhd0NvcmVDaGFydCgpIHtcclxuXHJcbiAgICAvLyBDcmVhdGUgdGhlIGRhdGEgdGFibGUuXHJcbiAgICB2YXIgZGF0YSA9IG5ldyBnb29nbGUudmlzdWFsaXphdGlvbi5EYXRhVGFibGUoKTtcclxuICAgIGRhdGEuYWRkQ29sdW1uKCdzdHJpbmcnLCAnVG9wcGluZycpO1xyXG4gICAgZGF0YS5hZGRDb2x1bW4oJ251bWJlcicsICdTbGljZXMnKTtcclxuICAgIGRhdGEuYWRkUm93cyhbXHJcbiAgICAgICAgWydNdXNocm9vbXMnLCAzXSxcclxuICAgICAgICBbJ09uaW9ucycsIDFdLFxyXG4gICAgICAgIFsnT2xpdmVzJywgMV0sXHJcbiAgICAgICAgWydadWNjaGluaScsIDFdLFxyXG4gICAgICAgIFsnUGVwcGVyb25pJywgMl1cclxuICAgIF0pO1xyXG5cclxuICAgIC8vIFNldCBjaGFydCBvcHRpb25zXHJcbiAgICB2YXIgb3B0aW9ucyA9IHtcclxuICAgICAgICBjaGFydDoge1xyXG4gICAgICAgICAgICB0aXRsZTogJ0JveCBPZmZpY2UgRWFybmluZ3MgaW4gRmlyc3QgVHdvIFdlZWtzIG9mIE9wZW5pbmcnLFxyXG4gICAgICAgICAgICBzdWJ0aXRsZTogJ2luIG1pbGxpb25zIG9mIGRvbGxhcnMgKFVTRCknXHJcbiAgICAgICAgfSxcclxuICAgICAgICB3aWR0aDogOTAwLFxyXG4gICAgICAgIGhlaWdodDogNTAwLFxyXG4gICAgICAgIGJhY2tncm91bmRDb2xvcjogJyM0NTVBNjQnXHJcbiAgICB9O1xyXG5cclxuICAgIC8vIEluc3RhbnRpYXRlIGFuZCBkcmF3IG91ciBjaGFydCwgcGFzc2luZyBpbiBzb21lIG9wdGlvbnMuXHJcbiAgICB2YXIgY2hhcnQgPSBuZXcgZ29vZ2xlLnZpc3VhbGl6YXRpb24uUGllQ2hhcnQoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2NoYXJ0X2RpdicpKTtcclxuICAgIGNoYXJ0LmRyYXcoZGF0YSwgb3B0aW9ucyk7XHJcbn1cclxuXHJcblxyXG5nb29nbGUuY2hhcnRzLmxvYWQoJ2N1cnJlbnQnLCB7J3BhY2thZ2VzJzpbJ2xpbmUnXX0pO1xyXG5nb29nbGUuY2hhcnRzLnNldE9uTG9hZENhbGxiYWNrKGRyYXdMaW5lQ2hhcnQpO1xyXG5cclxuZnVuY3Rpb24gZHJhd0xpbmVDaGFydCgpIHtcclxuXHJcbiAgICB2YXIgZGF0YSA9IG5ldyBnb29nbGUudmlzdWFsaXphdGlvbi5EYXRhVGFibGUoKTtcclxuICAgIGRhdGEuYWRkQ29sdW1uKCdudW1iZXInLCAnRGF5Jyk7XHJcbiAgICBkYXRhLmFkZENvbHVtbignbnVtYmVyJywgJ0d1YXJkaWFucyBvZiB0aGUgR2FsYXh5Jyk7XHJcbiAgICBkYXRhLmFkZENvbHVtbignbnVtYmVyJywgJ1RoZSBBdmVuZ2VycycpO1xyXG4gICAgZGF0YS5hZGRDb2x1bW4oJ251bWJlcicsICdUcmFuc2Zvcm1lcnM6IEFnZSBvZiBFeHRpbmN0aW9uJyk7XHJcblxyXG4gICAgZGF0YS5hZGRSb3dzKFtcclxuICAgICAgICBbMSwgIDM3LjgsIDgwLjgsIDQxLjhdLFxyXG4gICAgICAgIFsyLCAgMzAuOSwgNjkuNSwgMzIuNF0sXHJcbiAgICAgICAgWzMsICAyNS40LCAgIDU3LCAyNS43XSxcclxuICAgICAgICBbNCwgIDExLjcsIDE4LjgsIDEwLjVdLFxyXG4gICAgICAgIFs1LCAgMTEuOSwgMTcuNiwgMTAuNF0sXHJcbiAgICAgICAgWzYsICAgOC44LCAxMy42LCAgNy43XSxcclxuICAgICAgICBbNywgICA3LjYsIDEyLjMsICA5LjZdLFxyXG4gICAgICAgIFs4LCAgMTIuMywgMjkuMiwgMTAuNl0sXHJcbiAgICAgICAgWzksICAxNi45LCA0Mi45LCAxNC44XSxcclxuICAgICAgICBbMTAsIDEyLjgsIDMwLjksIDExLjZdLFxyXG4gICAgICAgIFsxMSwgIDUuMywgIDcuOSwgIDQuN10sXHJcbiAgICAgICAgWzEyLCAgNi42LCAgOC40LCAgNS4yXSxcclxuICAgICAgICBbMTMsICA0LjgsICA2LjMsICAzLjZdLFxyXG4gICAgICAgIFsxNCwgIDQuMiwgIDYuMiwgIDMuNF1cclxuICAgIF0pO1xyXG5cclxuICAgIHZhciBvcHRpb25zID0ge1xyXG4gICAgICAgIGNoYXJ0OiB7XHJcbiAgICAgICAgICAgIHRpdGxlOiAnQm94IE9mZmljZSBFYXJuaW5ncyBpbiBGaXJzdCBUd28gV2Vla3Mgb2YgT3BlbmluZycsXHJcbiAgICAgICAgICAgIHN1YnRpdGxlOiAnaW4gbWlsbGlvbnMgb2YgZG9sbGFycyAoVVNEKSdcclxuICAgICAgICB9LFxyXG4gICAgICAgIHdpZHRoOiA5MDAsXHJcbiAgICAgICAgaGVpZ2h0OiA1MDAsXHJcbiAgICAgICAgYmFja2dyb3VuZENvbG9yOiAnIzQ1NUE2NCdcclxuICAgIH07XHJcblxyXG4gICAgdmFyIGNoYXJ0ID0gbmV3IGdvb2dsZS5jaGFydHMuTGluZShkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbGluZWNoYXJ0X21hdGVyaWFsJykpO1xyXG5cclxuICAgIGNoYXJ0LmRyYXcoZGF0YSwgZ29vZ2xlLmNoYXJ0cy5MaW5lLmNvbnZlcnRPcHRpb25zKG9wdGlvbnMpKTtcclxufSIsInJlcXVpcmUoJy4uL2Nzcy9hZG1pbi9nbG9iYWwvYWRtaW5fZ2xvYmFsX3NpZGVuYXYuY3NzJyk7XHJcbnJlcXVpcmUoJy4uL2Nzcy9hZG1pbi9nbG9iYWwvYWRtaW5fZ2xvYmFsX21haW4uY3NzJyk7XHJcbnJlcXVpcmUoJy4uL2Nzcy9hZG1pbi9nbG9iYWwvYWRtaW5fZ2xvYmFsX2Zvcm1zLmNzcycpO1xyXG5yZXF1aXJlKCcuLi9jc3MvYWRtaW4vZ2xvYmFsL2FkbWluX2dsb2JhbF9wYWdpbmF0aW9uLmNzcycpO1xyXG5yZXF1aXJlKCcuLi9jc3MvYWRtaW4vYWRtaW5fZGF0ZXBpY2tlci5jc3MnKTtcclxucmVxdWlyZSgnLi4vY3NzL2FkbWluL2FkbWluX2NoYXJ0cy5jc3MnKTtcclxucmVxdWlyZSgnLi9hZG1pbi9hZG1pbl9jaGFydHMuanMnKTsiXSwic291cmNlUm9vdCI6IiJ9