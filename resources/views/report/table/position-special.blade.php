<table id="example" class="table position-special" >
	{{-- <caption>{{ 'จำนวนทั้งหมด ' . ' ตำแหน่ง' }}</caption> --}}
	<thead>
		<tr>
			<th class="text-center">ลำดับ อฉก.</th>
			<th class="text-center">ตำแหน่ง</th>
			<th class="text-center">พรรค - เหล่า</th>
			<th class="text-center">ชั้นยศ</th>
			<th class="text-center">จำนวน</th>
			<th class="text-center">ปิดบรรจุ</th>
			<th class="text-center">เปิดบรรจุ</th>
			<th class="text-center">บรรจุจริง</th>
			<th class="text-center">ว่างบรรจุ</th>
		</tr>
	</thead>
	<tbody>
		@if($under == 'all')
			@foreach($positions as $under => $positionall)
				<tr>
					<td class="border-top head"></td>
					<td class="border-top head"><h4>{{ $label[$under] }}</h4></td>
					<td class="border-top head"></td>
					<td class="border-top head"></td>
					<td class="border-top head"></td>
					<td class="border-top head"></td>
					<td class="border-top head"></td>
					<td class="border-top head"></td>
					<td class="border-top head"></td>
				</tr>
				@include('report.table.position-special-under')
			@endforeach
		@else
			@include('report.table.position-special-under')
		@endif
	</tbody>
</table>