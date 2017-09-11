@extends('app')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>
		<div style="text-align: center">
			<h2>สถานะการบรรจุ</h2>
		</div>
		<div class="dropdown" style="float: right;">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		  		{{ $searchStatus ? $searchStatus : 'ทั้งหมด' }}
		    	<span class="caret"></span>
		  	</button>

		  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		  		<li><a href="{{ action('ReportController@registerStatus', 'status=') }}">ทั้งหมด</a></li>
		    	<li role="separator" class="divider"></li>
		  		@foreach($registerStatus as $key => $value)
					<li><a href="{{ action('ReportController@registerStatus', 'status=' . $value) }}">{{ $value }}</a></li>
		    		<li role="separator" class="divider"></li>
		  		@endforeach
		  	</ul>
		</div>
		<div>
			<h4>สถานะการบรรจุ : {{ $searchStatus ? $searchStatus : 'ทั้งหมด' }}</h4>
		</div>
		@include('report.table.register-status')
	</div>
@endsection
