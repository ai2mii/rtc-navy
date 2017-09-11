<?php namespace App\Classes;
use Excel;
class Util
{
	public function exportExcel($fileName, $var, $view)
	{
		Excel::create($fileName, function($excel) use($var, $view) {
		    $excel->sheet('Sheet1', function($sheet) use($var, $view) {
		        $sheet->loadView($view, $var);
		    });
		})->export('xlsx');
	}
}