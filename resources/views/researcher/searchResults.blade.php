@extends('layouts.researcher')

@section('content')
        <!-- page content -->
          <div class="row">
            <div class="page-title">
              <div class="title_left">
              	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('researcher.search.submit')}}">
        			{{ csrf_field() }}	
        			<div class="form-group{{ $errors->has('search_query') ? ' has-error' : '' }}">
                		<div class="col-md-8 col-sm-8 col-xs-12 form-group  top_search">
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
            <div class="ln_solid"></div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
          <div class="col-md-12">
              <div class="x_content">
                <div class="col-md-9 col-md-offset-1">
          				@foreach ($courses as $course)
          				  <div class="row col-md-10 well">
          				    <div class="text-center">
                        <form action="{{ route('researcher.viewCourse') }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="course_id" value="{{ $course->id }}">
                          <button class="btn btn-default">{{ $course->course_name }}</button>
                        </form>
          				      <a href="{{ route('researcher.viewCourse',['id'=>$course->id]) }}" class="badge badge-info"></a>
          				    </div>
                   
          				    <div class="mx-auto">
          				      <p>
                          this course is in <span>{{ $course->category }}</span> category and in <span>{{ $course->type }}</span> type
          						    it takes around <span>{{ $course->duration}}</span> years to complete. the common grade to apply for this course is
          						    <span>{{ $course->grade}}</span>for more details click the the title to	view it in details
          						  </p>
          				    </div>       					
                    </div>
          				@endforeach
                </div>
                
              </div>
          </div>
        </div>
        <!-- /page content -->

@endsection

