<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Person;
Use Excel;
Use DateTime;

class ImportController extends Controller {

	public function index()
	{
		return view('import.main');
	}

	public function import(Request $request)
	{
		$file = $request->file('file');
		$data = Excel::selectSheetsByIndex(0)->load($file)->get()->toArray();

		$newData = [];
		foreach ($data as $key => $value) {
			$newData[$key]['rank']  = $this->getRank($value[1]);
			$newData[$key]['fullName'] = $this->getName($value[1]);
			$newData[$key]['id']    = $value[2];
			$newData[$key]['id13']  = $value[3];
			$newData[$key]['corps'] = $value[4];
			$newData[$key]['start'] = $value[5];
			$newData[$key]['level'] = $value[6];
			$newData[$key]['salary']    = $this->convertTextToInt($value[7]);
			$newData[$key]['withdraw']  = $value[8];
			$newData[$key]['birthdate'] =  $this->changeTypeDate($value[9]);
			$newData[$key]['militaryServiceDate'] =  $this->changeTypeDate($value[10]);
			$newData[$key]['getRankDate']  =  $this->changeTypeDate($value[11]);
			$newData[$key]['retiredYears'] = $value[12] ? (int)('25' . $value[12]) : 0;
			$newData[$key]['emoluments']   =  $value[13];
			$newData[$key]['takePositionDate'] =  $this->changeTypeDate($value[14]);
			$newData[$key]['currentPosition']  =  $value[15];
			$newData[$key]['positionCode12']   =  $value[18];
			$newData[$key]['afaps']     =  $value[19];
			$newData[$key]['education'] =  $value[20];
			$newData[$key]['militaryEducation'] =  $value[21];
			$newData[$key]['cgsc']      =  $value[22];
			$newData[$key]['insignia']  =  $value[23];
			$newData[$key]['beforeRankDate'] =  $this->changeTypeDate($value[24]);
			$newData[$key]['assessmentAvg']  =  (float)$value[25];
			$newData[$key]['religion']  =  $value[26];
		}

		$persons = $this->getPersons();
		$persons = $this->arrangPersons($persons);

		$resultCompare = $this->compareArray($persons, $newData);
		$persons = $this->arrayForView($resultCompare);

		return view('import.main')->with('action', 'result')
								  ->with('persons', $persons);
	}

	public function view(Request $request)
	{
		// dd($request->all());
		$persons = $request->all();
		return view('import.detail')->with('persons', $persons);

	}

	private function arrayForView($resultCompare)
	{
		$persons = [];
		// new data HR
		foreach ($resultCompare['arrayFromHr'] as $key => $arrayFromHr) {
			if (!isset($arrayFromHr['isDifferent'])) {
				$arrayFromHr['remark'] = 'new';
				array_push($persons , $arrayFromHr);
			}
		}

		// duplicate data different || not different
		foreach ($resultCompare['arrayFromTable'] as $key => $arrayFromTable) {
			if (isset($arrayFromTable['isDifferent']) ) {
				$arrayFromTable['remark'] = 'duplicate';
				array_push($persons , $arrayFromTable);
			}
		}

		// old data
		foreach ($resultCompare['arrayFromTable'] as $key => $arrayFromTable) {
			if (!isset($arrayFromTable['isDifferent'])) {
				$arrayFromTable['remark'] = 'old';
				array_push($persons , $arrayFromTable);
			}
		}
		// dd($persons);
		// dd($resultCompare);

		return $persons;

	}

