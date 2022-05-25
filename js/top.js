// JavaScript Document
$(function () {
	"use strict";
	var ojbect = {
		init: function () {
			this.topInit();
		},
		topInit: function () {
			new WOW().init();
		},
	};
	ojbect.init();
});
