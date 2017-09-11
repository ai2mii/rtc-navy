<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Person;
Use App\RegistrationBook;
Use App\RegistrationBook_old;
Use App\RegistrationBook2;
Use App\RegistrationBook2_old;
Use App\Classes\Util;
Use DateTime;

class HouseRegistrationController extends Controller {

	public function add()
	{
		$rank = $this->getDataRank();
		return view('houseRegistration.add')->with('rank', $rank);
	}

	public function searchForAdd(Request $request)
	{
		$rank = $this->getDataRank();

		$persons = $this->search($request->rank, $request->name, $request->sname);
		$urlParam = [
			'rank' => $request->rank,
			'name' => $request->name,
			'sname' => $request->sname,
		];
		return view('houseRegistration.add')->with('rank', $rank)
											->with('isSearch', true)
											->with('persons', $persons)
											->with('urlParam', $urlParam);
	}

	public function edit(Request $request)
	{
		$person = $this->getPerson($request->id);

		$addressCode['province']  = $person->provinceCode ? $person->provinceCode : '00'; //09
		$addressCode['aumphoe']   = $person->aumphoeCode ? $person->aumphoeCode : '0000'; //0904
		$addressCode['tambon']   = $person->tambonCode ? $person->tambonCode : '000000';  //090403
		$provinceLists = $this->getAddressLists('province');
		$aumphoeLists  = $this->getAddressLists('aumphoe', $addressCode['province']);
		$tambonLists   = $this->getAddressLists('tambon', $addressCode['aumphoe'] );

		$isSave = $request->issave ? 1 : 0;

		return view('houseRegistration.edit')->with('person', $person)
											 ->with('province', $provinceLists)
											 ->with('aumphoe', $aumphoeLists)
											 ->with('tambon', $tambonLists)
											 ->with('addressCode', $addressCode)
											 ->with('isSave', $isSave);
	}

	public function move(Request $request)
	{
		$person = $this->getPerson($request->id);

		$addressCode['province']  = $person->provinceCode ? $person->provinceCode : '00'; //09
		$addressCode['aumphoe']   = $person->aumphoeCode ? $person->aumphoeCode : '0000'; //0904
		$addressCode['tambon']   = $person->tambonCode ? $person->tambonCode : '000000';  //090403
		$provinceLists = $this->getAddressLists('province');
		$aumphoeLists  = $this->getAddressLists('aumphoe', $addressCode['province']);
		$tambonLists   = $this->getAddressLists('tambon', $addressCode['aumphoe'] );

		$isSave = $request->issave ? 1 : 0;

		$action = $request->action;
		return view('houseRegistration.move')->with('person', $person)
											 ->with('province', $provinceLists)
											 ->with('aumphoe', $aumphoeLists)
											 ->with('tambon', $tambonLists)
											 ->with('addressCode', $addressCode)
											 ->with('isSave', $isSave)
											 ->with('action', $action);
	}

