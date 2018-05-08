@extends('layouts.admin')

@section('content')

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Edit your admin Details </h2>
                
                    	<div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                    	<br />
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('admin.editProfile.submit') }}">
                    		{{ csrf_field() }}

                    		<!-- user name -->
	                    	<div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
	                            <label for="userName" class="col-md-4 control-label">User Name</label>
	                            <div class="col-md-6">
	                                <input id="userName" type="text" class="form-control" name="userName" value="{{ $user->userName }}" required autofocus>

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
	                                <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required autofocus>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
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
                    	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('admin.editPassword.submit')}}">
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