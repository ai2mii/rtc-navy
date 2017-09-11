@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center;">ค้นหา ข้าราชการ ลูกจ้าง และพนักงาน</h2>
	<div class="container">
		<div class="jumbotron">
			<form class="form-horizontal" method="GET" action="{{ action('HomeController@search') }}">
			 	{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
				<div class="row" style="margin: 0 60px;">
					<label for="searchByRank" class="col-md-3 label-search">ยศ</label>
					<label for="searchByName" class="col-md-3 label-search">ชื่อ</label>
					<label for="searchBySname" class="col-md-3 label-search">สกุล</label>
				</div>
				<div class="row" style="margin: 0 60px;">
					<div class="col-md-3" style="text-align: center">
				            <select id="searchByRank" name="searchByRank" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected=""> </option>
								@foreach($rank as $value)
									<option {{ isset($request) && $request['searchByRank'] == $value ? 'selected' : '' }}>{{ $value }}</option>
			                    @endforeach
						    </select>
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="searchByName" name="searchByName" placeholder="" value="{{ isset($request) ? $request['searchByName'] : '' }}">
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="searchBySname" name="searchBySname" placeholder="" value="{{ isset($request) ? $request['searchBySname'] : '' }}">
			    	</div>
			    	<div class="col-md-3">
			    		<button type="submit" id="btn-search-person" class="btn btn-primary" style="width: 170px;">
			    			<i class="fa fa-search" aria-hidden="true"></i>
			    			ค้นหา
			    		</button>
			    	</div>
				</div>
			</form>
		</div>

		@if(isset($persons) && $persons != null)
			<div class="search-result header">ผลการค้นหา</div>
			<table class="table">
				<thead>
					<tr>
						<th>ที่</th>
						<th>ยศ</th>
						<th>ชื่อ</th>
						<th>สกุล</th>
						<th>ตำแหน่งปัจจุบัน</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($persons as $key => $person)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $person->rank }}</td>
							<td>{{ $person->name }}</td>
							<td>{{ $person->sname }}</td>
							<td>{{ $person->currentPosition }}</td>
							<td><a href="{{ action('PersonalController@index', ['action' => 'preview','id'=>$person->id]) }}" ><i class="fa fa-search" style="font-size: 20px;" aria-hidden="true"></i></a></td>
							<td><a href="{{ action('PersonalController@index', ['action' => 'edit','id'=>$person->id]) }}" ><i class="fa fa-pencil-square-o" style="font-size: 20px;" aria-hidden="true"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@elseif(isset($persons) && $persons == null)
			<div class="search-result header no-result">ไม่พบผลการค้นหา</div>
		@endif
	</div>
@endsection
