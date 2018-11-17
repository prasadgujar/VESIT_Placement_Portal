@extends('templates.index')


@section('main')
    <div class="container">
        {{ Form::open(['route' => 'record.addRecord', 'method'=>'post']) }}
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>                
                </div>
                <div class="col-md-6">
                    <label>Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"required>                
                </div>
                <div class="col-md-6">
                    <label>CGPA</label>
                    <input type="text" class="form-control" id="CGPA" name="CGPA" placeholder="CGPA" required>                
                </div>   
                <div class="col-md-6">
                    <label>Company name</label>
                    <select class="form-control" name="company">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>   
                <div class="col-md-6">
                    <label>Pass out year</label>
                    <input type="date" class="form-control" id="date" placeholder="Date" name = "pass_out_year" required>                
                </div>  
                <div class="col-md-6">
                    <label>Salary</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Salary" name="salary" required>                
                </div>        
                <div class="col-md-12">
                    <label>Department</label>
                    <select class="form-control" name="department_id">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>                 
                <div class="col-md-12">
                    <label>Job profile</label>
                    <input type="text" class="form-control" id="lastname" name="job_profile" placeholder="Job Profile" required>                
                </div>      
                <div class="col-md-12">
                    <label>Eligibility</label>
                    <input type="text" class="form-control" id="lastname" name="eligibility" placeholder="Eligibility
                    " required>                
                </div>
                <div class="col-md-12">
                    <label>Reason</label>
                    <input type="text" class="form-control" id="lastname" name="reason" placeholder="Reason you were selected/not selected" required>  
                </div>          
                <div class="col-md-12">
                    <label>Experience</label>
                    <input type="text" class="form-control" id="lastname" name="experience" placeholder="Describe your interview here" required>
                </div>
                <div class="col-md-12">
                    <label>Miscellaneous</label>
                    <input type="text" class="form-control" id="lastname" name="misc" value="None" required>
                </div>
                <div class="col-md-12">
                    <label>Job offered</label>
                    <select class="form-control" name="job_offered">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>                
                

            </div>

            <input type="submit" value="submit" class="btn btn-primary">
        {{ Form::close() }}
    </div>
@endsection

@section('scripts')
    @parent


@endsection