	private function compareArray($array1, $array2)
	{
		$different = [];
		foreach ($array1 as $key => $value) {
			$name1 = array_pull($value , 'fullName');
			foreach ($array2 as $key2 => $value2) {
				if($value['id'] == $value2['id']) {
					$different[$value['id']] = [];
					$result = array_diff($value, $value2);
					if ($result) {
						foreach ($result as $key3 => $value3) {
							array_push($different[$value['id']], $key3);
						}
						$array1[$key]['isDifferent'] = 1;
						$array2[$key2]['isDifferent'] = 1;
					} else {
						$different[$value['id']] = null;
						$array1[$key]['isDifferent'] = 0;
						$array2[$key2]['isDifferent'] = 0;
					}
					break;
				}
			}
		}

		$result = [
			'different' => $different,
			'arrayFromTable' => $array1,
			'arrayFromHr' => $array2,
		];

		return $result;
	}

	private function getRank($name)
	{
		$rank = substr($name, 0, strrpos( $name, '.')) . '.';
		return $rank;
	}

	private function getName($name)
	{
		$rank = substr($name, 0, strrpos( $name, '.')) . '.';
		$name = str_replace($rank, '', $name);
		return $name;
	}

	private function convertTextToInt($text)
	{
		return (int)str_replace(',', '', $text);
	}

	private function changeTypeDate($oldDate)
	{
		$textMonth = [
			'ม.ค.' => 1,
			'ก.พ.' => 2,
			'มี.ค.' => 3,
			'เม.ย.' => 4,
			'พ.ค.' => 5,
			'มิ.ย.' => 6,
			'ก.ค.' => 7,
			'ส.ค.' => 8,
			'ก.ย.' => 9,
			'ต.ค.' => 10,
			'พ.ย.' => 11,
			'ธ.ค.' => 12,
		];

		$splitDate = explode(' ', $oldDate);
		$day = $splitDate[0];
		$month = substr($splitDate[1], 0, strrpos( $splitDate[1], '.')) . '.';
		$year = '25' . str_replace($month, '', $splitDate[1]);
		$year = (int)$year - 543;

		$date = new DateTime();
		$date->setDate($year, $textMonth[$month], $day);
		$newDate = $date->format('Y-m-d');

		return $newDate;
	}

	private function arrangPersons($persons)
	{
		$arrayPersons = [];
		foreach ($persons as $key => $person) {
			$arrayPersons[$key]['rank'] = $person->rank;
			$arrayPersons[$key]['fullName'] = $person->name . '  ' . $person->sname;
			$arrayPersons[$key]['id']   = $person->id;
			$arrayPersons[$key]['id13'] = $person->id13;
			$arrayPersons[$key]['corps']    = $person->corps;
			$arrayPersons[$key]['start']    = $person->start;
			$arrayPersons[$key]['level']    = $person->level;
			$arrayPersons[$key]['salary']   = $person->salary;
			$arrayPersons[$key]['withdraw'] = $person->withdraw;
			$arrayPersons[$key]['birthdate'] = $person->birthdate;
			$arrayPersons[$key]['militaryServiceDate'] = $person->militaryServiceDate;
			$arrayPersons[$key]['getRankDate'] = $person->getRankDate;
			$arrayPersons[$key]['retiredYears'] = $person->retiredYears;
			$arrayPersons[$key]['emoluments'] = $person->emoluments;
			$arrayPersons[$key]['takePositionDate'] = $person->takePositionDate;
			$arrayPersons[$key]['currentPosition'] = $person->currentPosition;
			$arrayPersons[$key]['positionCode12'] = $person->positionCode12;
			$arrayPersons[$key]['afaps'] = $person->afaps;
			$arrayPersons[$key]['education']  = $person->education;
			$arrayPersons[$key]['militaryEducation'] = $person->militaryEducation;
			$arrayPersons[$key]['cgsc'] = $person->cgsc;
			$arrayPersons[$key]['insignia'] = $person->insignia;
			$arrayPersons[$key]['beforeRankDate'] = $person->beforeRankDate;
			$arrayPersons[$key]['assessmentAvg'] = $person->assessmentAvg;
			$arrayPersons[$key]['religion'] = $person->religion;
		}

		return $arrayPersons;

	}


	private function getPersons()
	{
		$persons = DB::table('person')
		 				->get();

		return $persons;

	}
}
