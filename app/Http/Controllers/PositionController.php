<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Position;

class PositionController extends Controller {

	public function index()
	{
		return view('position');
	}

	public function save(Request $request)
	{
		$position = Position::firstOrNew(['code' => $request->code]);
		$position->code = $request->code;
		$position->name = $request->name;
		$position->rank = $request->rank;
		$position->corps  = $request->corps;
		$position->line   = $request->line;
		$position->under  = $request->under;
		$position->isOpen = $request->isOpen;
		$position->save();

		return redirect('/position');
	}

	public function search(Request $request)
	{
		$positionCode = $request->positionCode;
		$positionName = $request->positionName;

		$position = DB::table('position')
		 				->where('code', 'like', '%' . $positionCode . '%')
		 				->where('name', 'like', '%' . $positionName . '%')
		 				->get();

		return $position;
	}

	public function searchWorkLocation(Request $request)
	{
		$workLocationCode = $request->workLocationCode;
		$workLocationName = $request->workLocationName;
		$batt 		      = $request->batt;
		$company 	      = $request->company;
		$workLocation = DB::table('worklocation')
		 				->where('code', 'like', '%' . $workLocationCode . '%')
		 				->where('position', 'like', '%' . $workLocationName . '%');

	 	if ($batt) {
	 		$workLocation = $workLocation->where('batt', $batt);
	 	}
	 	if ($company) {
	 		$workLocation = $workLocation->where('company', $company);
	 	}

		$workLocation =$workLocation->get();
		return $workLocation;
	}

}
