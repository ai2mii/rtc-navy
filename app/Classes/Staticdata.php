<?php namespace App\Classes;
use DB;
class Staticdata
{

	public function getDataRank()
	{
		$rank = [
			'น.อ.',
			'น.อ.หญิง',
			'ว่าที่ น.อ.',
			'ว่าที่ น.อ.หญิง',
			'น.ท.',
			'น.ท.หญิง',
			'ว่าที่ น.ท.',
			'ว่าที่ น.ท.หญิง',
			'น.ต.',
			'น.ต.หญิง',
			'ว่าที่ น.ต.',
			'ว่าที่ น.ต.หญิง',
			'ร.อ.',
			'ร.อ.หญิง',
			'ว่าที่ ร.อ.',
			'ว่าที่ ร.อ.หญิง',
			'ร.ท.',
			'ร.ท.หญิง',
			'ว่าที่ ร.ท.',
			'ว่าที่ ร.ท.หญิง',
			'ร.ต.',
			'ร.ต.หญิง',
			'ว่าที่ ร.ต.',
			'ว่าที่ ร.ต.หญิง',
			'พ.จ.อ.',
			'พ.จ.อ.หญิง',
			'พ.จ.ท.',
			'พ.จ.ท.หญิง',
			'พ.จ.ต.',
			'พ.จ.ต.หญิง',
			'จ.อ.',
			'จ.อ.หญิง',
			'จ.ท.',
			'จ.ท.หญิง',
			'จ.ต.',
			'จ.ต.หญิง',
			'นาย',
			'นาง',
			'นางสาว',
		];

		$json_rank = json_decode(json_encode($rank));
		return $json_rank;
	}

	public function getStaticWorkLocation()
	{
		$workLocation = DB::table('workLocation')
		 				->get();

		return $workLocation;
	}

	public function getStaticWorkPosition()
	{
		$workPosition = DB::table('workPosition')
		 				->get();

		return $workPosition;
	}
}