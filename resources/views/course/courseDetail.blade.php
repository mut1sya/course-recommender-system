@section('courseDetails')
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

				
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection