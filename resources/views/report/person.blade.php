@extends('app')

@section('content')
	@include('navbar')
	<div class="container" id="report-person-container" data-attr="{{ $type }}">
		<div class="row">
			<div class="col-md-4">
			    <div class="form-group">
			    	<label for="searchBy" class="col-md-4 control-label" style="text-align: right;">ค้นหาจาก : </label>
			    	<div class="col-md-4">
			      		<select id="searchBy" class="report-person searchBy selectpicker" data-show-subtext="true" data-live-search="true">
	            			<option selected="">ทั้งหมด</option>
	            			<option {{ $cate == 'rank' ? 'selected' : '' }} value="rank">ยศ</option>
	            			<option {{ $cate == 'corps' ? 'selected' : '' }} value="corps">พรรค/เหล่า</option>
	            			<option {{ $cate == 'line' ? 'selected' : '' }} value="line">สายวิทยาการ</option>
	            			<option {{ $cate == 'position' ? 'selected' : '' }} value="position">ตำแหน่ง</option>
	            			<option {{ $cate == 'under' ? 'selected' : '' }} value="under">กอง</option>
	            			@if($type == 'position2')
								<option {{ $cate == 'start' ? 'selected' : '' }} value="start">กำเนิด</option>
		            			<option {{ $cate == 'retiredYears' ? 'selected' : '' }} value="retiredYears">ปีเกษียณ</option>
		            			<option {{ $cate == 'education' ? 'selected' : '' }} value="education">วุฒิการศึกษา</option>
		            			<option {{ $cate == 'insignia' ? 'selected' : '' }} value="insignia">เครื่องราช ฯ</option>
		            			<option {{ $cate == 'religion' ? 'selected' : '' }} value="religion">ศาสนา</option>
	            			@endif
			    		</select>
			    	</div>
			  	</div>
			</div>
		</div>

		<div id="searchBy2-box" class="row" style="margin-top: 10px; {{ $cate ? '' : 'display: none' }}">
			<div class="col-md-4">
			    <div class="form-group">
			    	<label id="label-searchBy2" class="col-md-4 control-label" style="text-align: right;">{{ $label }}  </label>
					{{-- RANK --}}
			    	<div id="rank-box" class="col-md-4" style="{{ $cate == 'rank' ? '' : 'display: none' }}">
			      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
	            			<option selected="">เลือกยศ</option>
	            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
	            			@foreach($rank as $value)
	            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
	            			@endforeach
			    		</select>
			    	</div>
					{{-- CORPS --}}
			    	<div id="corps-box" class="col-md-4" style="{{ $cate == 'corps' ? '' : 'display: none' }}">
			      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
	            			<option selected="">เลือกพรรค/เหล่า</option>
	            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
	            			@foreach($corps as $value)
	            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
	            			@endforeach
			    		</select>
			    	</div>
					{{-- LINE --}}
			    	<div id="line-box" class="col-md-4" style="{{ $cate == 'line' ? '' : 'display: none' }}">
			      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
	            			<option selected="">เลือกสายวิทยาการ</option>
	            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
	            			@foreach($line as $value)
	            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
	            			@endforeach
			    		</select>
			    	</div>

			    	{{-- POSITION --}}
			    	<div id="position-box" class="col-md-4" style="{{ $cate == 'position' ? '' : 'display: none' }}">
			      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
	            			<option selected="">เลือกตำแหน่ง</option>
	            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
	            			@foreach($position as $value)
	            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
	            			@endforeach
			    		</select>
			    	</div>

			    	{{-- UNDER --}}
			    	<div id="under-box" class="col-md-4" style="{{ $cate == 'under' ? '' : 'display: none' }}">
			      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
	            			<option selected="">เลือกกอง</option>
	            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
	            			@foreach($under as $value)
	            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
	            			@endforeach
			    		</select>
			    	</div>

					@if($type == 'position2')
				    	{{-- START --}}
				    	<div id="start-box" class="col-md-4" style="{{ $cate == 'start' ? '' : 'display: none' }}">
				      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
		            			<option selected="">เลือกกำเนิด</option>
		            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
		            			@foreach($start as $value)
		            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
		            			@endforeach
				    		</select>
				    	</div>
				    	{{-- RETIRED YEARS --}}
				    	<div id="retiredYears-box" class="col-md-4" style="{{ $cate == 'retiredYears' ? '' : 'display: none' }}">
				      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
		            			<option selected="">เลือกปีเกษียณ</option>
		            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
		            			@foreach($retiredYears as $value)
		            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
		            			@endforeach
				    		</select>
				    	</div>

				    	{{-- EDUCATION --}}
				    	<div id="education-box" class="col-md-4" style="{{ $cate == 'education' ? '' : 'display: none' }}">
				      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
		            			<option selected="">เลือกวุฒิการศึกษา</option>
		            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
		            			@foreach($education as $value)
		            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
		            			@endforeach
				    		</select>
				    	</div>
				    	{{-- INSIGNIA --}}
				    	<div id="insignia-box" class="col-md-4" style="{{ $cate == 'insignia' ? '' : 'display: none' }}">
				      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
		            			<option selected="">เลือกเครื่องราช ฯ</option>
		            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
		            			@foreach($insignia as $value)
		            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
		            			@endforeach
				    		</select>
				    	</div>
				    	{{-- RELIGION --}}
				    	<div id="religion-box" class="col-md-4" style="{{ $cate == 'religion' ? '' : 'display: none' }}">
				      		<select class="report-person searchBy2 selectpicker" data-show-subtext="true" data-live-search="true">
		            			<option selected="">เลือกศาสนา</option>
		            			<option {{ $searchBy == 'ไม่ระบุ' ? 'selected' : '' }}>ไม่ระบุ</option>
		            			@foreach($religion as $value)
		            				<option {{ $value == $searchBy ? 'selected' : '' }}>{{ $value }}</option>
		            			@endforeach
				    		</select>
				    	</div>
			    	@endif
			  	</div>
			</div>
		</div>
		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>
		<div style="text-align: center">
			<h2>{{ $type == 'position' ? 'รายชื่อตามโครงสร้าง' : 'รายชื่อตามบรรจุ' }}</h2>
		</div>
		@include('report.table.person')
	</div>
@endsection
