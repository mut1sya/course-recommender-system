@extends('layouts.master')
@section('content')
<div class="right_col" role="main">
	<div class="">
        <div class="row">
            <div class="col-md-8 col-md-offset-1 col-xs-12">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Complete your verifier profile </h2>
                
                    	<div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('verifier.store')}}">
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
                      		
	                        <!-- Social Media Handle -->
	                    	<div class="form-group{{ $errors->has('social_media_handle') ? ' has-error' : '' }}">
	                            <label for="social_media_handle" class="col-md-4 control-label">Social Media Handle</label>
	                            <div class="col-md-6">
	                                <input id="social_media_handle" type="text" class="form-control" name="social_media_handle" value="{{ old('social_media_handle') }}" required autofocus>

	                                @if ($errors->has('social_media_handle'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('social_media_handle') }}</strong>
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

	                        <!-- professional title -->
	                    	<div class="form-group{{ $errors->has('professional_title') ? ' has-error' : '' }}">
	                            <label for="professional_title" class="col-md-4 control-label">Professional Title</label>
	                            <div class="col-md-6">
	                                <input id="professional_title" type="text" class="form-control" name="professional_title" value="{{ old('professional_title') }}" required autofocus>

	                                @if ($errors->has('professional_title'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('professional_title') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      
                      		<!-- level of education -->
	                    	<div class="form-group{{ $errors->has('level_of_education') ? ' has-error' : '' }}">
	                            <label for="level_of_education" class="col-md-4 control-label">Level of Education</label>
	                            <div class="col-md-6">
	                                <input id="level_of_education" type="text" class="form-control" name="level_of_education" value="{{ old('level_of_education') }}" required autofocus>

	                                @if ($errors->has('level_of_education'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('level_of_education') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <!-- active -->
	                        <input type="hidden" name="active" value="0">

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