	public function save(Request $request)
	{
		$allType = [
			'type1' => 'บ้านพัก ศฝท.',
			'type2' => 'บ้านพัก ทร. ส่วนกลาง',
			'type3' => 'บ้านพักหน่วยราชการอื่น',
			'type4' => 'บ้านพักส่วนตัว',
		];

		if ($request->has('action') && $request->input('action') == 'moveIn') {
			$registrationBook2 = DB::table('registrationBook2')
							->where('id13', $request->input('id13'))
							->first();

			$registrationBook2_old = RegistrationBook2_old::firstOrNew(['id13' => $registrationBook2->id13]);
			$registrationBook2_old->id13 	= $registrationBook2->id13;
			$registrationBook2_old->rank 	= $registrationBook2->rank;
			$registrationBook2_old->name 	= $registrationBook2->name;
			$registrationBook2_old->sname 	= $registrationBook2->sname;
			$registrationBook2_old->type 	= $registrationBook2->type;
			$registrationBook2_old->otherHouse 	 = $registrationBook2->otherHouse;
			$registrationBook2_old->addressNo 	 = $registrationBook2->addressNo;
			$registrationBook2_old->moo 		 = $registrationBook2->moo;
			$registrationBook2_old->tambonCode 	 = $registrationBook2->tambonCode;
			$registrationBook2_old->tambonName 	 = $registrationBook2->tambonName;
			$registrationBook2_old->aumphoeCode  = $registrationBook2->aumphoeCode;
			$registrationBook2_old->aumphoeName  = $registrationBook2->aumphoeName;
			$registrationBook2_old->provinceCode = $registrationBook2->provinceCode;
			$registrationBook2_old->provinceName = $registrationBook2->provinceName;
			$registrationBook2_old->numberAll 	 = $registrationBook2->numberAll;
			$registrationBook2_old->numberAllRtc = $registrationBook2->numberAllRtc;
			$registrationBook2_old->numberOver17 = $registrationBook2->numberOver17;

			$registrationBook2_old->save();
		}

		$type = $request->input('optionsRadios');
		if ($type == null) {
			dd('ยังไม่เลือกประเภทบ้านพัก');
		} else {
				$inputTambon = $request->input('tambon');
				$inputAumphoe = $request->input('aumphoe');
				$inputProvince = $request->input('province');

				$navdb = DB::connection('mysql2');
				$townName = $navdb->table('townName');
				$province = !empty($inputProvince) ? $townName->where('TOWNCODE', 'LIKE', $inputProvince . '%')->first() : '';
				$aumphoe  = $townName->where('TOWNCODE', 'LIKE', $inputAumphoe . '%')->first();
				$tambon   = $townName->where('TOWNCODE', $inputTambon)->first();

				$registration = RegistrationBook2::firstOrNew(['id13' => $request->input('id13')]);
				$registration->id13  = $request->input('id13');
				$registration->rank  = $request->input('rank');
	  			$registration->name  = $request->input('name');
	  			$registration->sname = $request->input('sname');
	  			$registration->type  = $allType[$type];
	  			$registration->otherHouse = $request->input('otherHouse');
	  			$registration->addressNo = $request->input('number');
	  			$registration->moo = $request->input('moo');
	  			$registration->tambonCode = $inputTambon != 'เลือกตำบล' ? $inputTambon : '';
	  			$registration->tambonName = $inputTambon != 'เลือกตำบล' ? $tambon->TOWNNAME : '';
	  			$registration->aumphoeCode = $inputAumphoe != 'เลือกอำเภอ' ? $inputAumphoe : '';
	  			$registration->aumphoeName = $inputAumphoe != 'เลือกอำเภอ' ? $aumphoe->TOWNNAME : '';
	  			$registration->provinceCode = $inputProvince != 'เลือกจังหวัด' ? $inputProvince : '';
	  			$registration->provinceName = $inputProvince != 'เลือกจังหวัด' ? $province->TOWNNAME : '';
	  			if ($allType[$type] == 'บ้านพัก ศฝท.') {
	  				$registration->numberAllRtc = $request->input('numberAll');
	  				$registration->numberAll = 0;
	  				$registration->numberOver17 = $request->input('numberOver17');
	  			} else {
	  				$registration->numberAll = $request->input('numberAll');
	  				if ($request->input('hasMemberRtc')) {
						$numberAllRtc = $request->input('numberAllRtc');
						$numberOver17Rtc = $request->input('numberOver17Rtc');
	  				} else {
	  					$numberAllRtc = null;
	  					$numberOver17Rtc = 0;
	  				}
	  				$registration->numberAllRtc = $numberAllRtc;
		  			$registration->numberOver17 = $numberOver17Rtc;
	  			}

	  			$registration->save();
		}
		if ($request->has('action') && $request->input('action') == 'moveIn') {
			return redirect('/house-registration/move?id=' . $request->input('id') . '&issave=1&action=moveIn');
		}
		return redirect('/house-registration/edit?id=' . $request->input('id') . '&issave=1');
	}

