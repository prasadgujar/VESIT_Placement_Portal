@extends('templates.index')

@section('main')
    <div class="container">
        {{ Form::open(['route' => 'record.addCompany', 'method'=>'post']) }}
            <div class="form-group">
                <div class="col-md-3">
                    <label>Company Name</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="companyName" placeholder="Company name" name="name">
                </div>        
            </div>

            <input type="submit" value="submit" class="btn btn-primary">
        {{ Form::close() }}
    </div>
@endsection