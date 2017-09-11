@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center;">ย้ายทะเบียนบ้าน</h2>
	<div class="container move-registration">
		<form action="{{ action('HouseRegistrationController@saveMove') }}" class="form-horizontal">
			<div class="alert alert-success fade in {{ $isSave == 1 ? '' : 'hide' }}" {{ $isSave}}>
			    <a href="#" class="close" data-dismiss="alert">&times;</a>
			    <strong>บันทึกข้อมูลเรียบร้อย</strong>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="date" class="col-md-6 control-label">วันที่ย้าย : </label>
						<div class="col-md-6">
							<input value="{{ $today }}" type="date" class="form-control input-form" id="date" name="date" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="fullname" class="col-md-6 control-label">ชื่อเจ้าของบ้าน : </label>
						<div class="col-md-6">
							<input value="{{ empty($houseOwner) ? '' : $houseOwner->rank .' '. $houseOwner->name . '  ' . $houseOwner->sname }}" disabled="" type="text" class="form-control input-form" id="fullname-disabled" name="fullname-disabled" placeholder="-">
							<input type="hidden" name="houseOwnerId" value="{{ empty($houseOwner) ? '' : $houseOwner->id13 }}">
						</div>
					</div>
					<div class="form-group">
						<label for="under" class="col-md-6 control-label">สังกัด : </label>
						<div class="col-md-6">
							<input value="{{ empty($houseOwner) ? '' : $houseOwner->under }}" disabled="" type="text" class="form-control input-form" id="under-disabled" name="under-disabled" placeholder="-">
						</div>
					</div>
					<div class="form-group">
						<label for="whoMove" class="col-md-6 control-label">ผู้ขออาศัย : </label>
						<div class="col-md-6">
							<div class="row form-group">
								<label for="whoMoveId" class="col-md-3 control-label">เลขบัตร ปชช. : </label>
								<div class="col-md-6">
									<input  type="text" name="whoMoveId" class="form-control" value="{{ isset($whoMove->id13) ? $whoMove->id13 : ''}}" style="width: 155px;">
								</div>
							</div>
							<div class="row form-group">
								<label for="rank" class="col-md-3 control-label">ยศ / คำนำหน้า : </label>
								<div class="col-md-6">
									<input type="text" name="rank" class="form-control" value="{{ isset($whoMove->rank) ? $whoMove->rank : '' }}" style="width: 155px;">
								</div>
							</div>
							<div class="row form-group">
								<label for="name" class="col-md-3 control-label">ชื่อ: </label>
								<div class="col-md-6">
									<input type="text" name="name" class="form-control" value="{{ isset($whoMove->name) ? $whoMove->name : '' }}" style="width: 155px;">
								</div>
							</div>
							<div class="row form-group">
								<label for="sname" class="col-md-3 control-label">นามสกุล : </label>
								<div class="col-md-6">
									<input type="text" name="sname" class="form-control" value="{{ isset($whoMove->sname) ? $whoMove->sname : '' }}" style="width: 155px;">
								</div>
							</div>
							<div class="row form-group">
								<label for="sex" class="col-md-3 control-label">เพศ : </label>
								<div class="col-md-6">
									<input type="text" name="sex" class="form-control" value="{{ isset($whoMove->sex) ? $whoMove->sex : '' }}" style="width: 155px;">
								</div>
							</div>
							<div class="row form-group">
								<label for="birthdate" class="col-md-3 control-label">วันเกิด : </label>
								<div class="col-md-6">
									<input type="date" name="birthdate" class="form-control" value="{{ isset($whoMove->birthdate) ? $whoMove->birthdate : '' }}" style="width: 155px;">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="relation" class="col-md-6 control-label">เกี่ยวข้องเป็น : </label>
						<div class="col-md-6">
							<input value="{{ isset($whoMove->relation) ? $whoMove->relation : '' }}"  type="text" class="form-control input-form" id="relation" name="relation" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="move" class="col-md-6 control-label">ย้ายเข้า / ย้ายออก : </label>
						<div class="col-md-6">
							<input disabled="" value="{{ $moveStatus == 'moveIn' ? 'ย้ายเข้า' : 'ย้ายออก' }}"  type="text" class="form-control input-form"  placeholder="">
							<input type="hidden" value="{{ $moveStatus }}" id="move" name="move">
						</div>
					</div>
					<div class="form-group">
						<label for="addressNoOld" class="col-md-6 control-label">จากบ้านเลขที่ : </label>
						<div class="col-md-6">
							<input value="{{ $from == 'book' ? $whoMove->addressNo : '-' }}"  type="text" class="form-control input-form" id="addressNoOld" name="addressNoOld" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="addressNoNew" class="col-md-6 control-label">เข้าบ้านเลขที่ : </label>
						<div class="col-md-6">
							@if($moveStatus == 'moveIn')
								<input value=""  type="text" class="form-control input-form" id="addressNoNew" name="addressNoNew" placeholder="">
							@else
								<textarea class="form-control" name="addressNoNew" id="" cols="3" rows="3" style="width: 300px" placeholder="กรอกที่อยู่ใหม่"></textarea>
							@endif
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
