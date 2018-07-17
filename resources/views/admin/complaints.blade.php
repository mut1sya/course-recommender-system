
  @extends('layouts.admin')

  @section('content')

  <div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Users complaints and comments</h2>
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
                {{$complaint->message }} <br>
                <a href="{{route('admin.reply', ['id'=>$complaint->id])}}" class="btn btn-info btn-xs">reply</a>
              </span>              
            </a>
          </li>
                       
      @endforeach
      </ul>
      {{ $complaints->links() }}
    </div>
  </div>
  </div>
</div>

@endsection            