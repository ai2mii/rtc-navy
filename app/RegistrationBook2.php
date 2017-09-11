<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationBook2 extends Model
{
    protected $table = 'registrationbook2';
    protected $primaryKey = 'id13';
    protected $fillable = [
    						'runningNumber',
							'id13',
							'rank',
							'name',
							'sname',
							'type',
							'otherHouse',
							'addressNo',
							'moo',
							'tambon',
							'aumphoe',
							'province',
							'numberAll',
							'numberOver17',
							'created_at',
							'updated_at',

    					];

}

