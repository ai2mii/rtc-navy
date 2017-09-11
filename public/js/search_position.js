function submitSearchPosition(index) {
	var code = $('#code' + index).data('attr');
	var name = $('#name' + index).data('attr');
	var rank = $('#rank' + index).data('attr');
	var corps = $('#corps' + index).data('attr');
	var line = $('#line' + index).data('attr');

	$('#position').val(code);
	$('#positionNameDisable').val(name);
	$('#positionRankDisable').val(rank);
	$('#positionCorpsDisable').val(corps);
	$('#positionLineDisable').val(line);

	$('.bs-position-modal-lg').modal('hide')

}

$( document ).ready(function() {

	function unsetSearchPosition() {
		$('#colCode, #colName, #colRank, #colCorps, #colLine').empty();
	}

	function renderHTML(data) {
		unsetSearchPosition();
		for (var i = 0; i < data.length; i++) {
			$('#colCode').append('<div><a onclick="submitSearchPosition(' + i + ');" href="javascript:void(0)" id="code' + i + '" data-attr="' + data[i].code + '">' + data[i].code + '</a></div>');
			$('#colName').append('<div><a onclick="submitSearchPosition(' + i + ');" href="javascript:void(0)" id="name' + i + '" data-attr="' + data[i].name + '">' + data[i].name + '</a></div>');
			$('#colRank').append('<div><a onclick="submitSearchPosition(' + i + ');" href="javascript:void(0)" id="rank' + i + '" data-attr="' + data[i].rank + '">' + data[i].rank + '</a></div>');
			$('#colCorps').append('<div><a onclick="submitSearchPosition(' + i + ');" href="javascript:void(0)" id="corps' + i + '" data-attr="' + data[i].corps + '">' + data[i].corps + '</a></div>');
			$('#colLine').append('<div><a onclick="submitSearchPosition(' + i + ');" href="javascript:void(0)" id="line' + i + '" data-attr="' + data[i].line + '">' + data[i].line + '</a></div>');
		}
	}

	$('#btn-search-position').on('click', function() {
		var positionCode = $('#positionCode').val();
		var positionName = $('#positionName').val();

		$.ajax({
		  	url: "/rtcnavy/public/ajaxSearchPosition",
		  	data: {
		  		positionCode : positionCode,
		  		positionName : positionName,
		  	}
		}).done(function(data) {
		  	renderHTML(data);
		});

	});

	//  search work location

	$('#btn-search-work-location').on('click', function() {
		var workPositionCode = $('#searchWorkPosition').find(':selected').data('code')
		var workPositionName = $('#searchWorkPosition').val();
		var workLocationCode = $('#searchWorkLocation').find(':selected').data('code')
		var workLocationName = $('#searchWorkLocation').val();

		var space = workPositionName.substr(workPositionName.length-1, workPositionName.length);
			space = space == '.' ? '' : ' ';
		var workLocationText = workPositionName + space + workLocationName;

		console.log(workLocationText);

		$('#workLocation').val(workLocationText);
		$('#workLocationCode').val(workLocationCode);
		$('#workPositionCode').val(workPositionCode);

		$('.bs-work-location-modal-lg').modal('hide');
	});

});

