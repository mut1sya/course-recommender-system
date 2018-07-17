@extends('layouts.admin')

@section('content')

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Add Admin </h2>
                      <p>For new admins their email is also the password. </p>
                    	<div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('admin.add.store') }}">
                    		{{ csrf_field() }}

                    		<!-- user name -->
	                    	<div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
	                            <label for="userName" class="col-md-4 control-label">User Name</label>
	                            <div class="col-md-6">
	                                <input id="userName" type="text" class="form-control" name="userName" required autofocus>

	                                @if ($errors->has('userName'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('userName') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                      		
                      		<!-- email -->
	                    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">Email</label>
	                            <div class="col-md-6">
	                                <input id="email" type="text" class="form-control" name="email" required autofocus>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                          <!-- first_name -->
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                              <label for="first_name" class="col-md-4 control-label">First Name</label>
                              <div class="col-md-6">
                                  <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>

                                  @if ($errors->has('first_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('first_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <!-- last_name -->
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                              <label for="last_name" class="col-md-4 control-label">Last Name</label>
                              <div class="col-md-6">
                                  <input id="last_name" type="text" class="form-control" name="last_name"  required autofocus>

                                  @if ($errors->has('last_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('last_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <!-- location -->
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                              <label for="location" class="col-md-4 control-label">Location</label>
                              <div class="col-md-6">
                                  <input id="location" type="text" class="form-control" name="location"  required autofocus>

                                  @if ($errors->has('location'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('location') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <!-- phone_number -->
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                              <label for="phone_number" class="col-md-4 control-label">Phone Number</label>
                              <div class="col-md-6">
                                  <input id="phone_number" type="text" class="form-control" name="phone_number"  required autofocus>

                                  @if ($errors->has('phone_number'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('phone_number') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

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
        </div>
@endsection