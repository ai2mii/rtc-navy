var selected;
var report = $('#report-person-container').data('attr');
$( document ).ready(function() {
	function hideBox() {
		$('#corps-box').hide();
		$('#rank-box').hide();
		$('#line-box').hide();
		$('#start-box').hide();
		$('#retiredYears-box').hide();
		$('#position-box').hide();
		$('#under-box').hide();
		$('#education-box').hide();
		$('#insignia-box').hide();
		$('#religion-box').hide();
	}

	$('#searchBy').on('change', function () {
		$('#result').css('display','none')
		selected = $(this).val();
		if (selected == 'ทั้งหมด') {
			window.location.href = '/rtcnavy/public/report/person' + (report == 'position2' ? '2' : '');
		}

		$('#searchBy2-box').show();
		if (selected == 'rank') {
			hideBox();
			$('#rank-box').show();
			$('#label-searchBy2').text('ยศ');
		} else if (selected == 'corps') {
			hideBox();
			$('#corps-box').show();
			$('#label-searchBy2').text('พรรค/เหล่า');
		} else if (selected == 'line') {
			hideBox();
			$('#line-box').show();
			$('#label-searchBy2').text('สายวิทยาการ');
		} else if (selected == 'start') {
			hideBox();
			$('#start-box').show();
			$('#label-searchBy2').text('กำเนิด');
		} else if (selected == 'retiredYears') {
			hideBox();
			$('#retiredYears-box').show();
			$('#label-searchBy2').text('ปีเกษียณ');
		} else if (selected == 'position') {
			hideBox();
			$('#position-box').show();
			$('#label-searchBy2').text('ตำแหน่ง');
		} else if (selected == 'under') {
			hideBox();
			$('#under-box').show();
			$('#label-searchBy2').text('ตำแหน่ง');
		} else if (selected == 'education') {
			hideBox();
			$('#education-box').show();
			$('#label-searchBy2').text('วุฒิการศึกษา');
		} else if (selected == 'insignia') {
			hideBox();
			$('#insignia-box').show();
			$('#label-searchBy2').text('เครื่องราช ฯ');
		} else if (selected == 'religion') {
			hideBox();
			$('#religion-box').show();
			$('#label-searchBy2').text('ศาสนา');
		}

	});

});

$('.searchBy2').on('change', function() {
	var val = $(this).val();
	selected = $('#searchBy').val();
	window.location.href = '/rtcnavy/public/report/person' + (report == 'position2' ? '2' : '') + '?cate=' + selected + '&search_by=' + val;
});

$('#export-person').on('click', function() {
	var url = window.location.href;
	if (url.indexOf('?') > -1) {
		window.location.href = url + '&action=export';
	} else {
		window.location.href = url + '?action=export';
	}
});





//  Fix header
$( document ).ready(function() {
	$('table').floatThead({
		position: 'fixed'
	});
});
