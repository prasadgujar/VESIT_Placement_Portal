<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $table = 'companies';
    public $timestamps = false;

    public function experiences(){
        return $this->hasMany('App\Experience');
    }

    protected $fillable = ['name'];
}
