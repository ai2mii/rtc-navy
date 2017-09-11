$( document ).ready(function() {

	function renderDropdownLine(group) {
		var line = {
			'corps0' : [
							'กลุ่มงานการขนส่ง (ขส.ทร.)',
						 	'กลุ่มงานการสื่อสารและเทคโนโลยีสารสนเทศ (สสท.ทร.)',
						 	'กลุ่มงานการปฏิบัติการทางเรือ (กร.)',
						 	'กลุ่มงานการปฏิบัติการต่อสู้อากาศยานและรักษาฝั่ง (สอ.รฝ.)',
							'กลุ่มงานการสรรพาวุธ (สพ.ทร.)',
							'กลุ่มงานการสารวัตร (กรม สห.ทร.)',
							'กลุ่มงานการอุทกศาสตร์ (อศ.)'
						],

			'corps1' : [
							'กลุ่มงานการปฏิบัติการทางเรือ (กร.)',
							'กลุ่มงานวิศวกรรมทางเรือและอากาศยาน (อร.)'
						],

			'corps2' : ['กลุ่มงานการปฏิบัติการนาวิกโยธิน (นย.)'],

			'corps3' : [
							'กลุ่มงานการเงิน (กง.ทร.)',
							'กลุ่มงานการดุริยางค์ (ดย.ทร.)',
							'กลุ่มงานพระธรรมนูญ (สธน.ทร.)',
							'กลุ่มงานการแพทย์ (พร.)',
							'กลุ่มงานการพลาธิการ (พธ.ทร.)',
							'กลุ่มงานวิศวกรรมช่างโยธา (ชย.ทร.)',
							'กลุ่มงานวิศวกรรมทางเรือและอากาศยาน (อร.)',
							'กลุ่มงานวิศวกรรมไฟฟ้าและอิเล็กทรอนิกส์ (อล.ทร.)',
							'กลุ่มงานการวิทยาศาสตร์ (วศ.ทร.)',
							'กลุ่มงานการศึกษา (ยศ.ทร.)',
							'กลุ่มงานการสารบรรณ (สบ.ทร.)',
							'กลุ่มงานการสื่อสารและเทคโนโลยีสารสนเทศ (สสท.ทร.)'
						],
		}

		$('#lists-line li').remove();
		$('#line').val('');

		if (group == 'พรรคนาวิน (นว.)') {
			for (i in line.corps0) {
				$('#lists-line').append("<li><a class='line-list' onclick='return addLineToTextbox(this);' href='javascript:void(0);'>" + line.corps0[i] + "</a></li>");
			}
		} else if (group == 'พรรคกลิน (กล.)') {
			for (i in line.corps1) {
				$('#lists-line').append("<li><a class='line-list' onclick='return addLineToTextbox(this);' href='javascript:void(0);'>" + line.corps1[i] + "</a></li>");
			}

		} else if (group == 'พรรคนาวิกโยธิน (นย.)') {
			for (i in line.corps2) {
				$('#lists-line').append("<li><a class='line-list' onclick='return addLineToTextbox(this);' href='javascript:void(0);'>" + line.corps2[i] + "</a></li>");
			}

		} else if (group == 'พรรคพิเศษ (พศ.)') {
			for (i in line.corps3) {
				$('#lists-line').append("<li><a class='line-list' onclick='return addLineToTextbox(this);' href='javascript:void(0);'>" + line.corps3[i] + "</a></li>");
			}

		}
	}


	$('.corps-list').on('click', function () {
		var val = $(this).text();
		var group = $(this).data('group');
		$('#corps').val(val);
		$('#uk-position').addClass('uk-dropdown-close');

		renderDropdownLine(group);
	});

	var action = $('#person-page').data('action')
	if (action == 'preview') {
		$('#person-page input, #person-page textarea, .dropdown-toggle').attr("disabled",true);
		$('#person-page input, #person-page textarea').attr("placeholder",'-');
		$('.input-personal .dropdown-toggle').addClass('disable');
		$('.input-personal .dropdown-toggle').addClass('disable');
		$('.save-person button').hide();
		$('#person-page .edit').show();
	}
});

function addLineToTextbox(line) {
	var val = $(line).text();
	$('#line').val(val);
	$('#uk-position-line').addClass('uk-dropdown-close');
}
