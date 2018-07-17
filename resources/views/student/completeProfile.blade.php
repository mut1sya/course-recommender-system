@extends('layouts.master')
@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-xs-12">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Complete your student profile </h2>
                
                    	<div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('student.store')}}">
                    		{{ csrf_field() }}

                    		<!-- first name -->
	                    	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	                            <label for="first_name" class="col-md-4 control-label">First Name</label>
	                            <div class="col-md-6">
	                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

	                                @if ($errors->has('first_name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('first_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- Last Name -->
	                    	<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
	                            <label for="last_name" class="col-md-4 control-label">Last Name</label>
	                            <div class="col-md-6">
	                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required >

	                                @if ($errors->has('last_name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('last_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
	                        <!-- date of birth -->
	                    	<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
	                            <label for="dob" class="col-md-4 control-label">Date of birth</label>
	                            <div class="col-md-6">
	                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required >

	                                @if ($errors->has('dob'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('dob') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
	                        <!-- telephone number -->
	                    	<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
	                            <label for="phone_number" class="col-md-4 control-label">Telephone Number</label>
	                            <div class="col-md-6">
	                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required placeholder="07xxxxxxxx">

	                                @if ($errors->has('phone_number'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('phone_number') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      		
                      		<!-- Gender -->
	                    	<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
	                            <label for="gender" class="col-md-4 control-label">Gender:</label>
	                            <div class="col-md-6">
	                                <input type="radio" class="flat" name="gender" value="male"  required 
			                            @if(old('gender')=='male')
			                              {{ 'checked' }}
	                             		@endif
                              		/> Male<br>
                              		<input type="radio" class="flat" name="gender" value="female"  required 
			                            @if(old('gender')=='female')
			                              {{ 'checked' }}
	                             		@endif
                              		/> Female<br>

                              		@if ($errors->has('gender'))
	                                    <span class="help-block">
	                                        <strong>select either male or female</strong>
	                                    </span>
                               		@endif	                                
	                            </div>
	                        </div>

	                        <!-- location -->
	                    	<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
	                            <label for="location" class="col-md-4 control-label">Location</label>
	                            <div class="col-md-6">
	                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required >

	                                @if ($errors->has('location'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('location') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
                      		<!-- KCSE Grade -->
	                    	<div class="form-group{{ $errors->has('kcse_grade') ? ' has-error' : '' }}">
	                            <label for="kcse_grade" class="col-md-4 control-label">KCSE Grade</label>
	                            <div class="col-md-6">
		                            <select name="kcse_grade" class="form-control" id="kcse_grade" required >
	                                    <option selected="selected"> select Grade</option>
	                                    <option value="A"> A</option>
	                                    <option value="A-"> A-</option>
	                                    <option value="B+"> B+</option>
	                                    <option value="B"> B</option>
	                                    <option value="B-"> B-</option>
	                                    <option value="C+"> C+</option>
	                                    <option value="C"> C</option>
	                                    <option value="C-"> C-</option>
	                                    <option value="D+"> D+</option>
	                                    <option value="D"> D</option>
	                                    <option value="D-"> D-</option>
	                                    <option value="E"> E</option>
                                	</select>

	                                @if ($errors->has('kcse_grade'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('kcse_grade') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
                      		<!-- KCSE Points -->
	                    	<div class="form-group{{ $errors->has('kcse_points') ? ' has-error' : '' }}">
	                            <label for="kcse_points" class="col-md-4 control-label">KCSE Points</label>
	                            <div class="col-md-6">
	                               
	                            	<select name="kcse_points" class="form-control" id="kcse_points" required >
	                        		
	                        		</select>
	                                @if ($errors->has('kcse_points'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('kcse_points') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        
	                        
                      		<!-- High school -->
	                    	<div class="form-group{{ $errors->has('highschool') ? ' has-error' : '' }}">
	                            <label for="highschool" class="col-md-4 control-label">High School</label>
	                            <div class="col-md-6">
	                                <input id="highschool" type="text" class="form-control" name="highschool" value="{{ old('highschool') }}" required >

	                                @if ($errors->has('highschool'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('highschool') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      		
                      		<!-- year completed highschool -->
	                    	<div class="form-group{{ $errors->has('year_completed') ? ' has-error' : '' }}">
	                            <label for="year_completed" class="col-md-4 control-label">Year of Completing Highschool</label>
	                            <div class="col-md-6">
	                                <input id="year_completed" type="text" class="form-control" name="year_completed" value="{{ old('year_completed') }}" placeholder="e.g 2017" required >

	                                @if ($errors->has('year_completed'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('year_completed') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- personality -->
	                    	<div class="form-group{{ $errors->has('personality') ? ' has-error' : '' }}">
	                            <label for="personality" class="col-md-4 control-label">Personality</label>
	                            <div class="col-md-6">	                                
	                                <select name="personality" class="form-control" id="personality" required >
	                                    <option selected="selected"> select personality</option>
	                                    <option value="architect"> Architect</option>
	                                    <option value="logician"> Logician</option>
	                                    <option value="commander"> Commander</option>
	                                    <option value="dabater"> Dabater</option>
	                                    <option value="advocate"> Advocate</option>
	                                    <option value="mediator"> Mediator</option>
	                                    <option value="protagonist"> Protagonist</option>
	                                    <option value="campaigner"> Campaigner</option>
	                                    <option value="logistician"> Logistician</option>
	                                    <option value="defender"> Defender</option>
	                                    <option value="executive"> Executive</option>
	                                    <option value="consul"> Consul</option>
	                                    <option value="virtuoso"> Virtuoso</option>
	                                    <option value="adventurer"> Adventurer</option>
	                                    <option value="entrepeneur"> Entrepeneur</option>
	                                    <option value="entertainer"> Entertainer</option>
                                	</select>
                                	free online personality test click <a href="https://www.16personalities.com/free-personality-test" target="_blank" style="color:green;">here</a>

	                                @if ($errors->has('personality'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('personality') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      		
                      		<!-- Hobbies -->
	                    	<div class="form-group{{ $errors->has('hobbies') ? ' has-error' : '' }}">
	                            <label for="hobbies" class="col-md-4 control-label">Hobbies</label>
	                            <div class="col-md-6">
	                                <input id="hobbies" type="text" class="form-control" name="hobbies" value="{{ old('hobbies') }}"  required>

	                                @if ($errors->has('hobbies'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('hobbies') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

                      		<!-- skills -->
	                    	<div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
	                            <label for="skills" class="col-md-4 control-label">Skills</label>
	                            <div class="col-md-6">
	                                <input id="skills" type="text" class="form-control" name="skills" value="{{ old('skills') }}"  required>

	                                @if ($errors->has('skills'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('skills') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
                      		<!-- Interests -->
	                    	<div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
	                            <label for="interests" class="col-md-4 control-label">Industries of Interest</label>
	                            <div class="col-md-6">
		                            <select name="interests" class="form-control" id="interests" required >
	                                    <option selected="selected"> select Industry you like</option>
	                                    @foreach($industries as $industry)
											<option value="{{$industry->industry_name}}"> {{$industry->industry_name}}</option>
										@endforeach
                                	</select>

	                                @if ($errors->has('interests'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('interests') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                        <!-- user id -->
	                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                      		<div class="ln_solid"></div>
                      		<div class="form-group">
                        		<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          			<button type="submit" class="btn btn-success">Submit</button>
                        		</div>
                      		</div>
                    	</form>
                  	</div>
                </div>
            </div>
        </div>
    
    @foreach ($errors->all() as $message)
    	<p>{{$message}}</p>
   @endforeach

   <script type="text/javascript">
    $(document).ready(function() {
    	 var previous_grade = $("#kcse_grade").val();
    	 $("#kcse_points").empty();
           addOption(previous_grade);
        $("#kcse_grade").change(function(event){
              var grade = $("#kcse_grade").val();
              $("#kcse_points").empty();
              addOption(grade);
        });

        function addOption(grade){
        	switch(grade){
        		case 'A':
        			for(var i = 81; i <= 84; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'A-':
        			for(var i = 74; i <= 80; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'B+':
        			for(var i = 67; i <= 73; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'B':
        			for(var i = 60; i <= 66; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'B-':
        			for(var i = 53; i <= 59; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'C+':
        			for(var i = 46; i <= 52; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'C':
        			for(var i = 39; i <= 45; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'C-':
        			for(var i = 32; i <= 38; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'D+':
        			for(var i = 25; i <= 31; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'D':
        			for(var i = 18; i <= 24; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'D-':
        			for(var i = 11; i <= 17; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		case 'E':
        			for(var i = 7; i <= 10; i++){
        				$('#kcse_points').append('<option value=\"'+i+'\"> '+i+'</option>');
        			}
        			break;
        		default:
        			$('#kcse_points').append('<option> Select Grade First</option>');
        	}
        } 
    });
</script>
@endsection