	private function getAddressLists($type, $code = '')
	{
		$navdb = DB::connection('mysql2');
		$townName = $navdb->table('townName')->get();

		if ($type == 'province') {
			$province = [];
			foreach ($townName as $key => $value) {
				$addr = str_split($value->TOWNCODE, 2);

				if($addr[1] == '00' && $addr[2] == '00') {
					$province[$addr[0]] = $value->TOWNNAME;
				}
			}
			$lists = $province;

		} elseif ($type == 'aumphoe') {
			$aumphoe = [];
			foreach ($townName as $key => $value) {
				$addr = str_split($value->TOWNCODE, 2);

				if($addr[0] == $code && $addr[1] != '00' && $addr[2] == '00') {
					$aumphoe[$addr[0] . $addr[1]] = $value->TOWNNAME;
				}
			}
			$lists = $aumphoe;

		} elseif ($type == 'tambon') {
			$tambon = [];
			foreach ($townName as $key => $value) {
				$addr = str_split($value->TOWNCODE, 2);

				if($addr[0] . $addr[1] == $code && $addr[2] != '00') {
					$tambon[$value->TOWNCODE] = $value->TOWNNAME;
				}
			}
			$lists = $tambon;
		}

		asort($lists);
		return $lists;
	}

	public function getAumphoe(Request $request)
	{
		$provinceCode = $request->provinceCode;
		$aumphoe = $this->getAddressLists('aumphoe', $provinceCode);
		return $aumphoe;
	}

	public function getTambon(Request $request)
	{
		$aumphoeCode = $request->aumphoeCode;

		$navdb = DB::connection('mysql2');
		$townName = $navdb->table('townName')->get();

		$tambon = [];
		foreach ($townName as $key => $value) {
			$addr = str_split($value->TOWNCODE, 2);

			if($addr[0] . $addr[1] == $aumphoeCode && $addr[2] != '00') {
				$tambon[$value->TOWNCODE] = $value->TOWNNAME;
			}
		}

		return $tambon;
	}

	public function getAddress(Request $request)
	{
		$addressCode = $request->addressCode;
		$code = str_split($addressCode, 2);

		$provinceLists = $this->getAddressLists('province');
		$aumphoeLists = $this->getAddressLists('aumphoe', $code[0]);
		$tambonLists = $this->getAddressLists('tambon', $code[0] . $code[1]);

		$addressLists = [
			'provinceLists' => $provinceLists,
			'aumphoeLists'  => $aumphoeLists,
			'tambonLists'   => $tambonLists,
		];
		return $addressLists;
	}

	private function getPerson($id)
	{
		$person = DB::table('person')
						->leftJoin('RegistrationBook2', 'person.id13', '=', 'RegistrationBook2.id13')
						->select('person.*',
								'registrationbook2.type',
								'registrationbook2.otherHouse',
								'registrationbook2.otherHouse',
								'registrationbook2.addressNo',
								'registrationbook2.moo',
								'registrationbook2.tambonCode',
								'registrationbook2.tambonName',
								'registrationbook2.aumphoeCode',
								'registrationbook2.aumphoeName',
								'registrationbook2.provinceCode',
								'registrationbook2.provinceName',
								'registrationbook2.numberAll',
								'registrationbook2.numberOver17',
								'registrationbook2.numberAllRtc'
								)
		 				->where('id', $id)
		 				->first();
		$person->numberAll = $person->type == 'บ้านพัก ศฝท.' ? $person->numberAllRtc : $person->numberAll;

		 return $person;

	}

	private function search($rank, $name, $sname)
	{
		$person = DB::table('person')
		 				->where('rank', 'like', $rank . '%')
		 				->where('name', 'like', $name . '%')
		 				->where('sname', 'like', $sname . '%')
		 				->get();

		 return $person;

	}

	private function getDataRank($table = 'person')
	{
		$persons = DB::table($table)
						->get();
		$rank = [];
		foreach ($persons as $person) {
			array_push($rank, $person->rank);
		}
		$rank = array_flatten(array_unique($rank));
		$rank = array_filter($rank);
		return $rank;
	}

