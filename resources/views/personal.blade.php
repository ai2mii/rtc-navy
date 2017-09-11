@extends('app')

@section('content')
	@include('navbar')

	<div class="container" id="person-page" data-action="{{ $action ? $action : '' }}">
		<form id="person-form" class="form-horizontal" action="{{ action('PersonalController@save') }}" files=true onsubmit="return confirm('ต้องการบันทึกใช่หรือไม่?');" enctype="multipart/form-data" method="post">
		 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		 	<div class="row button-edit">
		 		<button type="button" class="edit btn btn-success" style="display: none;" onclick="window.location='/rtcnavy/public/personal?action=edit&id={{ $person ? $person->id : ''  }}'">แก้ไขข้อมูล</button>
		 	</div>
    		<div class="row personal">
    			<div class="col-md-2">
    				<div class="profile-image">
    					<img id="profile-preview" class="image-preview" src="../storage/app/profileImage/{{$person ?$person->profileImage : 'default.png'}}" alt="profile image">
    				</div>
    				{{-- <input type='file' id="profileImage" name="profileImage" class="upload"> --}}


					<div class="input-group">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary" style="height: 30px; width: 75px;">
			                        Browse… <input type="file" id="profileImage" name="profileImage" style="display: none;" multiple="">
			                    </span>
			                </label>
			                <input type="text" class="form-control" readonly="" style="height: 30px;">
			            </div>
			            <span class="help-block">
		                	Please select image file
		            </span>
    			</div>
    			<div class="col-md-5 profile">
    				<div class="form-group">
				    	<label for="id" class="col-md-4 control-label">หมายเลขกลาโหม</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="id" name="id" placeholder="" value="{{ $person ? $person->id : '' }}">
				      		<span id="err-id" class="err-msg">กรุณากรอกหมายเลข</span>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="rank" class="col-md-4 control-label">ยศ</label>
				    	<div class="col-md-4">
				            <select id="rank" name="rank" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            		<option {{ $person && $person->rank == '' ? 'selected' : '' }} >-</option>
								@foreach($staticLists->rank as $value)
									<option {{ $person && $person->rank == $value ? 'selected' : '' }} >{{ $value }}</option>
			                    @endforeach
						    </select>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="name" class="col-md-4 control-label">ชื่อ</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="name" name="name" placeholder="" value="{{ $person ? $person->name : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="sname" class="col-md-4 control-label">นามสกุล</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="sname" name="sname" placeholder="" value="{{ $person ? $person->sname : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="id13" class="col-md-4 control-label">เลขประจำตัวประชาชน</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="id13" name="id13" placeholder="" value="{{ $person ? $person->id13 : '' }}">
				      		<span id="err-id13" class="err-msg">กรุณากรอกหมายเลข 13 หลัก</span>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="phoneNo" class="col-md-4 control-label">โทร. (ที่ทำงาน)</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="phoneNo" name="phoneNo" placeholder="" value="{{ $person ? $person->phoneNo : '' }}">
				      		<span id="err-phoneNo" class="err-msg">กรุณากรอกเบอร์โทร 5 หลัก</span>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="mobilePhoneNo" class="col-md-4 control-label">มือถือ</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="mobilePhoneNo" name="mobilePhoneNo" placeholder="" value="{{ $person ? $person->mobilePhoneNo : '' }}">
				      		<span id="err-mobilePhoneNo" class="err-msg">กรุณากรอกเบอร์โทร 10 หลัก</span>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="religion" class="col-md-4 control-label">ศาสนา</label>
				    	<div class="col-md-4">
				            <select id="religion" name="religion" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option {{ $person && $person->religion == '' ? 'selected' : '' }} >-</option>
								<option {{ $person && $person->religion == 'พุทธ' ? 'selected' : '' }} >พุทธ</option>
								<option {{ $person && $person->religion == 'คริสต์' ? 'selected' : '' }} >คริสต์</option>
								<option {{ $person && $person->religion == 'อิสลาม' ? 'selected' : '' }} >อิสลาม</option>
						    </select>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="bloodType" class="col-md-4 control-label">กรุ๊ปเลือด</label>
				    	<div class="col-md-4">
				            <select id="bloodType" name="bloodType" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option {{ $person && $person->bloodType == '' ? 'selected' : '' }} >-</option>
								<option {{ $person && $person->bloodType == 'เอ' ? 'selected' : '' }} >เอ</option>
								<option {{ $person && $person->bloodType == 'บี' ? 'selected' : '' }} >บี</option>
								<option {{ $person && $person->bloodType == 'เอบี' ? 'selected' : '' }} >เอบี</option>
								<option {{ $person && $person->bloodType == 'โอ' ? 'selected' : '' }} >โอ</option>
						    </select>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="height" class="col-md-4 control-label">ส่วนสูง</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="height" name="height" placeholder="" value="{{ $person ? $person->height : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="weight" class="col-md-4 control-label">น้ำหนัก</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="weight" name="weight" placeholder="" value="{{ $person ? $person->weight : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="bmi" class="col-md-4 control-label">BMI</label>
				    	<div class="col-md-4">
				      		<input disabled="" type="text" class="form-control input-personal" id="bmi" name="bmi" placeholder="" value="{{ $person ? $person->bmi : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="health" class="col-md-4 control-label">วันที่ตรวจสุขภาพ</label>
				    	<div class="col-md-4">
				      		<input type="date" class="form-control input-personal" id="health" name="health" placeholder="" value="{{ $person ? $person->health : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="disbursement" class="col-md-4 control-label">สิทธิการเบิกจ่าย</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="disbursement" name="disbursement" placeholder="" value="{{ $person ? $person->disbursement : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="profileBook" class="col-md-4 control-label">สมุดประวัติ</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="profileBook" name="profileBook" placeholder="x/xxx" value="{{ $person ? $person->profileBook : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="trainingResults" class="col-md-4 control-label">ผลการอบรมหลักสูตร</label>
				    	<div class="col-md-4">
				            <select id="trainingResults" name="trainingResults" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option {{ $person && $person->trainingResults == '' ? 'selected' : '' }} >-</option>
								<option {{ $person && $person->trainingResults == 'ไม่มีข้อมูล' ? 'selected' : '' }} >ไม่มีข้อมูล</option>
						    </select>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="currentPosition" class="col-md-4 control-label">ตำแหน่งปัจจุบัน</label>
				    	<div class="col-md-4">
				      		<textarea rows="4" class="form-control input-personal" id="currentPosition" name="currentPosition" value="{{ $person ? $person->currentPosition : '' }}">{{ $person ? $person->currentPosition : '' }}</textarea>
				    	</div>
				  	</div>

    			</div>
{{-- ///////////////////////// RIGHT COLUMN /////////////////////////////////////////////////// --}}
    			<div class="col-md-5">
				  	<div class="form-group">
				    	<label for="workLocation" class="col-md-4 control-label">สถานที่ปฏิบัติราชการ</label>
				    	<div class="col-md-4">
				      		<textarea rows="4" class="form-control input-personal" id="workLocation" name="workLocation" value="{{ $person ? $person->workLocationText : '' }}" data-toggle="modal" data-target=".bs-work-location-modal-lg" >{{ $person ? $person->workLocationText : '' }}</textarea>
				      		@include('modalWorkLocation')
				      		<input id="workLocationCode" name="workLocationCode" type="hidden" value="{{ $person ? $person->workLocationCode : '' }}">
				      		<input id="workPositionCode" name="workPositionCode" type="hidden" value="{{ $person ? $person->workPositionCode : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="corps" class="col-md-4 control-label">พรรค เหล่า</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="corps" name="corps" placeholder="" value="{{ $person ? $person->corps : '' }}">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="line" class="col-md-4 control-label">สายวิทยาการ</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="line" name="line" placeholder="" value="{{ $person ? $person->line : '' }}">
				    	</div>
				  	</div>

    				<div class="form-group">
				    	<label for="birthdate" class="col-md-4 control-label">วันเกิด</label>
				    	<div class="col-md-4">
				      		<input type="date" class="form-control input-personal" id="birthdate" name="birthdate" placeholder="" value="{{ $person ? $person->birthdate : '' }}">
				    	</div>
				  	</div>

    				<div class="form-group">
				    	<label for="militaryServiceDate" class="col-md-4 control-label">วันรับราชการ</label>
				    	<div class="col-md-4">
				      		<input type="date" class="form-control input-personal" id="militaryServiceDate" name="militaryServiceDate" placeholder="" value="{{ $person ? $person->militaryServiceDate : '' }}">
				    	</div>
				  	</div>

    				<div class="form-group">
				    	<label for="militaryRegistrationDate" class="col-md-4 control-label">วันขึ้นทะเบียนทหาร</label>
				    	<div class="col-md-4">
				      		<input type="date" class="form-control input-personal" id="militaryRegistrationDate" name="militaryRegistrationDate" placeholder="" value="{{ $person ? $person->militaryRegistrationDate : '' }}">
				    	</div>
				  	</div>

    				<div class="form-group">
				    	<label for="retiredYears" class="col-md-4 control-label">ปีเกษียณ</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="retiredYears" name="retiredYears" placeholder="" value="{{ $person ? $person->retiredYears : '' }}">
				    	</div>
				  	</div>

    				<div class="form-group">
				    	<label for="memberDate" class="col-md-4 control-label">วันเป็นสมาชิก กบข.</label>
				    	<div class="col-md-4">
				      		<input type="date" class="form-control input-personal" id="memberDate" name="memberDate" placeholder="" value="{{ $person ? $person->memberDate : '' }}">
				    	</div>
				  	</div>

					<div class="form-group">
				    	<label for="level" class="col-md-4 control-label">เงินเดือน</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="level" name="level" placeholder="" value="{{ $person ? $person->level : '' }}">
				    	</div>
				  	</div>

    				<div class="form-group">
				    	<label for="salary" class="col-md-4 control-label">เงินเดือน</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="salary" name="salary" placeholder="" value="{{ $person ? $person->salary : '' }}">
				    	</div>
				  	</div>
    			{{-- </div> --}}

{{-- //////////////////////////////////////////  POSITION  /////////////////////////////////////////// --}}
					<div class="position-panel"></div>
					<div class="position-rank">ตำแหน่งตามโครงสร้าง</div>
					<div class="form-group">
				    	<label for="position" class="col-md-4 control-label">ตำแหน่ง</label>
				    	<div class="col-md-4">
				      		<input type="text" class="form-control input-personal" id="position" name="position" placeholder="เลือกตำแหน่ง" data-toggle="modal" data-target=".bs-position-modal-lg" value="{{ $person ? $person->positionCode : '' }}">
				      		@include('modalPosition')
				    	</div>
				  	</div>

					<div class="form-group">
				    	<label for="positionNameDisable" class="col-md-4 control-label">ชื่อตำแหน่ง</label>
				    	<div class="col-md-4">
				      		<textarea rows="4"  disabled="" class="form-control input-personal" id="positionNameDisable" name="positionNameDisable" value="{{ $person ? $person->positionName : '' }}">{{ $person ? $person->positionName : '' }}</textarea>
				    	</div>
				  	</div>

					<div class="form-group">
				    	<label for="positionRankDisable" class="col-md-4 control-label">ยศ</label>
				    	<div class="col-md-4">
				      		<input disabled="" type="text" class="form-control input-personal" id="positionRankDisable" name="positionRankDisable" placeholder="" value="{{ $person ? $person->positionRank : '' }}">
				    	</div>
				  	</div>

					<div class="form-group">
				    	<label for="positionCorpsDisable" class="col-md-4 control-label">พรรค / เหล่า</label>
				    	<div class="col-md-4">
				      		<input disabled="" type="text" class="form-control input-personal" id="positionCorpsDisable" name="positionCorpsDisable" placeholder="" value="{{ $person ? $person->positionCorps : '' }}">
				    	</div>
				  	</div>

					<div class="form-group">
				    	<label for="positionLineDisable" class="col-md-4 control-label">สายวิทยาการ</label>
				    	<div class="col-md-4">
				      		<input disabled="" type="text" class="form-control input-personal" id="positionLineDisable" name="positionLineDisable" placeholder="" value="{{ $person ? $person->positionLine : '' }}">
				    	</div>
				  	</div>

					<div class="save-person">
						<button type="submit" class="btn btn-primary">{{ $action == 'edit' ? 'บันทึก' : 'เพิ่มข้อมูล' }}</button>
					<button type="button" class="btn btn-danger" onclick="window.location='/rtcnavy/public/personal{{ $action == 'edit' ? '?action=preview&id=' . $person->id : '' }}'">ยกเลิก</button>
					</div>
					
				</div>
    		</div>

		</form>
	</div>
@endsection
