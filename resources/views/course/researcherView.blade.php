@extends('layouts.researcher')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{$course->course_name}}</h2>
				<ul class="nav navbar-right panel_toolbox">
	          		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
	          		<li class="dropdown">
	            		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
	            		<ul class="dropdown-menu" role="menu">
	             			<li><a href="#">Settings 1</a></li>
	              			<li><a href="#">Settings 2</a></li>
	            		</ul>
	          		</li>
	          		<li><a class="close-link"><i class="fa fa-close"></i></a></li>
        		</ul>
        		<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					{!! $course->description !!}

				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h4>brief summary of the course</h4>
						<table class="table table-bordered">
							<tr>
								<td>Course Name</td>
								<td>{{ $course->course_name}}</td>
							</tr>
							<tr>
								<td>Course Category</td>
								<td>{{ $course->category }}</td>
							</tr>
							<tr>
								<td>Course Type</td>
								<td>{{ $course->type }}</td>
							</tr>
							<tr>
								<td>Course Duration</td>
								<td>{{ $course->duration }}</td>
							</tr>
							<tr>
								<td>minimum grade</td>
								<td>{{ $course->grade }}</td>
							</tr>
							
						</table>
					</div>
				</div>
				<hr>									
			</div>			
		</div>		
	</div>	
</div>
@include('rating.researcherRating')
@include('course.history.history')
<div>
	<form action="{{ route('researcher.setPendingCourse') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <button class="btn btn-sm btn-primary">Edit</button>
    </form>
</div>
@endsection