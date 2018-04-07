@extends('layouts.verifier')

@section('content')
<div class="right_col" role="main">
	<div class="">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Edit your Verifier Details </h2>
                
                    	<div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('verifier.editProfile.submit') }}">
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
	                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $verifier->first_name }}" required autofocus>

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
	                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $verifier->last_name }}" required autofocus>

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
                      
	                        <!-- telephone number -->
	                    	<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
	                            <label for="phone_number" class="col-md-4 control-label">Telephone Number</label>
	                            <div class="col-md-6">
	                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $verifier->phone_number }}" required autofocus>

	                                @if ($errors->has('phone_number'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('phone_number') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      		
	                        <!-- location -->
	                    	<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
	                            <label for="location" class="col-md-4 control-label">Location</label>
	                            <div class="col-md-6">
	                                <input id="location" type="text" class="form-control" name="location" value="{{ $verifier->location }}" required autofocus>

	                                @if ($errors->has('location'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('location') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>


	                        <!-- social media handle -->
	                    	<div class="form-group{{ $errors->has('social_media_handle') ? ' has-error' : '' }}">
	                            <label for="social_media_handle" class="col-md-4 control-label">Social Media Handle</label>
	                            <div class="col-md-6">
	                                <input id="social_media_handle" type="text" class="form-control" name="social_media_handle" value="{{ $verifier->social_media_handle }}" required autofocus>

	                                @if ($errors->has('social_media_handle'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('social_media_handle') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- professional title -->
	                    	<div class="form-group{{ $errors->has('professional_title') ? ' has-error' : '' }}">
	                            <label for="professional_title" class="col-md-4 control-label">Professional Title</label>
	                            <div class="col-md-6">
	                                <input id="professional_title" type="text" class="form-control" name="professional_title" value="{{ $verifier->professional_title }}" required autofocus>

	                                @if ($errors->has('professional_title'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('professional_title') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- level of education -->
	                    	<div class="form-group{{ $errors->has('level_of_education') ? ' has-error' : '' }}">
	                            <label for="level_of_education" class="col-md-4 control-label">Location</label>
	                            <div class="col-md-6">
	                                <input id="level_of_education" type="text" class="form-control" name="level_of_education" value="{{ $verifier->level_of_education }}" required autofocus>

	                                @if ($errors->has('level_of_education'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('level_of_education') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- active -->
	                        <input type="hidden" name="active" value="{{ $verifier->active }}">

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
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('verifier.editPassword.submit')}}">
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