	public function searchBy(Request $request)
	{
		$RegistrationBook2 = '';
		$sumAge = 0;
		if ($request->has('searchBy')) {
			$searchBy = $request->input('searchBy');
			$RegistrationBook2 = DB::table('RegistrationBook2');

			if ($searchBy == 'name') {
				$RegistrationBook2->where('rank', 'like', $request->input('rank') . '%')
						->where('name', 'like', $request->input('name') . '%')
						->where('sname', 'like', $request->input('sname') . '%');

				$RegistrationBook2 = $RegistrationBook2->get();

			} elseif ($searchBy == 'address') {
				$type = $request->input('optionsRadios');
				$number = $request->input('number');
				$moo = $request->input('moo');
				$tambon = $request->input('tambon');
				$aumphoe = $request->input('aumphoe');
				$province = $request->input('province');

				if ($type == 'type1' || $type == 'type2') {
					$typeTemp = $type == 'type1' ? 'บ้านพัก ศฝท.' : 'บ้านพัก ทร. ส่วนกลาง';
					$RegistrationBook2->where('type', $typeTemp);
					if ($number) {
						$RegistrationBook2->where('addressNo', $number);
					}
					$RegistrationBook2 = $RegistrationBook2->get();
				} elseif ($type == 'type3') {
					$RegistrationBook2->where('type', 'บ้านพักหน่วยราชการอื่น');

					if ($request->input('otherHouse') != 'all') {
						$RegistrationBook2->where('otherHouse', $request->input('otherHouse'));
					}
					if ($number) { $RegistrationBook2->where('addressNo', $number); }
					if ($moo) { $RegistrationBook2->where('moo', $moo); }
					if ($province != '') { $RegistrationBook2->where('provinceCode', $province); }
					if ($aumphoe != 'เลือกอำเภอ' && $aumphoe != '') { $RegistrationBook2->where('aumphoeCode', $aumphoe); }
					if ($tambon != 'เลือกตำบล'&& $tambon != '') { $RegistrationBook2->where('tambonCode', $tambon); }

					$RegistrationBook2 = $RegistrationBook2->get();

					foreach ($RegistrationBook2 as $key => $value) {
						$value->type = $value->type . ' (' . $value->otherHouse . ')';
					}
				} elseif ($type == 'type4') {
					$RegistrationBook2->where('type', 'บ้านพักส่วนตัว');
					if ($number) { $RegistrationBook2->where('addressNo', $number); }
					if ($moo) { $RegistrationBook2->where('moo', $moo); }
					if ($province != '') { $RegistrationBook2->where('provinceCode', $province); }
					if ($aumphoe != 'เลือกอำเภอ' && $aumphoe != '') { $RegistrationBook2->where('aumphoeCode', $aumphoe); }
					if ($tambon != 'เลือกตำบล' && $tambon != '') { $RegistrationBook2->where('tambonCode', $tambon); }

					$RegistrationBook2 = $RegistrationBook2->get();
				} else {
					$RegistrationBook2 = $RegistrationBook2->get();
				}

			} elseif ($searchBy == 'age') {
				$RegistrationBook2->where('type', 'บ้านพัก ศฝท.')->count('numberOver17');
				$RegistrationBook2 = $RegistrationBook2->get();

				foreach ($RegistrationBook2 as $key => $value) {
					// $numberOver17 = $value->numberOver17 != 0 ? $value->numberOver17 : 1;
					$sumAge = $sumAge + $value->numberOver17;
				}

			}
		}

		$rank = $this->getDataRank();

		$addressCode['province']  = $request->province ? $request->province : '00';
		$addressCode['aumphoe']   = $request->aumphoe ? $request->aumphoe : '0000';

		$provinceLists = $this->getAddressLists('province');
		$aumphoeLists  = $this->getAddressLists('aumphoe', $addressCode['province']);
		$tambonLists   = $this->getAddressLists('tambon', $addressCode['aumphoe'] );
		$otherHouse = $this->getOtherHouse();

		//////// Export to excel  /////////
		if ($request->action == 'export') {
			$var = [
				'registrationBook' => $RegistrationBook2,
			];

			$util = new Util();
			$util->exportExcel('ทะเบียนบ้าน', $var, 'houseRegistration.table.search');
		}

		return view('houseRegistration.search')->with('rank', $rank)
											   ->with('province', $provinceLists)
											   ->with('aumphoe', $aumphoeLists)
											   ->with('tambon', $tambonLists)
											   ->with('otherHouse', $otherHouse)
											   ->with('registrationBook', $RegistrationBook2)
											   ->with('sumAge', $sumAge)
											   ->with('request', $request);
	}

