<table id="example" class="table position-special" >
	{{-- <caption>{{ 'จำนวนทั้งหมด ' . ' ตำแหน่ง' }}</caption> --}}
	<thead>
		<tr>
			<th class="text-center">ชั้นยศ</th>
			<th class="text-center">อัตราเต็ม</th>
			<th class="text-center">อัตราที่ปิดบรรจุ</th>
			<th class="text-center">อัตราที่เปิดบรรจุ</th>
			<th class="text-center">บรรจุจริง</th>
			<th class="text-center">ขาดอัตรา</th>
			<th class="text-center">หมายเหตุ</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th class="text-center">น.อ.พิเศษ</th>
			<td class="text-center">{{ isset($count['all']['น.อ.พิเศษ']) ? $count['all']['น.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['น.อ.พิเศษ']) ? $count['closePosition']['น.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['น.อ.พิเศษ']) ? $count['openPosition']['น.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['น.อ.พิเศษ']) ? $count['loadPosition']['น.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['น.อ.พิเศษ']) ? $count['available']['น.อ.พิเศษ'] : '-'  }}</td>
		</tr>
		<tr>
			<th class="text-center">น.อ.</th>
			<td class="text-center">{{ isset($count['all']['น.อ.']) ? $count['all']['น.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['น.อ.']) ? $count['closePosition']['น.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['น.อ.']) ? $count['openPosition']['น.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['น.อ.']) ? $count['loadPosition']['น.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['น.อ.']) ? $count['available']['น.อ.'] : '-'  }}</td>
		</tr>
		<tr>
			<th class="text-center">น.ท.</th>
			<td class="text-center">{{ isset($count['all']['น.ท.']) ? $count['all']['น.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['น.ท.']) ? $count['closePosition']['น.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['น.ท.']) ? $count['openPosition']['น.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['น.ท.']) ? $count['loadPosition']['น.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['น.ท.']) ? $count['available']['น.ท.'] : '-'  }}</td>
		</tr>
		<tr>
			<th class="text-center">น.ต.</th>
			<td class="text-center">{{ isset($count['all']['น.ต.']) ? $count['all']['น.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['น.ต.']) ? $count['closePosition']['น.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['น.ต.']) ? $count['openPosition']['น.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['น.ต.']) ? $count['loadPosition']['น.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['น.ต.']) ? $count['available']['น.ต.'] : '-'  }}</td>
		</tr>
		<tr>
			<th class="text-center">ร.อ.</th>
			<td class="text-center">{{ isset($count['all']['ร.อ.']) ? $count['all']['ร.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['ร.อ.']) ? $count['closePosition']['ร.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['ร.อ.']) ? $count['openPosition']['ร.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['ร.อ.']) ? $count['loadPosition']['ร.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['ร.อ.']) ? $count['available']['ร.อ.'] : '-'  }}</td>
		</tr>
		<tr>
			<th class="text-center">ร.ท.</th>
			<td class="text-center">{{ isset($count['all']['ร.ท.']) ? $count['all']['ร.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['ร.ท.']) ? $count['closePosition']['ร.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['ร.ท.']) ? $count['openPosition']['ร.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['ร.ท.']) ? $count['loadPosition']['ร.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['ร.ท.']) ? $count['available']['ร.ท.'] : '-'  }}</td>
		</tr>
		<tr>
			<th class="text-center">ร.ต.</th>
			<td class="text-center">{{ isset($count['all']['ร.ต.']) ? $count['all']['ร.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['ร.ต.']) ? $count['closePosition']['ร.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['ร.ต.']) ? $count['openPosition']['ร.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['ร.ต.']) ? $count['loadPosition']['ร.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['ร.ต.']) ? $count['available']['ร.ต.'] : '-'  }}</td>
		</tr>
		<tr  style="border-top: 1px solid #ddd; background-color: #ddd;">
			<th class="text-center">รวมนายทหารสัญญาบัตร</th>
			<td class="text-center">{{ $sum['สัญญาบัตร']['all'] }}</td>
			<td class="text-center">{{ $sum['สัญญาบัตร']['closePosition'] }}</td>
			<td class="text-center">{{ $sum['สัญญาบัตร']['openPosition'] }}</td>
			<td class="text-center">{{ $sum['สัญญาบัตร']['loadPosition'] }}</td>
			<td class="text-center">{{ $sum['สัญญาบัตร']['available'] }}</td>
			<td></td>
		</tr>
		<tr style="border-top: 1px solid #ddd;">
			<th class="text-center">พ.จ.อ.พิเศษ</th>
			<td class="text-center">{{ isset($count['all']['พ.จ.อ.พิเศษ']) ? $count['all']['พ.จ.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['พ.จ.อ.พิเศษ']) ? $count['closePosition']['พ.จ.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['พ.จ.อ.พิเศษ']) ? $count['openPosition']['พ.จ.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['พ.จ.อ.พิเศษ']) ? $count['loadPosition']['พ.จ.อ.พิเศษ'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['พ.จ.อ.พิเศษ']) ? $count['available']['พ.จ.อ.พิเศษ'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">พ.จ.อ.</th>
			<td class="text-center">{{ isset($count['all']['พ.จ.อ.']) ? $count['all']['พ.จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['พ.จ.อ.']) ? $count['closePosition']['พ.จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['พ.จ.อ.']) ? $count['openPosition']['พ.จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['พ.จ.อ.']) ? $count['loadPosition']['พ.จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['พ.จ.อ.']) ? $count['available']['พ.จ.อ.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">พ.จ.ท.</th>
			<td class="text-center">{{ isset($count['all']['พ.จ.ท.']) ? $count['all']['พ.จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['พ.จ.ท.']) ? $count['closePosition']['พ.จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['พ.จ.ท.']) ? $count['openPosition']['พ.จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['พ.จ.ท.']) ? $count['loadPosition']['พ.จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['พ.จ.ท.']) ? $count['available']['พ.จ.ท.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">พ.จ.ต.</th>
			<td class="text-center">{{ isset($count['all']['พ.จ.ต.']) ? $count['all']['พ.จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['พ.จ.ต.']) ? $count['closePosition']['พ.จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['พ.จ.ต.']) ? $count['openPosition']['พ.จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['พ.จ.ต.']) ? $count['loadPosition']['พ.จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['พ.จ.ต.']) ? $count['available']['พ.จ.ต.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">จ.อ.</th>
			<td class="text-center">{{ isset($count['all']['จ.อ.']) ? $count['all']['จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['จ.อ.']) ? $count['closePosition']['จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['จ.อ.']) ? $count['openPosition']['จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['จ.อ.']) ? $count['loadPosition']['จ.อ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['จ.อ.']) ? $count['available']['จ.อ.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">จ.ท.</th>
			<td class="text-center">{{ isset($count['all']['จ.ท.']) ? $count['all']['จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['จ.ท.']) ? $count['closePosition']['จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['จ.ท.']) ? $count['openPosition']['จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['จ.ท.']) ? $count['loadPosition']['จ.ท.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['จ.ท.']) ? $count['available']['จ.ท.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">จ.ต.</th>
			<td class="text-center">{{ isset($count['all']['จ.ต.']) ? $count['all']['จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['จ.ต.']) ? $count['closePosition']['จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['จ.ต.']) ? $count['openPosition']['จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['จ.ต.']) ? $count['loadPosition']['จ.ต.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['จ.ต.']) ? $count['available']['จ.ต.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr  style="border-top: 1px solid #ddd; background-color: #ddd;">
			<th class="text-center">รวมนายทหารประทวน</th>
			<td class="text-center">{{ $sum['ประทวน']['all'] }}</td>
			<td class="text-center">{{ $sum['ประทวน']['closePosition'] }}</td>
			<td class="text-center">{{ $sum['ประทวน']['openPosition'] }}</td>
			<td class="text-center">{{ $sum['ประทวน']['loadPosition'] }}</td>
			<td class="text-center">{{ $sum['ประทวน']['available'] }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">ลจ.ปจ.</th>
			<td class="text-center">{{ isset($count['all']['ลจ.ปจ.']) ? $count['all']['ลจ.ปจ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['ลจ.ปจ.']) ? $count['closePosition']['ลจ.ปจ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['ลจ.ปจ.']) ? $count['openPosition']['ลจ.ปจ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['ลจ.ปจ.']) ? $count['loadPosition']['ลจ.ปจ.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['ลจ.ปจ.']) ? $count['available']['ลจ.ปจ.'] : '-'  }}</td>
			<td></td>
		</tr>
		<tr>
			<th class="text-center">พรก.</th>
			<td class="text-center">{{ isset($count['all']['พรก.']) ? $count['all']['พรก.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['closePosition']['พรก.']) ? $count['closePosition']['พรก.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['openPosition']['พรก.']) ? $count['openPosition']['พรก.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['loadPosition']['พรก.']) ? $count['loadPosition']['พรก.'] : '-'  }}</td>
			<td class="text-center">{{ isset($count['available']['พรก.']) ? $count['available']['พรก.'] : '-'  }}</td>
			<td>ยังไม่มีข้อมูลการบรรจุ</td>
		</tr>
		<tr  style="border-top: 1px solid #ddd; background-color: #aaa;">
			<th class="text-center">รวมทั้งหมด</th>
			<td class="text-center">{{ $sum['ประทวน']['all'] + $sum['สัญญาบัตร']['all'] + (isset($count['all']['พรก.']) ? $count['all']['พรก.'] : 0) + (isset($count['all']['ลจ.ปจ.']) ? $count['all']['ลจ.ปจ.'] : 0) }}</td>
			<td class="text-center">{{ $sum['ประทวน']['closePosition'] + $sum['สัญญาบัตร']['closePosition'] + (isset($count['closePosition']['พรก.']) ? $count['closePosition']['พรก.'] : 0) + (isset($count['closePosition']['ลจ.ปจ.']) ? $count['closePosition']['ลจ.ปจ.'] : 0)  }}</td>
			<td class="text-center">{{ $sum['ประทวน']['openPosition'] + $sum['สัญญาบัตร']['openPosition'] + (isset($count['openPosition']['พรก.']) ? $count['openPosition']['พรก.'] : 0) + (isset($count['openPosition']['ลจ.ปจ.']) ? $count['openPosition']['ลจ.ปจ.'] : 0)  }}</td>
			<td class="text-center">{{ $sum['ประทวน']['loadPosition'] + $sum['สัญญาบัตร']['loadPosition'] + (isset($count['loadPosition']['พรก.']) ? $count['loadPosition']['พรก.'] : 0) + (isset($count['loadPosition']['ลจ.ปจ.']) ? $count['loadPosition']['ลจ.ปจ.'] : 0)  }}</td>
			<td class="text-center">{{ $sum['ประทวน']['available'] + $sum['สัญญาบัตร']['available'] + (isset($count['available']['พรก.']) ? $count['available']['พรก.'] : 0) + (isset($count['available']['ลจ.ปจ.']) ? $count['available']['ลจ.ปจ.'] : 0)  }}</td>
			<td></td>
		</tr>
	</tbody>
</table>
