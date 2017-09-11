<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationBook_old extends Model
{
    protected $table = 'registrationbook_old';
    protected $primaryKey = 'id13';
    protected $fillable = [
    						'runningNumber',
							'id13',
							'ranking',
							'addressNo',
							'rank',
							'name',
							'sname',
							'sex',
							'birthdate',
							'moveInDate',
							'created_at',
							'updated_at',
    					];

}
