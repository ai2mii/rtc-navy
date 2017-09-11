$( document ).ready(function() {
	function setAddress(addressCode) {
		$.ajax({
		  	url: "/rtcnavy/public/ajaxGetAddress",
		  	data: {
		  		addressCode : addressCode
		  	},
		  	async: false
		}).done(function(data) {
		  	renderHtml('#aumphoe', data.aumphoeLists);
		  	renderHtml('#tambon', data.tambonLists);
		});
	}

	function setDefaultTextbox()
	{
		$('#moo, #aumphoe, #tambon').empty();
		$('#province').val('');
		$('#moo').val('')
		$('#aumphoe').append("<option selected>เลือกอำเภอ</option>");
		$('#tambon').append("<option selected>เลือกตำบล</option>");
		$('#province, #aumphoe, #tambon').selectpicker('refresh');
	}

	function renderHtml (selector, lists) {
		$.each( lists, function( key, value ) {
		  	$(selector).append("<option value=" + key + ">"+value+"</option>");
		});
		$(selector).selectpicker('refresh');
	}

	$('#type1, #type2, #type3, #type4').on('change', function() {

		$('#over17').hide();
		$('#chkHasMemberRtc').show();
		$('#numRtc').hide();

		var hasMemberRtc = $( "#hasMemberRtc:checked" ).length;
		if (hasMemberRtc) {
			$('#numRtc').show();
		}

		if (this.id == 'type3') {
			$('#otherHouse').show();
		} else {
			$('#otherHouse').hide();
		}

		if (this.id == 'type1') {
			setAddress('090403');
			$('#province').val('09');
		  	$('#aumphoe').val('0904');
		  	$('#tambon').val('090403');
		  	$('#province, #aumphoe, #tambon').selectpicker('refresh');
		  	$('#moo').val(5)

		  	$('#over17').show();
		  	$('#chkHasMemberRtc').hide();
		  	$('#numRtc').hide();

		} else if (this.id == 'type2') {
			setAddress('090401');
			$('#province').val('09');
		  	$('#aumphoe').val('0904');
		  	$('#tambon').val('090401');
		  	$('#province, #aumphoe, #tambon').selectpicker('refresh');
		  	$('#moo').val(1)

		} else {
			setDefaultTextbox();
		}

	});

	$('#hasMemberRtc').change(function() {
    	var isCheck = this.checked ? 1 : 0;
    	if(isCheck) {
    		$('#numRtc').show();
    	} else {
    		$('#numRtc').hide();
    	}
	});



	$('#province').on('change', function() {
		$('#aumphoe, #tambon').empty();
		$('#aumphoe').append("<option selected>เลือกอำเภอ</option>");
		$('#tambon').append("<option selected>เลือกตำบล</option>");
		$('#aumphoe, #tambon').selectpicker('refresh');

		var code = $(this).val();

		$.ajax({
		  	url: "/rtcnavy/public/ajaxGetAumphoe",
		  	data: {
		  		provinceCode : code,
		  	}
		}).done(function(data) {
		  	renderHtml('#aumphoe', data);
		});
	});

	$('#aumphoe').on('change', function() {
		var code = $(this).val();
		$('#tambon').empty();
		$('#tambon').append("<option selected>เลือกตำบล</option>");
		$('#aumphoe, #tambon').selectpicker('refresh');
		$.ajax({
		  	url: "/rtcnavy/public/ajaxGetTambon",
		  	data: {
		  		aumphoeCode : code,
		  	}
		}).done(function(data) {
		  	renderHtml('#tambon', data);
		});
	});

	$('#searchBy').on('change', function() {
		var searchBy = $(this).val();

		if (searchBy == 'name') {
			$('#searchByName').show();
			$('#searchByAddress').hide();
			$('#searchByAge').hide();
		} else if (searchBy == 'address') {
			$('#searchByAddress').show();
			$('#searchByName').hide();
			$('#searchByAge').hide();
		} else if (searchBy == 'age') {
			$('#searchByAge').show();
			$('#searchByAddress').hide();
			$('#searchByName').hide();
		}

	});


});
