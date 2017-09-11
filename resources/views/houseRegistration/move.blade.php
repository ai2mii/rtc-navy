@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center;">ย้ายทะเบียนบ้าน</h2>
	<div class="container move-registration">
		<form action="{{ action('HouseRegistrationController@save') }}" class="form-horizontal">
			<div class="alert alert-success fade in {{ $isSave == 1 ? '' : 'hide' }}" {{ $isSave}}>
			    <a href="#" class="close" data-dismiss="alert">&times;</a>
			    <strong>บันทึกข้อมูลเรียบร้อย</strong>
			</div>
			<input type="hidden" id="action" name="action" value="{{ $action }}">
			<input type="hidden" id="id" name="id" value="{{ $person->id }}">
			<input type="hidden" id="id13" name="id13" value="{{ $person->id13 }}">
			<div class="form-group">
		    	<label for="rank" class="col-md-4 control-label">ยศ :</label>
		    	<div class="col-md-4">
		      		<input value="{{ $person->rank }}" disabled="" type="text" class="form-control input-form" id="rank-disabled" name="rank-disabled" placeholder="">
		      		<input value="{{ $person->rank }}" type="hidden" class="form-control input-form" id="rank" name="rank" placeholder="">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="name" class="col-md-4 control-label">ชื่อ :</label>
		    	<div class="col-md-4">
		      		<input value="{{ $person->name }}" disabled="" type="text" class="form-control input-form" id="name-disabled" name="name-disabled" placeholder="">
		      		<input value="{{ $person->name }}" type="hidden" class="form-control input-form" id="name" name="name" placeholder="">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="sname" class="col-md-4 control-label">นามสกุล :</label>
		    	<div class="col-md-4">
		      		<input value="{{ $person->sname }}" disabled="" type="text" class="form-control input-form" id="sname-disabled" name="sname-disabled" placeholder="">
		      		<input value="{{ $person->sname }}" type="hidden" class="form-control input-form" id="sname" name="sname" placeholder="">
		    	</div>
		  	</div>

			<div class="col-md-6 text-center"><h4>ที่อยู่เดิม</h4></div>
			<div class="col-md-6 text-center"><h4>ที่อยู่ใหม่</h4></div>
			<div class="col-md-5" style="border: 1px solid #dfdfdf; margin-left: 50px;">
				<div class="form-group">
			    	<label for="type" class="col-md-4 control-label">ประเภทบ้านพัก :</label>
			    	<div class="col-md-8">
			      		<div class="radio">
						  	<label>
						    	<input disabled="" type="radio" name="old_optionsRadios" id="old_type1" value="type1" {{ isset($person->type) && $person->type == 'บ้านพัก ศฝท.' ? 'checked' : '' }}>
						    	บ้านพัก ศฝท.
						  	</label>
						</div>
						<div class="radio">
						  	<label>
						    	<input disabled="" type="radio" name="old_optionsRadios" id="old_type2" value="type2" {{ isset($person->type) && $person->type == 'บ้านพัก ทร. ส่วนกลาง' ? 'checked' : '' }}>
						    	บ้านพัก ทร. ส่วนกลาง
						  	</label>
						</div>
						<div class="radio disabled">
						  	<label>
						    	<input disabled="" type="radio" name="old_optionsRadios" id="old_type3" value="type3" {{ isset($person->type) && $person->type == 'บ้านพักหน่วยราชการอื่น' ? 'checked' : '' }}>
						    	บ้านพักหน่วยราชการอื่น
						  	</label>
						</div>
						<input disabled="" value="{{ $person->otherHouse ? $person->otherHouse : '' }}" type="text" class="form-control input-form other-home" id="old_otherHouse" name="old_otherHouse" placeholder="ระบุ" style="{{ isset($person->type) && $person->type == 'บ้านพักหน่วยราชการอื่น' ? '' : 'display: none;' }}">
						<div class="radio disabled">
						  	<label>
						    	<input disabled="" type="radio" name="old_optionsRadios" id="old_type4" value="type4" {{ isset($person->type) && $person->type == 'บ้านพักส่วนตัว' ? 'checked' : '' }}>
						    	บ้านพักส่วนตัว
						  	</label>
						</div>
			    	</div>
			  	</div>

			  	<div class="form-group" style="border-bottom: 1px solid #dfdfdf; border-top: 1px solid #dfdfdf;">
			    	<label class="col-md-4 control-label">ที่อยู่ :</label>
			    	<div class="col-md-8">
			    		<div style="padding: 5px 0;">
				    		<label for="old_number" class="col-md-3 control-label">เลขที่</label>
				      		<input disabled="" type="text" value="{{ $person->addressNo ? $person->addressNo : '' }}" style="width: 200px;" class="form-control input-form" id="old_number" name="old_number" placeholder="">
			    		</div>
			    		<div style="padding: 5px 0;">
			    			<label for="old_moo" class="col-md-3 control-label">หมู่</label>
			      			<input disabled="" type="text" value="{{ $person->moo ? $person->moo : '' }}" style="width: 200px;" class="form-control input-form" id="old_moo" name="old_moo" placeholder="">
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<label for="old_province" class="col-md-3 control-label">จังหวัด</label>
				      		<select disabled="" id="old_province" name="old_province" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected="">เลือกจังหวัด</option>
								@foreach($province as $key => $value)
									<option {{  $key == $addressCode['province'] ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<label for="old_aumphoe" class="col-md-3 control-label">อำเภอ</label>
				      		<select disabled="" id="old_aumphoe" name="old_aumphoe" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected="">เลือกอำเภอ</option>
				            	@foreach($aumphoe as $key => $value)
									<option {{  $key == $addressCode['aumphoe'] ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<label for="old_tambon" class="col-md-3 control-label">ตำบล</label>
				      		<select disabled="" id="old_tambon" name="old_tambon" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected="">เลือกตำบล</option>
				            	@foreach($tambon as $key => $value)
									<option {{  $key == $addressCode['tambon'] ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label  class="col-md-4 control-label">จำนวนสมาชิกในบ้าน :</label>
			    	<div class="col-md-8">
			    		<div style="padding: 5px 0;">
			    			<label for="old_numberAll" class="col-md-3 control-label">ทั้งหมด</label>
			      			<input disabled="" type="number" style="width: 125px;" class="form-control input-form" id="old_numberAll" name="old_numberAll" placeholder="" value="{{ $person->numberAll ? $person->numberAll : '' }}">
			    		</div>
						<div id="old_over17" style="padding: 5px 0; {{ isset($person->type) && $person->type == 'บ้านพัก ศฝท.' ? '' : 'display: none' }}" >
			    			<label for="old_numberOver17" class="col-md-6 control-label">อายุมากกว่า 17 ปี</label>
			      			<input disabled="" type="number" style="width: 125px;" class="form-control input-form" id="old_numberOver17" name="old_numberOver17" placeholder="" value="{{ $person->numberOver17 ? $person->numberOver17 : '' }}">
			    		</div>

						<div id="old_numRtc" style="padding: 5px 0; {{ isset($person->type) && $person->type != 'บ้านพัก ศฝท.' && $person->numberAllRtc != ''  ? '': 'display: none' }}">
			    			<label for="old_numberAllRtc" class="col-md-5 control-label">บ้านพักศฝท.</label>
			      			<input disabled="" type="number" style="width: 50px;" class="form-control input-form col-md-3" id="old_numberAllRtc" name="old_numberAllRtc" placeholder="" value="{{ $person->numberAllRtc ? $person->numberAllRtc : '' }}">
			      			<input disabled="" type="number" style="width: 100px; margin-left: 10px;" class="form-control input-form col-md-3" id="numberOver17Rtc" name="numberOver17Rtc" placeholder="อายุ > 17" value="{{ $person->numberOver17 ? $person->numberOver17 : '' }}">
			    		</div>
			    	</div>
			  	</div>
			</div>

			<div class="col-md-5" style="border: 1px solid #dfdfdf; float: right; margin-right: 50px;">
				<div class="form-group">
			    	<label for="type" class="col-md-4 control-label">ประเภทบ้านพัก :</label>
			    	<div class="col-md-8">
			      		<div class="radio">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type1" value="type1">
						    	บ้านพัก ศฝท.
						  	</label>
						</div>
						<div class="radio">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type2" value="type2">
						    	บ้านพัก ทร. ส่วนกลาง
						  	</label>
						</div>
						<div class="radio disabled">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type3" value="type3">
						    	บ้านพักหน่วยราชการอื่น
						  	</label>
						</div>
						<input type="text" class="form-control input-form other-home" id="otherHouse" name="otherHouse" placeholder="ระบุ" style="display: none;">
						<div class="radio disabled">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type4" value="type4">
						    	บ้านพักส่วนตัว
						  	</label>
						</div>
			    	</div>
			  	</div>

			  	<div class="form-group" style="border-bottom: 1px solid #dfdfdf; border-top: 1px solid #dfdfdf;">
			    	<label class="col-md-4 control-label">ที่อยู่ :</label>
			    	<div class="col-md-8">
			    		<div style="padding: 5px 0;">
				    		<label for="number" class="col-md-3 control-label">เลขที่</label>
				      		<input type="text" style="width: 200px;" class="form-control input-form" id="number" name="number" placeholder="">
			    		</div>
			    		<div style="padding: 5px 0;">
			    			<label for="moo" class="col-md-3 control-label">หมู่</label>
			      			<input type="text" style="width: 200px;" class="form-control input-form" id="moo" name="moo" placeholder="">
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<label for="province" class="col-md-3 control-label">จังหวัด</label>
				      		<select id="province" name="province" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected="">เลือกจังหวัด</option>
								@foreach($province as $key => $value)
									<option value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<label for="aumphoe" class="col-md-3 control-label">อำเภอ</label>
				      		<select id="aumphoe" name="aumphoe" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected="">เลือกอำเภอ</option>
				            	@foreach($aumphoe as $key => $value)
									<option value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<label for="tambon" class="col-md-3 control-label">ตำบล</label>
				      		<select id="tambon" name="tambon" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected="">เลือกตำบล</option>
				            	@foreach($tambon as $key => $value)
									<option value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label  class="col-md-4 control-label">จำนวนสมาชิกในบ้าน :</label>

			    	<div class="col-md-8">
			    		<div style="padding: 5px 0;">
			    			<label for="numberAll" class="col-md-3 control-label">ทั้งหมด</label>
			      			<input type="number" style="width: 125px;" class="form-control input-form" id="numberAll" name="numberAll" placeholder="" value="">
			    		</div>
						<div id="over17" style="padding: 5px 0; {{ isset($person->type) && $person->type == 'บ้านพัก ศฝท.' ? '' : 'display: none' }}" >
			    			<label for="numberOver17" class="col-md-6 control-label">อายุมากกว่า 17 ปี</label>
			      			<input type="number" style="width: 125px;" class="form-control input-form" id="numberOver17" name="numberOver17" placeholder="" value="">
			    		</div>
			    		<div id="chkHasMemberRtc" style="padding: 5px 0; min-height: 45px; {{ isset($person->type) && $person->type != 'บ้านพัก ศฝท.' ? '': 'display: none' }}" class="checkbox">
			    			<label for="" class="col-md-3"></label>
							<label class="control-label col-md-9" style="text-align: left"><input id="hasMemberRtc" name="hasMemberRtc" class="" type="checkbox">มีสมาชิกในบ้าน พักอยู่บ้านพัก ศฝท.</label>
						</div>

						<div id="numRtc" style="padding: 5px 0; display: none">
			    			<label for="numberAllRtc" class="col-md-5 control-label">บ้านพักศฝท.</label>
			      			<input type="number" style="width: 50px;" class="form-control input-form col-md-3" id="numberAllRtc" name="numberAllRtc" placeholder="" value="">
			      			<input type="number" style="width: 100px; margin-left: 10px;" class="form-control input-form col-md-3" id="numberOver17Rtc" name="numberOver17Rtc" placeholder="อายุ > 17" value="">
			    		</div>
			    	</div>
			  	</div>


			</div>

		  	<div class="col-md-12" form-group" style="text-align: center; border: 	none; margin: 20px;">
				<button type="submit" class="btn btn-primary" style="width: 150px;">บันทึก</button>
				<button type="button" class="btn btn-danger" onclick="window.close();">ยกเลิก</button>
			</div>
		</form>
	</div>
@endsection
