@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center; margin: 20px;">ค้นหาทะเบียนบ้าน</h2>
	<div class="container">
		<div class="jumbotron">
			<form action="{{ action('HouseRegistrationController@searchBy') }}">
				{{-- Search by --}}
				<div class="row" style="margin: 5px 60px;">
					<label for="searchBy" class="col-md-2" style="line-height: 2;">ค้นหาจาก</label>
					<div class="col-md-2">
						<select id="searchBy" name="searchBy" class="selectpicker" data-show-subtext="true" data-live-search="true">
							<option value="name" {{ $request->searchBy == 'name' ? 'selected' : '' }}>ชื่อ</option>
							<option value="address" {{ $request->searchBy == 'address' ? 'selected' : '' }}>ที่อยู่</option>
							<option value="age" {{ $request->searchBy == 'age' ? 'selected' : '' }}>อายุมากกว่า 17 ปี (บ้านพัก ศฝท.)</option>
						</select>
					</div>
				</div>
				{{-- Search by Name --}}
				<div class="row" style="margin: 5px 60px; {{ $request->searchBy == '' || $request->searchBy == 'name' ? '' : 'display: none' }}" id="searchByName">
					<label for="" class="col-md-2" style="line-height: 2;">ค้นจากชื่อ</label>
					<div class="col-md-3">
						<select id="rank" name="rank" class="selectpicker" data-show-subtext="true" data-live-search="true">
			            	<option selected="" value="">เลือกยศ</option>
							@foreach($rank as $value)
								<option {{ isset($request->rank) && $request->rank == $value ? 'selected' : '' }}>{{ $value }}</option>
		                    @endforeach
					    </select>
					</div>
					<div class="col-md-3">
			      		<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ" value="{{ isset($request->name) ? $request->name : '' }}">
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="sname" name="sname" placeholder="สกุล" value="{{ isset($request->sname) ? $request->sname : '' }}">
			    	</div>
				</div>
				{{-- Search by Address --}}
				<div class="row" style="margin: 5px 60px; {{ $request['searchBy'] == 'address' ? '' : 'display: none' }}" id="searchByAddress">
					<label for="" class="col-md-2" style="line-height: 2;">ค้นจากที่อยู่</label>
					<div class="col-md-3">
						<div class="radio">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type1" value="type1" {{ isset($request->optionsRadios) && $request->optionsRadios == 'type1' ? 'checked' : '' }}>
						    	บ้านพัก ศฝท.
						  	</label>
						</div>
						<div class="radio">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type2" value="type2" {{ isset($request->optionsRadios) && $request->optionsRadios == 'type2' ? 'checked' : '' }}>
						    	บ้านพัก ทร. ส่วนกลาง
						  	</label>
						</div>
						<div class="radio disabled">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type3" value="type3" {{ isset($request->optionsRadios) && $request->optionsRadios == 'type3' ? 'checked' : '' }}>
						    	บ้านพักหน่วยราชการอื่น
						  	</label>
						</div>
						<div id="otherHouse" style="{{ isset($request->optionsRadios) && $request->optionsRadios == 'type3' ? '' : 'display: none' }}">
							<select name="otherHouse" class="selectpicker" data-show-subtext="true" data-live-search="true" >
				            	<option selected="" value="all">ทั้งหมด</option>
				            	@foreach($otherHouse as $key => $value)
									<option {{ isset($request->otherHouse) && $request->otherHouse == $value ? 'selected' : '' }}>{{ $value }}</option>
			                    @endforeach
						   </select>
						</div>
						<div class="radio disabled">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="type4" value="type4" {{ isset($request->optionsRadios) && $request->optionsRadios == 'type4' ? 'checked' : '' }}>
						    	บ้านพักส่วนตัว
						  	</label>
						</div>
					</div>

					<div class="col-md-2">
						<div style="padding: 5px 0;">
				      		<input type="text" value="{{ isset($request->number) ? $request->number : '' }}" style="width: 100px; float: left;" class="form-control input-form" id="number" name="number" placeholder="เลขที่">
				      		<input type="text" value="{{ isset($request->moo) ? $request->moo : '' }}" style="width: 100px; float: left; margin-top: 9px;" class="form-control input-form" id="moo" name="moo" placeholder="หมู่">
			    		</div>
					</div>
					<div class="col-md-3">
						<div style="padding: 5px 0;">
			    			<select id="province" name="province" class="selectpicker" data-show-subtext="true" data-live-search="true">
				            	<option selected="" value="">เลือกจังหวัด</option>
								@foreach($province as $key => $value)
									<option {{  $key == $request->province ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    		<div style="padding: 5px 0;">
				    		<select id="aumphoe" name="aumphoe" class="selectpicker" data-show-subtext="true" data-live-search="true">
				            	<option selected="" value="">เลือกอำเภอ</option>
				            	@foreach($aumphoe as $key => $value)
									<option {{  $key == $request->aumphoe ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
			    		<div style="padding: 5px 0;">
			    			<select id="tambon" name="tambon" class="selectpicker" data-show-subtext="true" data-live-search="true">
				            	<option selected="" value="">เลือกตำบล</option>
				            	@foreach($tambon as $key => $value)
									<option {{  $key == $request->tambon ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
			                    @endforeach
						    </select>
			    		</div>
					</div>
				</div>

				{{-- Search by Age --}}
				{{-- <div class="row" style="margin: 5px 60px; display: none;" id="searchByAge">
					<label for="" class="col-md-2" style="line-height: 2;">ค้นจากอายุ</label>
					<div class="col-md-3">
						<select id="age" name="age" class="selectpicker" data-show-subtext="true" data-live-search="true">
			            	<option selected="" value="over">มากกว่า 17 ปี</option>
			            	<option selected="" value="less">น้อยกว่า 17 ปี</option>
						   </select>
					</div>
				</div> --}}
				{{-- Button Submit --}}
				<div class="row" style="margin: 5px 60px;">
					<div class="col-md-2"></div>
					<div class="col-md-3">
						<button style="width: 150px;" type="submit" id="" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
					</div>
				</div>
			</form>
		</div>

		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>

		@if($registrationBook != '')
		<div class="container">
			@if($sumAge)
				<h3>จำนวนผู้ที่มีอายุมากกว่า 17 ปี มีทั้งหมด {{ $sumAge }} คน</h3>
			@endif
			@include('houseRegistration.table.search')
		</div>
		@endif
	</div>
@endsection