	private function getOtherHouse()
	{
		$registrations = DB::table('RegistrationBook2')
						->where('otherHouse', '!=', '')
						->get();

		$otherHouse = [];
		foreach ($registrations as $registration) {
			array_push($otherHouse, $registration->otherHouse);
		}
		$otherHouse = array_flatten(array_unique($otherHouse));
		$otherHouse = array_filter($otherHouse);

		return $otherHouse;
	}

	public function rtc(Request $request)
	{
		$registrationBook = DB::table('registrationbook')
	 				->where('rank', 'like', $request->input('rank') . '%')
	 				->where('name', 'like', $request->input('name') . '%')
	 				->where('sname', 'like', $request->input('sname') . '%')
	 				->orderBy('addressNo')
	 				->orderBy('ranking')
	 				->get();

		$rank = $this->getDataRank('registrationbook');
		return view('houseRegistration.rtc')->with('rank', $rank)
											->with('registrationBook', $registrationBook)
										    ->with('request', $request);
	}

	public function moveRtc(Request $request)
	{
		$registrationBook  = [];
		$registrationBook = DB::table('registrationbook')
 				->where('name', 'like', $request->input('name') . '%')
 				->where('sname', 'like', $request->input('sname') . '%')
 				->orderBy('addressNo')
 				->orderBy('ranking')
 				->get();
 				// dd($registrationBook);

 		$persons = DB::table('person')
	 			->where('name', 'like', $request->input('name') . '%')
 				->where('sname', 'like', $request->input('sname') . '%')
	 			->get();

 		if (!empty($registrationBook)) {
			foreach ($registrationBook  as $key => $book) {
	 			foreach ($persons as $key => $valPerson) {
	 				if ($valPerson->id13 == $book->id13) {
	 					unset($persons[$key]);
	 					break;
	 				}
	 			}
	 		}
 		}

	 	$obj_merged = array_merge((array) $registrationBook, (array) $persons);
		return view('houseRegistration.moveRtc')->with('registrationBook', $obj_merged)
										        ->with('request', $request->all());
	}
	public function moveInRtc(Request $request)
	{
		$id13 = $request->input('id');

		if ($request->from == 'book') {
			$whoMove = DB::table('registrationbook')
							->where('id13', $id13)
							->first();
		} elseif ($request->from == 'person') {
			$whoMove = DB::table('person')
							->where('id13', $id13)
							->first();
		} else {
			$whoMove = '';
		}

		$houseOwner = $this->getHouseOwner($request->addressNo);
		$date = new DateTime();
		$today = $date->format('Y-m-d');

		return view('houseRegistration.moveRtcDetail')
							->with('whoMove', $whoMove)
							->with('houseOwner', $houseOwner)
							->with('isSave', 0)
							->with('today', $today)
							->with('from', $request->from)
							->with('moveStatus', 'moveIn');
	}

	public function moveOutRtc(Request $request)
	{
		$id13 = $request->input('id');

		$whoMove = DB::table('registrationbook')
							->where('id13', $id13)
							->first();

		$houseOwner = $this->getHouseOwner($request->addressNo);
		$date = new DateTime();
		$today = $date->format('Y-m-d');

		return view('houseRegistration.moveRtcDetail')
							->with('whoMove', $whoMove)
							->with('houseOwner', $houseOwner)
							->with('isSave', 0)
							->with('today', $today)
							->with('from', $request->from)
							->with('moveStatus', 'moveOut');
	}

