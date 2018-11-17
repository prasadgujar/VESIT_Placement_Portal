<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Student;
use App\Department;
use App\Experience;

class PlacementController extends Controller
{
    public function insertCompany(Request $request) {
        $company = new Company();

        $company->name = $request->name;
        $company->save();
        return view('record.addCompany');
    }

    public function getPlacementForm(){
        $companies = Company::get(['name', 'id']);    
        $departments = Department::all();

        return view('record.addRecord')->with([
                                        'companies' => $companies,
                                        'departments' => $departments]);
    }

    public function addRecord(Request $request){
        $student = new Student();
        $experience = new Experience();
        
        $student->fill(['firstname' => $request->firstname,
                        'lastname' => $request->lastname,
                        'CGPA' => $request->CGPA,
                        'department_id' => $request->department_id,
                        'pass_out_year' => $request->pass_out_year]);

        $student->save();

        $experience->fill(['company_id' => $request->company,
                            'salary' => $request->salary,
                            'job_profile' => $request->job_profile,
                            'eligibility' => $request->eligibility,
                            'reason' => $request->reason,
                            'experience' => $request->experience,
                            'misc' => $request->misc,
                            'job_offered' => $request->job_offered]);

        $student->experiences()->save($experience);



        return $student;
    }

    public function experience(Request $request){
        $companies = Company::get(['name', 'id']);
        return view('record.experience')->with(['companies' => $companies]);
    }

    public function getResultsFromPlacement(Request $request){
        $companyId = $request->companyId;
        $company = Company::find($companyId);
        $students = [];
        foreach($company->experiences as $experience){
            $experience->student;
            $experience->student->department;
        }


        return ['experience' => $company->experiences];
    }
}
