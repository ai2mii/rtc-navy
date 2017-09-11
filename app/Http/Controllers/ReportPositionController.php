<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Position;
Use App\Classes\Util;
class ReportPositionController extends Controller {

	protected $position;
	public function index(Request $request)
	{
		$positionTable = DB::table('position')
							->where('order', '!=' , 0)
							->get();
		$label = '';

		$under = $request->has('under') && $request->input('under') != 'all' ? $request->input('under') : 'all' ;
		if ($under != 'all') {
			$positions[$under] = $this->getLists($positionTable, $under);
		} else {
			$positions['บก.'] = $this->getLists($positionTable, 'บก.');
			$positions['กนร.'] = $this->getLists($positionTable, 'กนร.');
			$positions['กศษ.'] = $this->getLists($positionTable, 'กศษ.');
			$positions['กบก.'] = $this->getLists($positionTable, 'กบก.');
			$positions['แผนกแพทย์'] = $this->getLists($positionTable, 'แผนกแพทย์');

			$label = [
				'บก.' => 'กองบังคับการ',
				'กนร.' => 'กองนักเรียน',
				'กศษ.' => 'กองการศึกษา',
				'กบก.' => 'กองบริการ',
				'แผนกแพทย์' => 'แผนกแพทย์',
			];
		}

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'positions' => $positions,
				'under' => $under,
				'label'=> $label,
			];

			$util = new Util();
			$util->exportExcel('รายละเอียดการบรรจุกำลังพล ศฝท.ยศ.ทร.', $var, 'report.table.position-special');
		}

		return view('report.position-special')->with('positions', $positions)
											  ->with('under', $under)
											  ->with('label', $label);
	}

	public function showDetail(Request $request)
	{
		$input = $request->all();
		$positionName = $input['name'];
		$positionTable = DB::table('position')
							->leftjoin('person', 'position.code', '=', 'person.positionCode')
							->select('position.*', 'person.rank as personRank', 'person.name as personName', 'person.sname as personSname')
							->where('position.order', $input['order'])
							->where('position.corps', $input['corps'])
							->where('position.rank', $input['rank']);

		if ($input['listsBy'] == 'countClose') {
			$label = 'ตำแหน่งที่ปิดบรรจุ';
			$positionTable = $positionTable->where('isOpen', 0)
										   ->get();
		} elseif ($input['listsBy'] == 'countOpen') {
			$label = 'ตำแหน่งที่เปิดบรรจุ';
			$positionTable = $positionTable->where('isOpen', 1)
										   ->get();
		} elseif ($input['listsBy'] == 'load') {
			$label = 'ตำแหน่งที่บรรจุจริง';
			$positionTable = $positionTable->whereNotNull('person.rank')
										   ->get();
		} elseif ($input['listsBy'] == 'available') {
			$label = 'ตำแหน่งที่ว่าง';
			$positionTable = $positionTable->where('person.rank', null)
										   ->where('isOpen', 1)
										   ->get();
		} else {
			$label = 'ตำแหน่งทั้งหมด';
			$positionTable = $positionTable->get();
		}

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'positions' => $positionTable,
				'positionName' => $positionName,
				'label'=> $label,
			];

			$util = new Util();
			$util->exportExcel('รายละเอียดการบรรจุกำลังพล ศฝท.ยศ.ทร.', $var, 'report.table.position-detail');
		}

		return view('report.position-detail')->with('positions', $positionTable)
											 ->with('label', $label)
											 ->with('positionName', $positionName);

	}

	private function getLists($positionTable, $under)
	{
		ini_set('max_execution_time', 0);
		$positions = [];
		$count = 0;
		foreach ($positionTable as $key => $position) {
			if($position->under == $under) {
				$positionName = substr($position->name, 0, -6);
				if ($under == 'กนร.') {
					$positionName = $this->replaceUnder($position->order, $positionName);
				}

				$isOpen = $position->isOpen == 1 ? 1 : 0;
				$isClose = $position->isOpen == 0 ? 1 : 0;
				$count = isset($positions[$position->order][$positionName][$position->corps][$position->rank]['count']) ?
								   $positions[$position->order][$positionName][$position->corps][$position->rank]['count']+1 : 1;
				$countOpen = isset($positions[$position->order][$positionName][$position->corps][$position->rank]['countOpen']) ?
								   $positions[$position->order][$positionName][$position->corps][$position->rank]['countOpen'] : 0;
				$countClose = isset($positions[$position->order][$positionName][$position->corps][$position->rank]['countClose']) ?
								   $positions[$position->order][$positionName][$position->corps][$position->rank]['countClose'] : 0;
				$load = isset($positions[$position->order][$positionName][$position->corps][$position->rank]['load']) ?
								   $positions[$position->order][$positionName][$position->corps][$position->rank]['load'] +  $this->getLoad($position->code, 1) : $this->getLoad($position->code, 1);
				$available = isset($positions[$position->order][$positionName][$position->corps][$position->rank]['available']) ?
								   $positions[$position->order][$positionName][$position->corps][$position->rank]['available'] +  $this->getLoad($position->code, 0) : $this->getLoad($position->code, 0);

				$positions[$position->order][$positionName][$position->corps][$position->rank] = [
					'order' => $position->order,
					'name' => $positionName,
					'rank' => $position->rank,
					'corps' => $position->corps,
					'count' => $count,
					'countClose' => $countClose + $isClose,
					'countOpen' => $countOpen + $isOpen,
					'load' => $load,
					'available' => $available,
				];
			}
		}

		ksort($positions);

		return $positions;
	}

	private function replaceUnder($order, $name)
	{
		if ($order == 26 || $order == 27) {
			$name = str_replace([
								'นักเรียนที่ ๑',
							 	'นักเรียนที่ ๒',
							 	'นักเรียนที่ ๓',
							 	'นักเรียนที่ ๔',
							 ], '', $name);
		} elseif ($order == 29 || $order == 31 || $order == 32) {
			$name = str_replace([
								'พัน.นักเรียนที่ ๑',
							 	'พัน.นักเรียนที่ ๒',
							 	'พัน.นักเรียนที่ ๓',
							 	'พัน.นักเรียนที่ ๔',
								'นักเรียนที่ ๑ ',
							 	'นักเรียนที่ ๒ ',
							 	'นักเรียนที่ ๓ ',
							 	'นักเรียนที่ ๔ ',
							 ], '', $name);

		}  elseif ($order == 36) {
			$name = str_replace([

								' ร้อย.นักเรียนที่ ๑ ',
							 	' ร้อย.นักเรียนที่ ๒ ',
							 	' ร้อย.นักเรียนที่ ๓ ',
							 	' ร้อย.นักเรียนที่ ๔ ',
							 	'พัน.นักเรียนที่ ๑',
							 	'พัน.นักเรียนที่ ๒',
							 	'พัน.นักเรียนที่ ๓',
							 	'พัน.นักเรียนที่ ๔',
							 ], '', $name);

		}   elseif ($order == 28 || $order == 33 || $order == 34 || $order == 37 || $order == 38) {
			$name = str_replace([
								'ร้อย.นักเรียนที่ ๑',
								'ร้อย.นักเรียนที่ ๒',
								'ร้อย.นักเรียนที่ ๓',
								'ร้อย.นักเรียนที่ ๔',
								' พัน.นักเรียนที่ ๑ ',
							 	' พัน.นักเรียนที่ ๒ ',
							 	' พัน.นักเรียนที่ ๓ ',
							 	' พัน.นักเรียนที่ ๔ ',
							 ], '', $name);

		}
		return $name;
	}

	private function getLoad($positionCode, $isLoad)
	{
		$position = DB::table('position')
							->join('person', 'position.code', '=', 'person.positionCode')
							->where('position.code', $positionCode)
							->first();
		if ($isLoad == 1) {
			$count = $position == null ? 0 : 1;
		} else {
			$isOpen = DB::table('position')
							->where('code', $positionCode)
							->where('isOpen', 1)
							->first();
			$count = $position == null && $isOpen != null ? 1 : 0;
		}

		return $count;
	}

	public function summary(Request $request)
	{
		$count['all'] = $this->getPositionTable()
									   ->groupBy('position.rank')
									   ->get();
		$count['closePosition'] = $this->getPositionTable()->where('isOpen', 0)
									   ->groupBy('position.rank')
									   ->get();
		$count['openPosition'] = $this->getPositionTable()->where('isOpen', 1)
									   ->groupBy('position.rank')
									   ->get();
		$count['loadPosition'] = $this->getPositionTable()->whereNotNull('person.rank')
									   ->groupBy('position.rank')
									   ->get();
		$count['available'] = $this->getPositionTable()->where('person.rank', null)
									   ->where('isOpen', 1)
									   ->groupBy('position.rank')
									   ->get();

		$data = [];
		$sum['สัญญาบัตร']['all'] = 0;
		$sum['สัญญาบัตร']['closePosition'] = 0;
		$sum['สัญญาบัตร']['openPosition'] = 0;
		$sum['สัญญาบัตร']['loadPosition'] = 0;
		$sum['สัญญาบัตร']['available'] = 0;
		$sum['ประทวน']['all'] = 0;
		$sum['ประทวน']['closePosition'] = 0;
		$sum['ประทวน']['openPosition'] = 0;
		$sum['ประทวน']['loadPosition'] = 0;
		$sum['ประทวน']['available'] = 0;
		foreach ($count as $key => $cate) {
			foreach ($cate as $key2 => $rank) {
				$data[$key][$rank->rank] = $rank->count;
				if ($rank->rank == 'น.อ.พิเศษ' || $rank->rank == 'น.อ.' || $rank->rank == 'น.ท.' || $rank->rank == 'น.ต.' || $rank->rank == 'ร.อ.' || $rank->rank == 'ร.ท.' || $rank->rank == 'ร.ต.') {
					$sum['สัญญาบัตร'][$key] = $sum['สัญญาบัตร'][$key] + $rank->count;
				} elseif ($rank->rank == 'พ.จ.อ.พิเศษ' || $rank->rank == 'พ.จ.อ.' || $rank->rank == 'พ.จ.ท.' || $rank->rank == 'พ.จ.ต.' || $rank->rank == 'จ.อ.' || $rank->rank == 'จ.ท.' || $rank->rank == 'จ.ต.' ) {
					$sum['ประทวน'][$key] = $sum['ประทวน'][$key] + $rank->count;
				}
			}
		}
		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'count' => $data,
				'sum' => $sum,
			];

			$util = new Util();
			$util->exportExcel('สรุปยอดบัญชีกำลังพล ศฝท.ยศ.ทร.', $var, 'report.table.position-summary');
		}
		// dd($data);

		return view('report.position-summary')->with('count', $data)
											  ->with('sum', $sum);
	}

	private function getPositionTable()
	{
		$positionTable = DB::table('position')
							->leftjoin('person', 'position.code', '=', 'person.positionCode')
							->select('position.rank', 'person.rank as personRank', DB::raw('COUNT(position.rank) as count') );
							// ->where('order', '!=', 0);
		return $positionTable;
	}


}
