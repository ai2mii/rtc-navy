@extends('app')

@section('content')
	@include('navbar')
	<div class="container">
		<div class="pull-right">
			<button id="export-person" class="btn btn-success">Export to excel</button>
		</div>
		<div style="text-align: center">
			<h2>สรุปยอดบัญชีกำลังพล ศฝท.ยศ.ทร.</h2>
		</div>

		@include('report.table.position-summary')
	</div>
@endsection
