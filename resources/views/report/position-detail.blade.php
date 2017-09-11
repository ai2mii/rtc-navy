@extends('app')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>
		<div style="text-align: center">
			<h2>รายละเอียดการบรรจุกำลังพล ศฝท.ยศ.ทร.</h2>
		</div>
		<div>
			<h3>{{ $positionName }}</h3>
			<h4>{{ $label }}</h4>
		</div>

		@include('report.table.position-detail')
	</div>
@endsection
