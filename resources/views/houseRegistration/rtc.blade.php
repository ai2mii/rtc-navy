@extends('app')

@section('content')
	@include('navbar')
	<h3 style="text-align: center; margin: 20px;">บ้านพัก ศฝท.</h2>
	<div class="container">
		<div class="jumbotron">
			<div class="row" style="margin: 0 60px;">
				<label for="rank" class="col-md-3 label-search">ยศ</label>
				<label for="name" class="col-md-3 label-search">ชื่อ</label>
				<label for="sname" class="col-md-3 label-search">สกุล</label>
			</div>
			<form action="{{ action('HouseRegistrationController@rtc') }}">
				<div class="row" style="margin: 0 60px;">
					<div class="col-md-3" style="text-align: center">
				            <select id="rank" name="rank" class="selectpicker input-personal" data-show-subtext="true" data-live-search="true">
				            	<option selected=""> </option>
								@foreach($rank as $value)
									<option>{{ $value }}</option>
			                    @endforeach
						    </select>
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="name" name="name" placeholder="" value="">
			    	</div>
			    	<div class="col-md-3">
			      		<input type="text" class="form-control" id="sname" name="sname" placeholder="" value="">
			    	</div>
			    	<div class="col-md-3">
			    		<button style="width: 150px;" type="submit" id="btn-search-person" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
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
							<th>ที่</th>
							<th>ชื่อเจ้าของบ้าน</th>
							<th>สังกัด</th>
							<th>ชื่อผู้อาศัย</th>
							<th>เกี่ยวข้องเป็น</th>
							<th>ย้ายเข้า/ย้ายออก</th>
							<th>จากบ้านเลขที่</th>
							<th>เข้าบ้านเลขที่</th>
						</tr>
					</thead>
					<tbody>
						<input type="hidden" value="{{ $count = 1 }}">
						@foreach($registrationBook as $key => $book)
							<tr style="{{ $book->ranking == 1 ? 'border-top: 2px solid #555;' : '' }}">
								<td >{{ $book->ranking == 1 ? $count++ : '' }}</td>
								<td>{{ $book->ranking == 1 ? $book->rank . ' ' . $book->name . ' ' . $book->sname : '' }}</td>
								<td>{{ $book->ranking == 1 ? 'สังกัด' : '' }}</td>
								<td>{{ $book->ranking != 1 ? $book->rank . ' ' . $book->name . ' ' . $book->sname : '-' }}</td>
								<td></td>
								<td></td>
								<td></td>
								<td>{{ $book->addressNo }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
@endsection
