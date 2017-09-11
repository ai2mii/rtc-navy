<table class="table">
			<caption>{{ 'จำนวนทั้งหมด ' . count($persons) . ' ตำแหน่ง' }}</caption>
			<thead>
				<tr>
					<th>ที่</th>
					<th style="{{ $available == 'available' || $available == 'close' ? 'display: none;' : '' }}">ยศ</th>
					<th style="{{ $available == 'available' || $available == 'close' ? 'display: none;' : '' }}">ชื่อ</th>
					<th style="{{ $available == 'available' || $available == 'close' ? 'display: none;' : '' }}">สกุล</th>
					<th>ตำแหน่ง</th>
					<th>อัตรา</th>
					<th>พรรค / เหล่า</th>
					<th>สายวิทยาการ</th>
				</tr>
			</thead>
			<tbody>
				@foreach($persons as $key => $person)
					<tr class="{{ $person->isOpen == 0 ? 'close-position' : '' }}">
						<td>{{ $key + 1 }}</td>
						<td style="{{ $available == 'available' || $available == 'close' ? 'display: none;' : '' }}">{{ $person->rank }}</td>
						<td style="{{ $available == 'available' || $available == 'close' ? 'display: none;' : '' }}">{{ $person->name  }}</td>
						<td style="{{ $available == 'available' || $available == 'close' ? 'display: none;' : '' }}">{{ $person->sname  }}</td>
						<td>{{ $person->positionName  }}</td>
						<td>{{ $person->positionRank  }}</td>
						<td>{{ $person->positionCorps  }}</td>
						<td>{{ $person->positionLine }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>