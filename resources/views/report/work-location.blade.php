@extends('app')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>
		<div style="text-align: center">
			<h2>สถานที่ปฎิบัติราชการ</h2>
		</div>
		<div class="jumbotron row">
			<div class="form-group" id="worlLocation-block">
				<form action="{{ action('ReportController@workLocation') }}" class="form-horizontal" name="worlLocation">
					<label for="name" class="col-md-4 control-label">สถานที่ปฏิบัติราชการ</label>
				    <div class="col-md-5">
				      	<select class="selectpicker" data-show-subtext="true" data-live-search="true" id="worklocation" name="worklocation">
	            			<option selected="" value="all">เลือกสถานที่</option>
	            			@foreach($workLocation as $key => $location)
	            				<option {{ isset($worklocation) && $worklocation == $location->code ? 'selected' : '' }} value="{{ $location->code }}">{{ $location->name }}</option>
	            			@endforeach
			    		</select>
				    </div>
				    <div class="col-md-3">
						<button type="submit" id="search-location" class="btn btn-primary" style="width: 150px;">ค้นหา</button>
					</div>
				</form>
		  	</div>
		</div>
		@if(!empty($persons))
			@include('report.table.work-location')
		@endif

	</div>
@endsection
