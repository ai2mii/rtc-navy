<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Person;
use Storage;
Use App\Classes\Staticdata;

class PersonalController extends Controller {

	public function index(Request $request)
	{
		$person = null;

		if ($request->has('id')) {
			$persons = DB::table('person')
		 				->where('id', $request->id)
		 				->first();

		 	$person = $persons;

		 	$person->profileImage = $person->id . '.jpg';

		 	$position = DB::table('position')
		 				->where('code', $person->positionCode)
		 				->first();

		 	$workLocation = DB::table('workLocation')
		 				->where('code', $person->workLocationCode)
		 				->first();
		 	$workPosition = DB::table('workPosition')
		 				->where('code', $person->workPositionCode)
		 				->first();

		 	if ($workLocation && $workPosition) {
		 		$isShort = substr($workPosition->name, -1) == '.' ? 1 : 0;
		 		$space = $isShort ? '' : ' ';
		 		$person->workLocationText = $workPosition->name . $space . $workLocation->name;
		 	} else {
		 		$person->workLocationText = '';
		 	}

		 	if ($position) {
		 		$person->positionCode = $position->code;
			 	$person->positionName = $position->name;
			 	$person->positionRank = $position->rank;
			 	$person->positionCorps = $position->corps;
			 	$person->positionLine = $position->line;
		 	} else {
		 		$person->positionCode = '';
			 	$person->positionName = '';
			 	$person->positionRank = '';
			 	$person->positionCorps = '';
			 	$person->positionLine = '';
		 	}
		}

		$staticLists = new \stdClass;
		$staticData = new Staticdata();
		$staticLists->rank = $staticData->getDataRank();
		$staticLists->staticWorkLocation = $staticData->getStaticWorkLocation();
		$staticLists->staticWorkPosition = $staticData->getStaticWorkPosition();
		$action = $request->input('action');

		return view('personal')->with('person', $person)
							   ->with('action', $action)
							   ->with('staticLists', $staticLists);
	}

	public function save(Request $request)
	{
		$this->validate($request, [
	        'id' => 'required',
	    ]);
		$person = Person::firstOrNew(['id' => $request->id]);

		if ($request->file('profileImage')) {
			Storage::put(
            	'profileImage/'. $request->input('id') . '.jpg',
            	file_get_contents($request->file('profileImage')->getRealPath())
        	);
		}

  		$person->id 		= $request->input('id');
  		$person->rank 		= $request->input('rank');
  		$person->name 		= $request->input('name');
  		$person->sname 		= $request->input('sname');
  		$person->id13 		= $request->input('id13');
  		$person->phoneNo    = $request->input('phoneNo');
  		$person->mobilePhoneNo = $request->input('mobilePhoneNo');
  		$person->religion 	= $request->input('religion');
  		$person->bloodType 	= $request->input('bloodType');
  		$person->height 	= $request->input('height');
  		$person->weight 	= $request->input('weight');
  		$person->bmi 		= $this->calculateBMI($request->input('weight'), $request->input('height'));
  		$person->health 	= $request->input('health');
  		$person->disbursement = $request->input('disbursement');
  		$person->profileBook  = $request->input('profileBook');
  		$person->trainingResults = $request->input('trainingResults');
  		$person->corps 		= $request->input('corps');
  		$person->line 		= $request->input('line');
  		$person->birthdate 	= $request->input('birthdate');
  		$person->militaryServiceDate = $request->input('militaryServiceDate');
  		$person->militaryRegistrationDate = $request->input('militaryRegistrationDate');
  		$person->retiredYears = $request->input('retiredYears');
  		$person->memberDate   = $request->input('memberDate');
  		$person->level 	  = $request->input('level');
  		$person->salary 	  = $request->input('salary');
  		$person->currentPosition = $request->input('currentPosition');
  		$person->workLocationCode =  $request->input('workLocationCode');
  		$person->workPositionCode =  $request->input('workPositionCode');
  		$person->positionCode = $request->input('position');

  		$id = $person->id;
		$person->save();
		
		return redirect('/personal?action=preview&id=' . $id);

	}

	private function calculateBMI($weight, $height)
	{
		$divisor = ($height / 100) * ($height / 100);
		$bmi = $divisor == 0 ? 0 : round($weight / $divisor, 2);

		return $bmi;
	}

}