	public function saveMove(Request $request)
	{
		if ($request->input('move') == 'moveIn') {  		// MOVE IN
			if (!empty($request->input('addressNoNew'))) {
				$registrationbook = RegistrationBook::firstOrNew(['id13' => $request->input('whoMoveId')]);
				if ($registrationbook->exists) { // Have name in 'registrationbook'
					$this->updateRegistrationBookOld($request->input('whoMoveId'), $registrationbook);
					$this->updateRegistrationBook($request->all(), $registrationbook);
					dd('update success');
				} else {
					$this->updateRegistrationBook($request->all(),$registrationbook);
					dd('insert success');
				}
			} else {
				dd('ยังไม่กรอกที่อยู่ใหม่');
			}
		} else {											// MOVE OUT
			$registrationbook = RegistrationBook::firstOrNew(['id13' => $request->input('whoMoveId')]);
			$this->updateRegistrationBookOld($request->input('whoMoveId'), $registrationbook);
			$newAddress = new \stdClass();
			$newAddress->id13 		= $request->input('whoMoveId');
			$newAddress->ranking 	= $this->getRanking( $request->input('addressNoNew'), 'registrationbook_old');
			$newAddress->addressNo 	= $request->input('addressNoNew');
			$newAddress->rank 		= $request->input('rank');
			$newAddress->name 		= $request->input('name');
			$newAddress->sname 		= $request->input('sname');
			$newAddress->sex 		= $request->input('sex');
			$newAddress->birthdate 	= $request->input('birthdate');
			$newAddress->relation 	= $request->input('relation');
			$newAddress->moveInDate = $request->input('date');
			$newAddress->numberAll 	= '';
			$newAddress->numberOver17 = '';
			$newAddress->isError 	= 0;
			$this->updateRegistrationBookOld($request->input('whoMoveId'), $newAddress, 'moveIn');
			DB::table('RegistrationBook')->where('id13', $request->input('whoMoveId'))->delete();

			dd('complete');
		}
	}

	private function getRanking($addressNoNew, $table = 'registrationbook')
	{
		$registrationbook = DB::table($table)
							->where('addressNo', $addressNoNew)
							->orderBy('ranking')
							->get();
		$ranking = 1;
		if (!empty($registrationbook)) {
			$lastArray = end($registrationbook);
			$ranking = $lastArray->ranking + 1;

		}

		return $ranking;

	}

	private function updateRegistrationBook($whoMove, $registrationbook)
	{
		$registrationbook->moveInDate = $whoMove['date'];
		$registrationbook->id13 = $whoMove['whoMoveId'];
		$registrationbook->rank = $whoMove['rank'];
		$registrationbook->name = $whoMove['name'];
		$registrationbook->sname = $whoMove['sname'];
		$registrationbook->sex = $whoMove['sex'];
		$registrationbook->birthdate = $whoMove['birthdate'];
		$registrationbook->relation = $whoMove['relation'];
		$registrationbook->addressNo = $whoMove['addressNoNew'];
		$registrationbook->ranking = $this->getRanking($whoMove['addressNoNew']);
		$registrationbook->save();


		return true;
	}

	private function updateRegistrationBookOld($id13, $registrationbook, $moveStatus = 'moveOut')
	{
		$registrationbook_old = RegistrationBook_old::firstOrNew(['id13' => $id13, 'moveStatus' => $moveStatus]);
		$registrationbook_old->id13       	= $registrationbook->id13;
		$registrationbook_old->ranking 	  	= $registrationbook->ranking;
		$registrationbook_old->addressNo  	= $registrationbook->addressNo;
		$registrationbook_old->rank 	  	= $registrationbook->rank;
		$registrationbook_old->name 	  	= $registrationbook->name;
		$registrationbook_old->sname	  	= $registrationbook->sname;
		$registrationbook_old->sex 		  	= $registrationbook->sex;
		$registrationbook_old->birthdate  	= $registrationbook->birthdate;
		$registrationbook_old->moveStatus  	= $moveStatus;
		$registrationbook_old->relation 	= $registrationbook->relation;
		$registrationbook_old->moveInDate 	= $registrationbook->moveInDate;
		$registrationbook_old->numberAll  	= $registrationbook->numberAll;
		$registrationbook_old->numberOver17 = $registrationbook->numberOver17;
		$registrationbook_old->isError    	= $registrationbook->isError;
		$registrationbook_old->save();

		return true;
	}

	private function getUnder($id13)
	{
		$person = DB::table('person')->where('id13', $id13)->first();
		$under = !empty($person) ? $person->under : null;
		return $under;
	}

	private function getHouseOwner($addressNo)
	{
		$registrationbook = DB::table('registrationbook')
										->where('addressNo', $addressNo)
									    ->get();
		$persons = DB::table('person')->get();

		$houseOwner = [];
		$isSuccess = 0;
		foreach ($persons as $key => $person) {
			foreach ($registrationbook as $key => $book) {
				if ($person->id13 == $book->id13) {
					$houseOwner = $person;
					$isSuccess = 1;
					break;
				}
			}
			if ($isSuccess == 1) {
				break;
			}
		}

		return $houseOwner;
	}

}
