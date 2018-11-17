<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function experiences(){
        return $this->hasMany('App\Experience');
    }

    public $timestamps = false;
    protected $table = 'students';
    protected $fillable = ['firstname', 'lastname', 
                          'department_id', 'pass_out_year',
                          'CGPA'];
}
