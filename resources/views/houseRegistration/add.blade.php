@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center; margin: 20px;">ค้นหาทะเบียนบ้าน</h2>
	<div class="container">
		<div class="jumbotron">
			<div class="row" style="margin: 0 60px;">
				<label for="rank" class="col-md-3 label-search">ยศ</label>
				<label for="name" class="col-md-3 label-search">ชื่อ</label>
				<label for="sname" class="col-md-3 label-search">สกุล</label>
			</div>
			<form action="{{ action('HouseRegistrationController@searchForAdd') }}">
				<div class="row" style="margin: 0 60px;">
					<div class="col-md-3" style="text-align: center">
				            <select id="rank" name="rank" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected=""> </option>
								@foreach($rank as $value)
									<option {{ isset($urlParam) && $urlParam['rank'] == $value ? 'selected' : '' }}>{{ $value }}</option>
			                    @endforeach
						    </select>
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ isset($urlParam) ? $urlParam['name'] : '' }}">
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="sname" name="sname" placeholder="" value="{{ isset($urlParam) ? $urlParam['sname'] : '' }}">
			    	</div>
			    	<div class="col-md-3">
			    		<button style="width: 150px;" type="submit" id="btn-search-person" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
			    	</div>
				</div>
			</form>
		</div>

		@if(isset($isSearch))
		<div class="container">
			<table class="table">
				<caption>{{ 'จำนวนทั้งหมด ' . count($persons) . ' คน' }}</caption>
				<thead>
					<tr>
						<th>ที่</th>
						<th>ยศ</th>
						<th>ชื่อ</th>
						<th>สกุล</th>
						<th>สังกัด</th>
						<th></th><th></th><th></th>
						<th>แก้ไข &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ย้าย</th>

					</tr>
				</thead>
				<tbody>
					@foreach($persons as $key => $person)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $person->rank }}</td>
							<td>{{ $person->name }}</td>
							<td>{{ $person->sname }}</td>
							<td>{{ $person->under }}</td>
							<td></td><td></td><td></td>
							<td>
								<a href="{{ action('HouseRegistrationController@edit', ['id'=>$person->id]) }}" target="_blank">
									<i class="fa fa-pencil-square-o" style="font-size: 20px;" aria-hidden="true"></i>
								</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="{{ action('HouseRegistrationController@move', ['id'=>$person->id, 'action'=> 'moveIn']) }}" target="_blank">
									<i class="fa fa-sign-in" style="font-size: 20px;" aria-hidden="true"></i>
								</a>
								{{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="{{ action('HouseRegistrationController@move', ['id'=>$person->id, 'action'=> 'moveOut']) }}" target="_blank">
									<i class="fa fa-sign-out" style="font-size: 20px;" aria-hidden="true"></i>
								</a> --}}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
@endsection
