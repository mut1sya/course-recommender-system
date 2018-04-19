@extends('layouts.researcher')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="">
        <div class="x_content">
        	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('researcher.search.submit')}}">
        	{{ csrf_field() }}	
        		<div class="form-group{{ $errors->has('search_query') ? ' has-error' : '' }}">
          		<div class="col-md-8 col-md-offset-2 top_search" style="margin-top: 80px;">
            		<div class="input-group">
            	  		<input type="text" class="form-control" placeholder="Search for a course..." required autofocus name="search_query" value="{{ old('search_query') }}">
            	  		<span class="input-group-btn">
            	    		<button class="btn btn-default" type="submit">Go!</button>
            	  		</span>
            		</div>
            		@if ($errors->has('search_query'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('search_query') }}</strong>
	                        </span>
	                    @endif
            	</div>
          		</div>
          	</form>
        </div>
      </div>
    </div>
 </div>
@endsection

