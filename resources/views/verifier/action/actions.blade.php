<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Approve this Course</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('verifier.saveCourse')}}">
          {{ csrf_field() }}
          <!-- commit message -->
          <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label for="message" class="control-label">Add a message</label>
            <div>
              <textarea id="message" name="message" required  style="height: 75px;" class="form-control" autofocus >
                    {{ old('message') }}
              </textarea>
              @if ($errors->has('message'))
                <span class="help-block">
                  <strong>{{ $errors->first('message') }}</strong>
                </span>
                @endif
            </div>
          </div>
          <div >
            <input type="hidden" name="save_course_id" value="{{ $course->id}}">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>       
      </div>
    </div>
  </div>

  <div class="col-md-6 col-xs-12">
   <div class="x_panel">
    <div class="x_title">
        <h2>Decline this Course</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
        <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('verifier.declineCourse')}}">
          {{ csrf_field() }}
          <!-- decline message -->
          
            <label class=""><br>if you wish to stop verifying this course and let it be allocated to another verifier you can drop it here<br><br><br></label>
          <div >
            <input type="hidden" name="decline_course_id" value="{{ $course->id}}">
            <button type="submit" class="btn btn-danger">Stop verifying</button>
          </div>
        </form>       
    </div>
  </div>
</div>
</div>