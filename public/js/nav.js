$( document ).ready(function() {

	function activeNav(selectorNav, selectorList) {
		$(selectorNav).addClass('active');
		$(selectorList).css('background-color', '#e7e7e7');
	}

	var pathname = window.location.pathname;

	if (pathname == '/rtcnavy/public/') {
		$('#nav-search').addClass('active');
	} else if (pathname == '/rtcnavy/public/report/person') {
		activeNav('#nav-report', '#nav-report-person');
	} else if (pathname == '/rtcnavy/public/report/person2') {
		activeNav('#nav-report', '#nav-report-person2');
	} else if (pathname == '/rtcnavy/public/report/position') {
		activeNav('#nav-report', '#nav-report-position');
	} else if (pathname == '/rtcnavy/public/report/location') {
		activeNav('#nav-report', '#nav-report-location');
	} else if (pathname == '/rtcnavy/public/report-position') {
		activeNav('#nav-report', '#nav-report-position-special');
	} else if (pathname == '/rtcnavy/public/report-position-summary') {
		activeNav('#nav-report', '#nav-report-position-summary');
	} else if (pathname == '/rtcnavy/public/report/resgiter-status') {
		activeNav('#nav-report', '#nav-report-register-status');
	} else if (pathname == '/rtcnavy/public/personal') {
		activeNav('#nav-add', '#nav-add-person');
	} else if (pathname == '/rtcnavy/public/position') {
		activeNav('#nav-add', '#nav-add-position');
	} else if (pathname == '/rtcnavy/public/import') {
		activeNav('#nav-import', '');
	} else if (pathname == '/rtcnavy/public/house-registration/add' ||
			   pathname == '/rtcnavy/public/house-registration/edit' ||
			   pathname == '/rtcnavy/public/house-registration/add/search') {
		activeNav('#nav-house-registration', '#nav-house-registration-add');
	}  else if (pathname == '/rtcnavy/public/house-registration/search' ) {
		activeNav('#nav-house-registration', '#nav-house-registration-search');
	} else if (pathname == '/rtcnavy/public/house-registration/rtc' ) {
		activeNav('#nav-house-registration', '#nav-house-registration-rtc');
	} else if (pathname == '/rtcnavy/public/house-registration/move-rtc' ) {
		activeNav('#nav-house-registration', '#nav-house-registration-move');
	}

});
