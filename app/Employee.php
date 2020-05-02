<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_user_id', 'name', 'age','salary','gender','birth_year', 'role','image'
    ];   

    

}
