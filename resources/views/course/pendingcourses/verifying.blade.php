@extends('layouts.datatables')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('verifier.rules') }}"><i class="fa fa-shield"></i> View Rules</a></li>
        <li><a href="{{ route('verifier.pendingCourses') }}"><i class="fa fa-folder"></i> Pending Courses </a></li>
        <li><a href="{{ route('verifier.verifying') }}"><i class="fa fa-folder-open"></i> Verifying </a></li>
        <li><a href="{{ route('verifier.showComplaint') }}"><i class="fa fa-envelope"></i>Complaints </a></li> 
        <li><a href="{{ route('verifier.showProfile') }}"><i class="fa fa-cog"></i>Profile </a></li>       
    </ul>
@endsection

@section('content')


          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Courses</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>courses pending approval</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th> Type</th>
                          <th>Category</th>
                          <th>Course Name</th>
                          <th>Duration</th>
                          <th>grade</th>
                          <th>details</th>
                        </tr>
                      </thead>


                      <tbody>
                        @empty($courses)
                          <p>no courses to verify</p>
                        @endempty

                        @foreach($courses as $course)
                          <tr>
                            <td>{{ $course->type }}</td>
                            <td>{{ $course->category }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->duration }}</td>
                            <td>{{ $course->grade }}</td>
                            <td>
                              <a href="{{ route('verifier.showVerifying',['id'=>$course->id]) }}" >
                                <button class="btn btn-primary">show</button>
                              </a>
                            </td>
                          </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        @endsection