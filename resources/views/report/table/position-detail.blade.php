<table class="table">
	<caption>{{ 'จำนวนทั้งหมด ' . count($positions) .  ' ตำแหน่ง' }}</caption>
	<thead>
		<tr>
			<th class="text-center">ที่</th>
			<th class="text-center">ลำดับ อฉก.</th>
			@if($label == 'ตำแหน่งทั้งหมด' || $label == 'ตำแหน่งที่เปิดบรรจุ' || $label == 'ตำแหน่งที่บรรจุจริง')
				<th>ยศ</th>
				<th>ชื่อ</th>
				<th>สกุล</th>
			@endif
			<th class="text-center">พรรค / เหล่า</th>
			<th class="text-center">ชั้นยศ</th>
			<th class="text-center">ตำแหน่ง</th>
		</tr>
	</thead>
	<tbody>
		@foreach($positions as $key => $position)
			<tr class="{{ $position->isOpen == 0 && $label == 'ตำแหน่งทั้งหมด' ? 'close-position' : '' }}">
				<td class="text-center">{{ $key  + 1  }}</td>
				<td class="text-center">{{ $position->order }}</td>
				@if($label == 'ตำแหน่งทั้งหมด' || $label == 'ตำแหน่งที่เปิดบรรจุ' || $label == 'ตำแหน่งที่บรรจุจริง')
					<td>{{ $position->personRank }}</td>
					<td>{{ $position->personName }}</td>
					<td>{{ $position->personSname }}</td>
				@endif
				<td class="text-center">{{ $position->corps }}</td>
				<td class="text-center">{{ $position->rank }}</td>
				<td>{{ substr($position->name, 0, -6)}}</td>
			</tr>
		@endforeach
	</tbody>
</table>