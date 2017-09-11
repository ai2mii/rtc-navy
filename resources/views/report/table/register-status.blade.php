<table id="workLocationTable" class="table" >
	<caption>{{ 'จำนวนทั้งหมด ' . count($persons) . ' คน' }}</caption>
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th>ยศ</th>
			<th>ชื่อ</th>
			<th>สกุล</th>
			<th>สังกัด</th>
			<th>ตำแหน่งปัจจุบัน</th>
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
				<td>{{ $person->currentPosition }}</td>
			</tr>
		@endforeach
	</tbody>
</table>