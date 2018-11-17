@extends('templates.index')

@section('styles')
    @parent
    <style>
        .experiences{
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .card{
            margin-top: 20px;
            margin-bottom: 20px;
            width: 700px;
        }

        .card-text{
            display: flex;
            justify-content: space-between
        }

        .card-title{
            margin-bottom: 15px;
        }

        .card-block{
            padding: 0;
        }
        .card-contents{
            display: none;
            height: 0;
            transition: all 1.5s ease-in;
        }

        .expanded {
            display: block;
        }

        .expandedHeight {
            height: auto;
        }

        .card-box{
            padding: 1.25em;
            border: 2px solid #e2cfcf;
        }
    </style>

@endsection


@section('main')
    <div class="container">
        <select class="form-control" name="company" id="company">
            <option value="null">Select an option</option>
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{ $company->name }}</option>
            @endforeach
        </select>
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        <div class="experiences">

        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
    let expand;

        $(document).ready(() => {
            $("#company").change(function(){
                $('.experiences').html('');
                if(this.value !== "null"){
                    console.log(this.value);
                    $.post('/vesit_placement_web_app/public/experience', {
                        companyId: this.value,
                        _token: $("#token").val() 
                     }).done((res) => {
                        var experiences = res.experience;

                        experiences = experiences.reduce((prev, current) => {
                            var year = new Date(current.student.pass_out_year).getFullYear();
                            year = year.toString();
                            prev[year] = prev[year] || [];
                            prev[year].push({
                                experience: (({eligibility, job_offered, salary, job_profile, reason}) => 
                                                ({eligibility, job_offered, salary, job_profile, reason}))(current),
                                student: Object.assign({}, current.student)
                            });
                            return prev ;
                        }, []);

                        function renderStudentFromYear(year){
                            let renderString = ``;
                            for(var experience in experiences[year]){
                                renderString += `
                                <div class="card-box" onclick="expand(event, this)">

                                    <div class="card-title">
                                        <h3>${experiences[year][experience].student.firstname} ${experiences[year][experience].student.lastname}</h3>
                                    </div>
                                    <div class="card-text">
                                        <strong>Job Offered:  </strong> 
                                        <p>${experiences[year][experience].experience.job_offered?"Yes":"No"}</p>
                                        
                                    </div>
                                    <div class="card-text">
                                        <strong>Salary:  </strong>  
                                        <p>${experiences[year][experience].experience.salary}</p>
                                    </div>
                                    <div class="card-text">
                                        <strong>CGPA:  </strong>  
                                        <p>${experiences[year][experience].student.CGPA}</p>
                                    </div>
                                    <div class="card-text">
                                        <strong>Department:  </strong>  
                                        <p>${experiences[year][experience].student.department.name}</p>
                                    </div>

                                    <div class="card-contents" id=${experiences[year][experience].student.id}>
                                        <strong>Reason:  </strong>  
                                        <div class="card-text">
                                            <p>${experiences[year][experience].experience.reason.replace(/\n/g, '<br>')}</p>

                                        </div>
                                        <strong>Job Profile:  </strong>  
                                        <div class="card-text">
                                            <p>${experiences[year][experience].experience.job_profile}</p>                                            
                                        </div>
                                        <strong>Eligibility:  </strong>  
                                        <div class="card-text">
                                            <p>${experiences[year][experience].experience.eligibility}</p>                                          
                                        </div>  

                                    </div>
                                </div>


                            `;
                            }
                            // console.log(experiences[year][experience]);
                            return renderString;
                        }

                        for(var year in experiences){
                            console.log(experiences[year]);
                            $('.experiences').append(`
                            <h4 class="card-title">${year}</h4>
                            <div class="card">
                                <div class="card-block">
                                    ${renderStudentFromYear(year)}
                                </div>                            
                            </div>
                            `);
                        }
                    })
                }
            });

            let findProps = function(obj, propClass){
                let retProp = null;
                let classArray = [];
                for(var ob in obj){
                        classArray = obj[ob].className.split(" ")
                        if(classArray.includes(propClass)){
                            retProp = obj[ob]
                            break;
                        }   
                    }
                    return retProp;
                }
                

            expand = function(event, currentContext){
                let prop = findProps(currentContext.children, "card-contents");
                if($(prop).hasClass("expanded")){
                    $(prop).removeClass("expanded expandedHeight");
                }else{
                    $(prop).addClass("expanded expandedHeight");
                }
                console.log(prop);
                
            }



        })


 
    </script>

@endsection
