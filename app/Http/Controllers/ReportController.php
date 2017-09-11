<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Person;
Use App\Classes\Util;

class ReportController extends Controller {

	public function person(Request $request)
	{
		$cate = '';
		$searchBy = '';
		$label = '';
		$type = 'position';
		$labels = [
			'rank'  => 'ยศ',
			'corps' => 'พรรค/เหล่า',
			'line'  => 'สายวิทยาการ',
			'position' => 'ตำแหน่ง',
			'under' => 'กอง',
		];

		if ($request->has('cate') && $request->has('search_by')) {
			$cate     = $request->input('cate');
			$searchBy = $request->input('search_by');
			$label    = $labels[$cate];

			$persons = DB::table('person')
							->leftjoin('position', 'position.code', '=', 'person.positionCode')
							->select('person.*', 'position.name as positionName', 'position.rank as positionRank', 'position.corps as positionCorps', 'position.line as positionLine', 'position.under as positionUnder');

			if ($cate == 'rank' || $cate == 'corps' || $cate == 'line') {
				if ($searchBy == 'ไม่ระบุ') {
					$persons = $persons->where('position.' . $cate , null)
									   ->orwhere('position.' . $cate , '-');
				} else {
					$persons = $persons->where('position.' . $cate , $searchBy);
				}
			} elseif ($cate == 'position') {
				if ($searchBy == 'ไม่ระบุ') {
					$persons = $persons->where('position.name', null);
				} else {
					$persons = $persons->where('position.name', $searchBy);
				}
			} elseif ($cate == 'under') {
				if ($searchBy == 'ไม่ระบุ') {
					$persons = $persons->where('position.under', null);
				} else {
					$persons = $persons->where('position.under', $searchBy);
				}
			}
			$persons = $persons->get();

		} else {
			$persons = DB::table('person')
							->leftjoin('position', 'position.code', '=', 'person.positionCode')
							->select('person.*', 'position.name as positionName', 'position.rank as positionRank', 'position.corps as positionCorps', 'position.line as positionLine')
							->get();
		}

		$rank 	= $this->getDataRank();
		$corps 	= $this->getDataCorps();
		$line 	= $this->getDataLine();
		$position = $this->getDataPosition();
		$under  = $this->getDataUnder();

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'persons' => $persons,
				'type' => $type,
			];

