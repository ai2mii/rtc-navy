@extends('app')

@section('content')
	@include('navbar')
		<h3 style="text-align: center; margin: 20px;">Import ข้อมูลลงตาราง person</h2>
		<div class="container">

			<div class="row">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center"></th>
							<th class="text-center">ข้อมูลใหม่</th>
							<th class="text-center">ข้อมูลเก่า</th>
							<th class="text-center">action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($persons as $key => $value)
							<tr>
								<th class="col-md-2 text-right">{{ $key }}</th>
								<td class="col-md-3">{{ $value }}</td>
								<td class="col-md-3"></td>
								<td class="col-md-3"></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
@endsection