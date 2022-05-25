// JavaScript Document
$(function () {
	"use strict";
	var obj = {
		init: function () {
			this.toTop();
			this.smoothScroll();
			this.iconMenu();
			this.jsUnder();
		},
		//totop
		toTop: function () {
			$("#totop").hide();
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$("#totop").fadeIn();
				} else {
					$("#totop").fadeOut();
				}
			});
			$("#totop a").click(function () {
				$("body,html").animate(
					{
						scrollTop: 0,
					},
					500
				);
				return false;
			});
		},
		// js under page
		jsUnder: function () {
			//img
			const img = $(".img-l,.img-r");
			if (img) {
				$(img).parent().addClass("clearfix");
			}

			const tblImg = $("table img");
			if (tblImg) {
				$(tblImg).parent().addClass("tbl-img");
			}

			// breadcrumb
			const arrUrl = $(".gnavi a");
			var url;
			$(arrUrl).each(function (i, e) {
				const link = $(e).text();
				if (link == "TOP" || link == "HOME" || link == "トップ") {
					url = $(e).attr("href");
				} else {
					url = "abc.com";
				}
			});
			$(".under .breadcrumb li:first-child a").attr("href", url);
			

			$('.under-tt').matchHeight();

			
		},
		//smoothScroll
		smoothScroll: function () {
			$('a[href^="#"]').click(function () {
				if ($($(this).attr("href")).length) {
					let pos = $($(this).attr("href")).offset().top;
					loadAnchor(pos);
				}
			});

			$(window).load(function () {
				let hash = location.hash;
				if (hash !== "") {
					let pos = $(hash).offset().top;
					loadAnchor(pos);
				}
			});

			// custom anchor for one page
			const urlOnePage = $("");
			$(urlOnePage).click(function () {
				$(".hamburger, .gnavi").removeClass("active");
				$("body").removeClass("block");

				let arrHref = $(this).attr("href").split("#");
				let hash = "#" + arrHref[arrHref.length - 1];
				if (hash !== "") {
					let pos = $(hash).offset().top;
					loadAnchor(pos);
				}
			});

			function loadAnchor(pos) {
				let $root = $("html, body");
				if ($(window).width() > 750) {
					$root.animate(
						{
							scrollTop: pos - 155,
						},
						600
					);
				} else {
					$root.animate(
						{
							scrollTop: pos - 100,
						},
						600
					);
				}
			}
		},
		fixed: function () {
			$(".fixed-social").removeClass("active");
			$(".fixed-tag").removeClass("active");
			$(window).on("scroll load resize", function () {
				if ($(this).scrollTop() > 200) {
					$("header").addClass("scroll");
				} else {
					$("header").removeClass("scroll");
				}
				if ($(this).width() <= 750) {
					if ($(this).scrollTop() > 100) {
						$(".fixed-social").addClass("active");
					} else {
						$(".fixed-social").removeClass("active");
					}
				}
				if ($(this).width() > 750) {
					if ($(this).scrollTop() > 100) {
						$(".fixed-tag").addClass("active");
					} else {
						$(".fixed-tag").removeClass("active");
					}
				}
			});
		},
		//sp gnavi
		iconMenu: function () {
			$(".hicon").click(function () {
				$(".hamburger").toggleClass("active");
				$(".gnavi").toggleClass("active");
				$("body").toggleClass("block");
			});

			$(".gnavi .has").click(function () {
				$(this).toggleClass("active");
				$(this).find(".hmenu-lv2").slideToggle();
			});

			$(window).bind("load resize", function () {
				var w = $(window).width();
				$(".has > label").removeClass("active");

				if (w > 640) {
					$(".sub").removeAttr("style");
					$("#gnavi .has > label").removeClass("active");
					$(".icon_menu").removeClass("active");
					$("#gnavi").removeAttr("style");
				} else {
					$("#gnavi .has > label").removeClass("active");
				}
			});
		},
		fixedAside: function () {
			function loadNav(asideList, countList, divContent, heightHeader) {
				$(window).on("load", function () {
					divContent.theiaStickySidebar({
						additionalMarginTop: heightHeader + 20,
					});
				});
				if (asideList.length) {
					$(window).on(
						"load scroll resize orientationchange",
						function () {
							var asdiePosition = asideList.offset().top;
							var arrayHead = [];

							if (countList.length) {
								// get all href have id
								$(countList).each(function (index, element) {
									const url = $(element).attr("href");
									arrayHead.push(url);
								});
								// loop array
								$(arrayHead).each(function (index, element) {
									if (index < arrayHead.length - 1) {
										if (
											$(element).offset().top -
												heightHeader <
												asdiePosition &&
											$(arrayHead[index + 1]).offset()
												.top -
												heightHeader >
												asdiePosition
										) {
											asideList
												.find("li")
												.removeClass("active");
											asideList
												.find("li")
												.eq(index)
												.addClass("active");
										}
									} else {
										if (
											$(
												arrayHead[arrayHead.length - 1]
											).offset().top -
												heightHeader <
											asdiePosition
										) {
											asideList
												.find("li")
												.removeClass("active");
											asideList
												.find("li")
												.eq(index)
												.addClass("active");
										}
									}
								});
							}
						}
					);
				}
			}
			loadNav(
				$(".under-aside-list"),
				$(".under-aside-list a"),
				$(".under-content, .under-aside"),
				200
			);
		},
	};

	obj.init();
});
