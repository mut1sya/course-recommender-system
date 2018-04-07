@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
	<div class="">
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
	                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

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
	                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>

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
	                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

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
	                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

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
	                                <input id="kcse_grade" type="text" class="form-control" name="kcse_grade" value="{{ old('kcse_grade') }}" required autofocus>

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
	                                <input id="kcse_points" type="text" class="form-control" name="kcse_points" value="{{ old('kcse_points') }}" required autofocus>

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
	                                <input id="highschool" type="text" class="form-control" name="highschool" value="{{ old('highschool') }}" required autofocus>

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
	                                <input id="year_completed" type="text" class="form-control" name="year_completed" value="{{ old('year_completed') }}" required autofocus>

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
	                                <input id="personality" type="text" class="form-control" name="personality" value="{{ old('personality') }}"  autofocus>
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
	                                <input id="hobbies" type="text" class="form-control" name="hobbies" value="{{ old('hobbies') }}"  autofocus>

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
	                                <input id="skills" type="text" class="form-control" name="skills" value="{{ old('skills') }}"  autofocus>

	                                @if ($errors->has('skills'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('skills') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
                      		<!-- Interests -->
	                    	<div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
	                            <label for="interests" class="col-md-4 control-label">Interests</label>
	                            <div class="col-md-6">
	                                <input id="interests" type="text" class="form-control" name="interests" value="{{ old('interests') }}" required autofocus>

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
    </div>
    </div>
    @foreach ($errors->all() as $message)
    	<p>{{$message}}</p>
   @endforeach
@endsection