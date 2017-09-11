<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationBook2_old extends Model
{
    protected $table = 'registrationbook2_old';
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

