@extends('layouts.researcher')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{$course->course_name}}</h2>
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
				<!-- div to show for authentiicated researchers -->
				@if(Auth::user()->role == 'researcher')
				<div>
					<div class="col-md-1">
						<a href="{{ route('course.edit',['id'=>$course->id]) }}"><button class="btn btn-primary">edit</button></a>
					</div>
					@if($course->verifier_id == null)
						<div col-md-1">
							<form action="{{ route('course.destroy',['id'=>$course->id]) }}" method="POST" >
							{{ csrf_field() }}
                            {{ method_field('DELETE')}}
                             <button class="btn btn-danger btn-fill">Delete</button>
                        </form>
                        </div>
					@endif
				</div>
				@endif
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection