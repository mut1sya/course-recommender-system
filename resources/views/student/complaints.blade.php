  @extends('layouts.student')

  @section('content')

  <div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Complaint or Comment just share here</h2>
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
      <ul class="list-unstyled msg_list">
      @foreach($complaints as $complaint) 
          <li>
            <a>
              <span class="image">{{ $complaint->user->role }}</span>
              <span>
                <span> {{ $complaint->user->userName}}</span>
                <span class="time">{{ $complaint->created_at}}</span>
              </span>
              <span class="message">
                {{$complaint->message }}
              </span>
            </a>
          </li>
          @if($complaint->response != null)
            <li>
            <a>
              <span class="image">Admin</span>
              <span>
                <span class="time">{{ $complaint->updated_at}}</span>
              </span>
              <span class="message">
                {{$complaint->response }}
              </span>
            </a>
          </li>
          @endif             
      @endforeach
      </ul>
      {{ $complaints->links() }}
    </div>
    <!-- add complaint -->
    <div class="x_content">
  <form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('student.complaint.add')}}">
    {{ csrf_field() }}
    <!-- complain -->
    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">                      
        <div >
            <textarea id="message" name="message" required  style="height: 100px;" class="form-control" autofocus >
                {{ old('message')}}
            </textarea>

            @if ($errors->has('message'))
                 <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif
        </div>            
      </div>
          <div>
            <button type="submit" class="btn btn-primary">submit</button>
          </div>
  </form>
</div>
  </div>
  </div>
</div>

@endsection            