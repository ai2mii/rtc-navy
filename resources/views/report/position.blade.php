@extends('app')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>
		<div style="text-align: center">
			<h2>ตำแหน่งตามโครงสร้าง</h2>
		</div>

		<div class="dropdown" style="float: right;">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		  		@if($available == 'notAvailable')
		  			ตำแหน่งที่ไม่ว่าง
		  		@elseif($available == 'available')
					ตำแหน่งที่ว่าง
		  		@else
		  			ตำแหน่งทั้งหมด
		  		@endif
		    	<span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		  		<li><a href="{{ action('ReportController@position', 'available=all') }}">ตำแหน่งทั้งหมด</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportController@position', 'available=notAvailable') }}">ตำแหน่งที่ไม่ว่าง</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportController@position', 'available=available') }}">ตำแหน่งที่ว่าง</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportController@position', 'available=close') }}">ตำแหน่งที่ปิดบรรจุ</a></li>
		  	</ul>
		</div>

		@include('report.table.position')
	</div>
@endsection
