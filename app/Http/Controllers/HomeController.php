<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Person;
Use App\Classes\Staticdata;

class HomeController extends Controller {

	public function index()
	{
		$staticData = new Staticdata();
		$rank = $this->getDataRank();

		return view('home')->with('rank', $rank);
	}

	public function search(Request $request)
	{
		$persons = DB::table('person')
		 				->where('rank', 'like', $request->input('searchByRank') . '%')
		 				->where('name', 'like', $request->input('searchByName') . '%')
		 				->where('sname', 'like', $request->input('searchBySname') . '%')
		 				->get();
		$rank = $this->getDataRank();
		$request = $request->all();

		return view('home')->with('rank', $rank)
						   ->with('persons', $persons)
						   ->with('request', $request);
	}

	private function getDataRank()
	{
		$persons = DB::table('person')
						->get();
		$rank = [];
		foreach ($persons as $person) {
			array_push($rank, $person->rank);
		}
		$rank = array_flatten(array_unique($rank));
		$rank = array_filter($rank);
		return $rank;
	}
}
