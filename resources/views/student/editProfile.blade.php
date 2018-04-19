@extends('layouts.student')

@section('content')

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Edit your student Details </h2>
                
                    	<div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('student.editProfile.submit') }}">
                    		{{ csrf_field() }}

                    		<!-- user name -->
	                    	<div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
	                            <label for="userName" class="col-md-4 control-label">User Name</label>
	                            <div class="col-md-6">
	                                <input id="userName" type="text" class="form-control" name="userName" value="{{ Auth::user()->userName }}" required autofocus>

	                                @if ($errors->has('userName'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('userName') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

                    		<!-- first name -->
	                    	<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	                            <label for="first_name" class="col-md-4 control-label">First Name</label>
	                            <div class="col-md-6">
	                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" required autofocus>

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
	                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" required autofocus>

	                                @if ($errors->has('last_name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('last_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      		
                      		<!-- email -->
	                    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">Email</label>
	                            <div class="col-md-6">
	                                <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required autofocus>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- date of birth -->
	                    	<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
	                            <label for="dob" class="col-md-4 control-label">Date of birth</label>
	                            <div class="col-md-6">
	                                <input id="dob" type="date" class="form-control" name="dob" value="{{ $student->dob }}" required autofocus>

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
	                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $student->phone_number }}" required autofocus>

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
			                            @if($student->gender=='male')
			                              {{ 'checked' }}
	                             		@endif
                              		/> Male<br>
                              		<input type="radio" class="flat" name="gender" value="female"  required 
			                            @if($student->gender=='female')
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
	                                <input id="location" type="text" class="form-control" name="location" value="{{ $student->location }}" required autofocus>

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
	                                <input id="kcse_grade" type="text" class="form-control" name="kcse_grade" value="{{ $student->kcse_grade }}" required autofocus>

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
	                                <input id="kcse_points" type="text" class="form-control" name="kcse_points" value="{{ $student->kcse_points }}" required autofocus>

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
	                                <input id="highschool" type="text" class="form-control" name="highschool" value="{{ $student->highschool }}" required autofocus>

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
	                                <input id="year_completed" type="text" class="form-control" name="year_completed" value="{{ $student->year_completed }}" required autofocus>

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
	                                <input id="personality" type="text" class="form-control" name="personality" value="{{ $student->personality }}"  autofocus>
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
	                                <input id="hobbies" type="text" class="form-control" name="hobbies" value="{{ $student->hobbies }}"  autofocus>

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
	                                <input id="skills" type="text" class="form-control" name="skills" value="{{ $student->skills }}"  autofocus>

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
	                                <input id="interests" type="text" class="form-control" name="interests" value="{{ $student->interests }}" required autofocus>

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
                          			<button type="reset" class="btn btn-danger">cancel</button>
                        		</div>
                      		</div>
                    	</form>
                  	</div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  	<div class="x_title">
                    	<h2>Change Password Here</h2>                
                    	<div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('student.editPassword.submit')}}">
                    		{{ csrf_field() }}

                    		
	                        <!-- old Password -->
	                    	<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
	                            <label for="old_password" class="col-md-4 control-label">Old Password</label>
	                            <div class="col-md-6">
	                                <input id="old_password" type="password" class="form-control" name="old_password"  required autofocus>

	                                @if ($errors->has('old_password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('old_password') }}</strong>
	                                    </span>
	                                @endif
	                                @if(session('error'))                                                    
                                        <span class="has-error">
                                             <strong>{{ Session::get('error')}}</strong>
                                        </span>
                                    @endif
	                            </div>
	                        </div>

	                        <!-- new password -->
	                    	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">New Password</label>
	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control" name="password"  required autofocus>

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- password confirmation -->
	                    	<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                            <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>
	                            <div class="col-md-6">
	                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  required autofocus>

	                                @if ($errors->has('password_confirmation'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
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
  
    @if(session('status'))
        <script type="text/javascript">
            alert('{{ Session::get('status')}}');
        </script>                                
    @endif
    @foreach ($errors->all() as $message)
    	<p>{{$message}}</p>
   @endforeach
@endsection