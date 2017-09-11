@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center; margin: 20px;">บ้านพัก ศฝท.</h2>
	<div class="container">
		<div class="jumbotron">
			<div class="row" style="margin: 0 60px;">
				<label for="name" class="col-md-4 label-search">ชื่อ</label>
				<label for="sname" class="col-md-4 label-search">สกุล</label>
			</div>
			<form action="{{ action('HouseRegistrationController@moveRtc') }}">
				<div class="row" style="margin: 0 60px;">
			    	<div class="col-md-4">
			      		<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ !empty($request) ? $request['name'] : ''  }}">
			    	</div>
			    	<div class="col-md-4">
			      		<input type="text" class="form-control" id="sname" name="sname" placeholder="" value="{{ !empty($request) ? $request['sname'] : ''  }}">
			    	</div>
			    	<div class="col-md-4">
			    		<button style="width: 150px;" type="submit" id="btn-search-person" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
			    	</div>

				</div>
				<div class="row" style="margin: 10px 60px 0;">
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<a href="{{ action('HouseRegistrationController@moveInRtc', ['id'=>'', 'from'=>'new', 'addressNo' => '' ]) }}" target="_blank">ต้องการเพิ่มชื่อ กดที่นี่</a>
					</div>
				</div>
			</form>
		</div>
		@if($registrationBook != '')
			<div class="container">
				<table class="table">
					<caption>{{ 'จำนวนทั้งหมด ' . count($registrationBook) . ' คน' }}</caption>
					<thead>
						<tr>
							<th class="text-center">ที่</th>
							<th>ยศ</th>
							<th>ชื่อ</th>
							<th>สกุล</th>
							<th class="text-center">บ้านเลขที่</th>
							<th class="text-center">ย้ายเข้า</th>
							<th class="text-center">ย้ายออก</th>
						</tr>
					</thead>
					<tbody>
						<input type="hidden" value="{{ $count = 1 }}">
						@foreach($registrationBook as $key => $book)
							<tr>
								<td class="text-center">{{  $key + 1 }}</td>
								<td>{{ $book->rank }}</td>
								<td>{{ $book->name }}</td>
								<td>{{ $book->sname }}</td>
								<td class="text-center">{{ isset($book->addressNo) ? $book->addressNo : '' }}</td>
								<td class="text-center">
									<a href="{{ action('HouseRegistrationController@moveInRtc', ['id'=>$book->id13, 'from'=> isset($book->id) ? 'person' : 'book', 'addressNo' => isset($book->addressNo) ? $book->addressNo : '' ]) }}" target="_blank">
										<i class="fa fa-sign-in" style="font-size: 20px;" aria-hidden="true"></i>
									</a>
								</td>
								<td class="text-center">
									<a href="{{ action('HouseRegistrationController@moveOutRtc', ['id'=>$book->id13, 'from'=> isset($book->id) ? 'person' : 'book', 'addressNo' => isset($book->addressNo) ? $book->addressNo : '' ]) }}" target="_blank" style="{{ isset($book->id) ? 'display: none' : ''  }}">
										<i class="fa fa-sign-out" style="font-size: 20px;" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
@endsection