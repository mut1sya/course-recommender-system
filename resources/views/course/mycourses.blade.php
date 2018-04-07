@extends('layouts.datatables')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="#"><i class="fa fa-search"></i> Search Course</a></li>
        <li><a href="{{ route('course.create') }}"><i class="fa fa-plus"></i> Add Course </a></li>
        <li><a href="{{ route('course.index') }}"><i class="fa fa-book"></i> My Courses</a></li>
        <li><a href="{{ route('researcher.showProfile') }}"><i class="fa fa-desktop"></i>
             Profile </a></li>
        <li><a href="#"><i class="fa fa-table"></i> Forumns </a></li>
    </ul>
@endsection

@section('content')


          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>My Courses</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>verified courses </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
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
                        @empty($verified_courses)
                          <p>no course has been verified yet</p>
                        @endempty

                        @foreach($verified_courses as $v_course)
                          <tr>
                            <td>{{ $v_course->type }}</td>
                            <td>{{ $v_course->category }}</td>
                            <td>{{ $v_course->course_name }}</td>
                            <td>{{ $v_course->duration }}</td>
                            <td>{{ $v_course->grade }}</td>
                            <td><a href="{{ route('course.show',['id'=>$v_course->id]) }}" target="_blank"><button class="btn btn-sm btn-primary">details</button></a></td>
                          </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>pending courses </h2>
                    
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
                        @empty($pending_courses)
                          <p>no course has been verified yet</p>
                        @endempty

                        @foreach($pending_courses as $p_course)
                          <tr>
                            <td>{{ $p_course->type }}</td>
                            <td>{{ $p_course->category }}</td>
                            <td>{{ $p_course->course_name }}</td>
                            <td>{{ $p_course->duration }}</td>
                            <td>{{ $p_course->grade }}</td>
                            <td><a href="{{ route('course.show',['id'=>$p_course->id]) }}" ><button class="btn btn-sm btn-primary">details</button></a></td>
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