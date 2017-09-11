<table class="table" id="result">

	<caption>{{ 'จำนวนทั้งหมด ' . count($persons) . ' คน' }}</caption>
	<thead>
		<tr>
			<th>ที่</th>
			<th>ยศ</th>
			<th>ชื่อ</th>
			<th>สกุล</th>
			<th>ตำแหน่ง</th>
			@if($type == 'position')
				<th>อัตรา</th>
			@endif
			<th>พรรค / เหล่า</th>
			<th>สายวิทยาการ</th>
		</tr>
	</thead>
	<tbody>
		@foreach($persons as $key => $person)
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $person->rank }}</td>
				<td>{{ $person->name  }}</td>
				<td>{{ $person->sname  }}</td>
				@if($type == 'position')
					<td>{{ $person->positionName  }}</td>
					<td>{{ $person->positionRank  }}</td>
					<td>{{ $person->positionCorps  }}</td>
					<td>{{ $person->positionLine }}</td>
				@else
					<td>{{ $person->currentPosition  }}</td>
					<td>{{ $person->corps  }}</td>
					<td>{{ $person->line  }}</td>
				@endif
			</tr>
		@endforeach
	</tbody>
</table>
