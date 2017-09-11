<table class="table">
	<caption>{{ 'จำนวนทั้งหมด ' . count($registrationBook) . ' คน' }}</caption>
	<thead>
		<tr>
			<th>ที่</th>
			<th>ยศ</th>
			<th>ชื่อ</th>
			<th>สกุล</th>
			<th>เลขที่</th>
			<th>หมู่</th>
			<th>ตำบล</th>
			<th>อำเภอ</th>
			<th>จังหวัด</th>
			<th>ประเภท</th>
		</tr>
	</thead>
	<tbody>
		@foreach($registrationBook as $key => $book)
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $book->rank }}</td>
				<td>{{ $book->name }}</td>
				<td>{{ $book->sname }}</td>
				<td>{{ $book->addressNo }}</td>
				<td>{{ $book->moo }}</td>
				<td>{{ $book->tambonName }}</td>
				<td>{{ $book->aumphoeName }}</td>
				<td>{{ $book->provinceName }}</td>
				<td>{{ $book->type }}</td>
			</tr>
		@endforeach
	</tbody>
</table>