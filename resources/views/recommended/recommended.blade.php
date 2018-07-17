<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Similar Courses</h2>
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
                @foreach ($courses as $course)
                <div  class="col-md-6 well well-lg">
                    <div class="text-center">
                        <a style="word-break: break-all!important;" href="{{ route('student.viewCourse',['id'=>$course[0]->id]) }}" class="btn btn-link btn-xs">{{ $course[0]->course_name }}</a>
                    </div>
             
                    <div class="mx-auto">
                        <p>this course is in <span>{{ $course[0]->category }}</span> category and in <span>{{ $course[0]->type }}</span> type
                            it takes around <span>{{ $course[0]->duration}}</span> years to complete. the common grade to apply for this c is
                            <span>{{ $course[0]->grade}}</span>for more details click the the title to
                            view it in details
                        </p>
                    </div>
              
                </div>
                @endforeach
            </div>          
        </div>      
    </div>  
</div>