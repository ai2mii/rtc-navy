<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
Use App\Person;
Use DateTime;

class SetupController extends Controller {

	public function changeYear()
	{
		$persons = DB::table('registrationBook')
		 				->get();

		$date = new DateTime();
		$i = 0 ;
		foreach ($persons as $key => $person) {
			$day = $person->moveInDate;
			$parts = explode('-', $day);

			if ($parts[0] > 2017 ) {
				$i++;
				$date->setDate($parts[0] - 543, $parts[1], $parts[2]);
				$newDate = $date->format('Y-m-d');

				DB::table('registrationBook')
	            	->where('id13', $person->id13 )
	            	->update(['moveInDate' => $newDate]);

			}
		}
		  dd($i);
	}

}
