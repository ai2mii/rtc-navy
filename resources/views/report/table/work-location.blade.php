<table id="workLocationTable" class="table" >
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th>ยศ</th>
			<th>ชื่อ</th>
			<th>สกุล</th>
		</tr>
	</thead>
	<tbody>
		@foreach($persons as $key => $person)
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $person->rank }}</td>
				<td>{{ $person->name }}</td>
				<td>{{ $person->sname }}</td>
			</tr>
		@endforeach
	</tbody>
</table>