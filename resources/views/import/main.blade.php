@extends('app')

@section('content')
	@include('navbar')
		<h3 style="text-align: center; margin: 20px;">Import ข้อมูลลงตาราง person</h2>
		<div class="container">
			<div class="row jumbotron">
				<form class="form-horizontal" action="{{ action('ImportController@import') }}" files=true enctype="multipart/form-data" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-md-8">
						<div class="input-group">
			                <label class="input-group-btn">
			                    <span class="btn btn-primary">
			                        Browse… <input type="file" id="file" name="file" style="display: none;" multiple="">
			                    </span>
			                </label>
			                <input type="text" class="form-control" readonly="">
			            </div>
			            <span class="help-block">
		                	Plese select excel file (*.xlsx)
		            	</span>
					</div>
					<div class="col-md-4">
						<button style="width: 100%;" type="submit" class="btn btn-primary">Upload</button>
					</div>
				</form>
			</div>
			@if(isset($action) && $action == 'result')
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>ที่</th>
								<th>หมายเลขกลาโหม</th>
								<th>ยศ - ชื่อ - สกุล</th>
								<th>ตำแหน่งปัจจุบัน</th>
								<th>หมายเหตุ</th>
								<th>ดู</th>
								<th>เพิ่ม</th>
								<th>ลบ</th>
							</tr>
						</thead>
						<tbody>
							@foreach($persons as $key => $person)
								<tr style="background-color: {{ $person['remark'] == 'new' ? '#59FF00' : '' }} {{ $person['remark'] == 'old' ? '#c7c7c7' : '' }} {{ $person['remark'] == 'duplicate' && $person['isDifferent'] == 1 ? '#FFC300' : '' }}">
									<td class="text-center">{{ $key+1 }}</td>
									<td class="text-center">{{ $person['id']  }}</td>
									<td>{{ $person['rank'] . ' ' . $person['fullName'] }}</td>
									<td>{{ $person['currentPosition']  }}</td>
									<td>{{ $person['remark'] == 'new' ? 'ข้อมูลใหม่' : '' }}
										{{ $person['remark'] == 'old' ? 'ข้อมูลเก่า' : '' }}
										{{ $person['remark'] == 'duplicate' && $person['isDifferent'] == 1 ? 'ข้อมูลไม่ตรงกัน' : '' }}
										{{ $person['remark'] == 'duplicate' && $person['isDifferent'] == 0 ? 'ไม่มีการเปลียนแปลง' : '' }}
									</td>
									<td class="text-center"><a target="_blank" href="{{ action('ImportController@view', $person) }}" ><i class="fa fa-search" style="font-size: 20px;" aria-hidden="true"></i></a></td>
									<td class="text-center"><a href="" ><i class="fa fa-plus" style="font-size: 20px;" aria-hidden="true"></i></a></td>
									<td class="text-center"><a href="" ><i class="fa fa-trash-o" style="font-size: 20px;" aria-hidden="true"></i></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>
@endsection
								{{-- <th nowrap>ที่</th>
								<th nowrap>หมายเลขกลาโหม</th>
								<th nowrap>ยศ - ชื่อ - สกุล</th>
								<th nowrap>เลขประชาชน</th>
								<th nowrap>เหล่า/รุ่น</th>
								<th nowrap>กำเนิด</th>
								<th nowrap>ระดับ/ชั้น</th>
								<th nowrap>เงินเดือน</th>
								<th nowrap>เบิกลด</th>
								<th nowrap>วดป.เกิด</th>
								<th nowrap>วดป.รับราชการ</th>
								<th nowrap>วดป.รับยศ</th>
								<th nowrap>เกษียณ</th>
								<th nowrap>เงินประจำตำแหน่ง</th>
								<th nowrap>วดป.รับตำแหน่ง</th>
								<th nowrap>ตำแหน่ง</th>
								<th nowrap>เลขตำแหน่ง</th>
								<th nowrap>ตท.</th>
								<th nowrap>คุณวุฒิการศึกษา</th>
								<th nowrap>การศึกษาทางทหาร</th>
								<th nowrap>รร.สธ.เหล่าทัพ</th>
								<th nowrap>เครื่องราชฯ</th>
								<th nowrap>ว.ด.ป.รับยศก่อนปัจจุบัน</th>
								<th nowrap>ประเมินค่าเฉลี่ย 3 ครั้ง</th>
								<th nowrap>ศาสนา</th> --}}