			$util = new Util();
			$util->exportExcel('รายชื่อตามโครงสร้าง', $var, 'report.table.person');
		}

		return view('report.person')->with('persons', $persons)
									->with('cate', $cate)
									->with('searchBy', $searchBy)
									->with('label', $label)
									->with('rank', $rank)
									->with('corps', $corps)
									->with('line', $line)
									->with('position', $position)
									->with('under', $under)
									->with('type', $type);
	}

	public function person2(Request $request)
	{
		$cate = '';
		$searchBy = '';
		$label = '';
		$type = 'position2';
		$labels = [
			'rank'  => 'ยศ',
			'corps' => 'พรรค/เหล่า',
			'line'  => 'สายวิทยาการ',
			'start' => 'กำเนิด',
			'retiredYears' => 'ปีเกษียณ',
			'position' => 'ตำแหน่ง',
			'under' => 'กอง',
			'education'=> 'วุฒิการศึกษา',
			'insignia' => 'เครื่องราช',
			'religion' => 'ศาสนา',
		];

		if ($request->has('cate') && $request->has('search_by')) {
			$cate = $request->input('cate');
			$searchBy = $request->input('search_by');
			$label = $labels[$cate];

			$persons = DB::table('person');

			if ($cate == 'rank' || $cate == 'corps' || $cate == 'line' || $cate == 'start' || $cate == 'retiredYears' || $cate == 'education' || $cate == 'insignia' || $cate == 'religion' || $cate == 'under') {
				if ($searchBy == 'ไม่ระบุ') {
					$persons = $persons->where($cate, '');
				} else {
					$persons = $persons->where($cate , $searchBy);
				}
			} elseif ($cate == 'position') {
				if ($searchBy == 'ไม่ระบุ') {
					$persons = $persons->where('currentPosition', null);
				} else {
					$persons = $persons->where('currentPosition', $searchBy);
				}
			}
			$persons = $persons->get();

		} else {
			$persons = DB::table('person')
							->get();
		}

		$rank 	= $this->getDataRank('person');
		$corps 	= $this->getDataCorps('person');
		$line 	= $this->getDataLine('person');

		$start  = $this->getDataStart();
		$retiredYears = $this->getDataRetiredYears();
		$position  = $this->getDataPosition('person');
		$under     = $this->getDataUnder('person');
		$education = $this->getDataEducation();
		$insignia  = $this->getDataInsignia();
		$religion  = $this->getDataReligion();

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'persons' => $persons,
				'type' => $type,
			];
			$util = new Util();
			$util->exportExcel('รายชื่อตามบรรจุ', $var, 'report.table.person');
		}

		return view('report.person')->with('persons', $persons)
									->with('cate', $cate)
									->with('searchBy', $searchBy)
									->with('label', $label)
									->with('rank', $rank)
									->with('corps', $corps)
									->with('line', $line)
									->with('start', $start)
									->with('retiredYears', $retiredYears)
									->with('position', $position)
									->with('education', $education)
									->with('insignia', $insignia)
									->with('religion', $religion)
									->with('under', $under)
									->with('type', $type);
	}

	public function position(Request $request)
	{
		$isAvailable = $request->input('available') ? $request->input('available') : 'all';

		if ($isAvailable == 'all') {
			$persons = DB::table('position')
							->leftjoin('person', 'position.code', '=', 'person.positionCode')
							->select('person.*', 'position.name as positionName', 'position.rank as positionRank', 'position.corps as positionCorps', 'position.line as positionLine', 'isOpen')
							->orderBy('position.runningNumber')
							->get();
		} elseif($isAvailable == 'available') {
			$persons = DB::table('position')
							->leftjoin('person', 'position.code', '=', 'person.positionCode')
							->select('person.*', 'position.name as positionName', 'position.rank as positionRank', 'position.corps as positionCorps', 'position.line as positionLine', 'isOpen')
							->where('person.name', null)
							->where('isOpen', 1)
							->get();
		} elseif($isAvailable == 'close') {
			$persons = DB::table('position')
							->leftjoin('person', 'position.code', '=', 'person.positionCode')
							->select('person.*', 'position.name as positionName', 'position.rank as positionRank', 'position.corps as positionCorps', 'position.line as positionLine', 'isOpen')
							->where('person.name', null)
							->where('isOpen', 0)
							->get();
		} else {
			$persons = DB::table('person')
		 					->join('position', 'person.positionCode', '=', 'position.code')
		 					->select('person.*', 'position.name as positionName', 'position.rank as positionRank', 'position.corps as positionCorps', 'position.line as positionLine', 'isOpen')
		 					->get();
		}

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'persons' => $persons,
				'available' => $isAvailable,
			];
			$util = new Util();
			$util->exportExcel('ตำแหน่งตามโครงสร้าง', $var, 'report.table.position');
		}

		return view('report.position')->with('persons', $persons)
									  ->with('available', $isAvailable);
	}

	public function workLocation(Request $request)
	{
		$persons = [];
		if ($request->has('worklocation')) {
			$persons = $this->getPersonLocation($request->input('worklocation'));
		}

		$workLocation = DB::table('worklocation')
						->orderBy('name')
						->get();
		foreach ($workLocation as $key => $location) {
			if ($location->code == 'L048') {
				unset($workLocation[$key]);
			}
		}

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'persons' => $persons,
			];
			$util = new Util();
			$util->exportExcel('สถานที่ปฎิบัติราชการ', $var, 'report.table.work-location');
		}

		return view('report.work-location')->with('workLocation', $workLocation)
										   ->with('persons', $persons)
										   ->with('worklocation', $request->input('worklocation'));
	}

	public function registerStatus(Request $request)
	{
		$searchStatus = $request->status;
		$persons = DB::table('person');
		if ($request->has('status')) {
			$persons = $persons->where('registerType', $searchStatus);
		}

		$persons = $persons->get();
		$registerStatus = $this->getListsRegisterStatus();

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'persons' => $persons,
			];
			$util = new Util();
			$util->exportExcel('สถานะการบรรจุ', $var, 'report.table.register-status');
		}

		return view('report.register-status')->with('registerStatus', $registerStatus)
											 ->with('persons', $persons)
											 ->with('searchStatus', $searchStatus);
	}

	private function getListsRegisterStatus()
	{
		$persons = DB::table('person')
						->get();
		$registerStatus = [];
		foreach ($persons as $person) {
			array_push($registerStatus, $person->registerType);
		}
		$registerStatus = array_flatten(array_unique($registerStatus));
		$registerStatus = array_filter($registerStatus);
		return $registerStatus;
	}

	private function getPersonLocation($workLocation)
	{
		$persons = DB::table('person')
						->where('workLocationCode', $workLocation)
						->get();
		return $persons;
	}

	private function getDataRank($table = 'position')
	{
		$positions = DB::table($table)
						->get();
		$rank = [];
		foreach ($positions as $position) {
			array_push($rank, $position->rank);
		}
		$rank = array_flatten(array_unique($rank));
		$rank = array_filter($rank);
		return $rank;
	}

	private function getDataCorps($table = 'position')
	{
		$positions = DB::table($table)
						->get();
		$corps = [];
		foreach ($positions as $position) {
			array_push($corps, $position->corps);
		}
		$corps = array_flatten(array_unique($corps));
		$corps = array_filter($corps);
		return $corps;
	}

	private function getDataLine($table = 'position')
	{
		$positions = DB::table($table)
						->get();
		$line = [];
		foreach ($positions as $position) {
			array_push($line, $position->line);
		}
		$line = array_unique($line);
		$line = array_where($line, function ($value, $key) {
			if ($value == '-') {
				return array_pull($line, $key);
			}
		    return 1;
		});
		$line = array_flatten($line);
		return $line;
	}

	private function getDataPosition($table = 'position')
	{
		$key = $table == 'position' ? 'name' : 'currentPosition';
		$persons = DB::table($table)
						->get();
		$position = [];
		foreach ($persons as $person) {
			array_push($position, $person->{$key});
		}
		$position = array_flatten(array_unique($position));
		$position = array_filter($position);
		return $position;
	}

	private function getDataUnder($table = 'position')
	{
		$persons = DB::table($table)
						->get();
		$under = [];
		foreach ($persons as $person) {
			array_push($under, $person->under);
		}
		$under = array_flatten(array_unique($under));
		$under = array_filter($under);
		return $under;
	}

	private function getDataStart()
	{
		$persons = DB::table('person')
						->get();
		$start = [];
		foreach ($persons as $person) {
			array_push($start, $person->start);
		}
		$start = array_flatten(array_unique($start));
		$start = array_filter($start);
		return $start;
	}

	private function getDataRetiredYears()
	{
		$persons = DB::table('person')
						->orderBy('retiredYears')
						->get();
		$retiredYears = [];
		foreach ($persons as $person) {
			array_push($retiredYears, $person->retiredYears);
		}
		$retiredYears = array_flatten(array_unique($retiredYears));
		$retiredYears = array_filter($retiredYears);
		return $retiredYears;
	}

	private function getDataEducation()
	{
		$persons = DB::table('person')
						->get();
		$education = [];
		foreach ($persons as $person) {
			array_push($education, $person->education);
		}
		$education = array_flatten(array_unique($education));
		$education = array_filter($education);
		return $education;
	}

	private function getDataInsignia()
	{
		$persons = DB::table('person')
						->get();
		$insignia = [];
		foreach ($persons as $person) {
			array_push($insignia, $person->insignia);
		}
		$insignia = array_flatten(array_unique($insignia));
		$insignia = array_filter($insignia);
		return $insignia;
	}

	private function getDataReligion()
	{
		$persons = DB::table('person')
						->get();
		$religion = [];
		foreach ($persons as $person) {
			array_push($religion, $person->religion);
		}
		$religion = array_flatten(array_unique($religion));
		$religion = array_filter($religion);
		return $religion;
	}
}
