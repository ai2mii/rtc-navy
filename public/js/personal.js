$( document ).ready(function() {

	$('.selecte-list').on('click', function () {
		var val = $(this).text();
		$(this).parentsUntil('.uk-button-dropdown').prev().val(val);
		$('.uk-button-dropdown').addClass('uk-dropdown-close');
	});

	// Calculate BMI
	$('#height, #weight').on('change', function () {
		var height = $('#height').val();
		var weight = $('#weight').val();
		var bmi = weight / ((height / 100)*(height / 100));
		$('#bmi').val(bmi.toFixed(2));

	});

	//Upload image
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#profile-preview').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#profileImage").change(function(){
	    readURL(this);
	});

	// Validation
	function validateId(id) {
		if(!$.isNumeric( id )) {
	    	$('#err-id').show();
	    	$('#id').focus();
	      	return false;
	    }
	    return true;
	}

	function validateLength(selector, selectorErr, num) {
		if(selector.val() && selector.val().length != num) {
	    	selectorErr.show();
	    	selector.focus();
	    	return false;
	    }
	    return true;
	}

	$(document).on('click', 'form#person-form button[type=submit]', function(e) {
	    if(!validateId($('#id').val())) {
	      	e.preventDefault();
	    }

	    if(!validateLength($('#id13'), $('#err-id13'), 13)) {
	      	e.preventDefault();
	    }

	    if(!validateLength($('#phoneNo'), $('#err-phoneNo'), 5)) {
	      	e.preventDefault();
	    }

	    if(!validateLength($('#mobilePhoneNo'), $('#err-mobilePhoneNo'), 10)) {
	      	e.preventDefault();
	    }

	});

	$('#id').on('change' , function () {
		$('#err-id').hide();
	});

	$('#id13').on('change', function () {
		if(validateLength($('#id13'), $('#err-id13'), 13)) {
	      	$('#err-id13').hide();
	    }
	});

	$('#mobilePhoneNo').on('change', function () {
		if(validateLength($('#mobilePhoneNo'), $('#err-mobilePhoneNo'), 10)) {
	      	$('#err-mobilePhoneNo').hide();
	    }
	});



});
