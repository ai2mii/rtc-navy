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

		<div class="dropdown" style="float: right;">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		  		@if($under == 'บก.')
		  			กองบังคับการ
		  		@elseif($under == 'บก.')
		  			กองบังคับการ
		  		@elseif($under == 'กนร.')
		  			กองนักเรียน
		  		@elseif($under == 'กศษ.')
		  			กองการศึกษา
		  		@elseif($under == 'กบก.')
		  			กองบริการ
		  		@elseif($under == 'แผนกแพทย์')
		  			แผนกแพทย์
		  		@else
		  			ทั้งหมด
		  		@endif
		    	<span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		  		<li><a href="{{ action('ReportPositionController@index', 'under=all') }}">ทั้งหมด</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportPositionController@index', 'under=บก.') }}">กองบังคับการ</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportPositionController@index', 'under=กนร.') }}">กองนักเรียน</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportPositionController@index', 'under=กศษ.') }}">กองการศึกษา</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportPositionController@index', 'under=กบก.') }}">กองบริการ</a></li>
		    	<li role="separator" class="divider"></li>
		    	<li><a href="{{ action('ReportPositionController@index', 'under=แผนกแพทย์') }}">แผนกแพทย์</a></li>
		  	</ul>
		</div>

		@include('report.table.position-special')
	</div>
@endsection
