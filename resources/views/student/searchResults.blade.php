@extends('layouts.student')

@section('content')
        <!-- page content -->
          <div class="row">
            <div class="page-title">
              <div class="title_left">
              	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('student.search.submit')}}">
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
            <div class="">
              <div class="x_content">
                <div class="col-md-9 col-md-offset-1">
    				@foreach ($courses as $course)
    				<div class="row col-md-10 well">
    					<div class="text-center">
    						<a href="{{ route('student.viewCourse',['id'=>$course->id]) }}" class="badge badge-info">{{ $course->course_name }}</a>
    					</div>
             
    					<div class="mx-auto">
    						<p>this course is in <span>{{ $course->category }}</span> category and in <span>{{ $course->type }}</span> type
    							it takes around <span>{{ $course->duration}}</span> years to complete. the common grade to apply for this course is
    							<span>{{ $course->grade}}</span>for more details click the the title to
    							view it in details
    						</p>
    					</div>
               @if($course->verified == 0)
                  <span class="badge"> pending verification</span>                
              @endif
    					

    				</div>
    				 
    				@endforeach
				</div>

				
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection

