<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }    
    
    protected $table = 'experiences';
    public $timestamps = false;
    
    protected $fillable = ["student_id", "company_id",
                           "salary", "job_profile",
                           "eligibility", "reason",
                           "experience", "misc", 
                           "job_offered"];
}
