
  @extends('layouts.admin')

  @section('content')

  <div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Respond to message</h2>
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
      <div class="row">
        <span class="col-md-3 col-md-offset-1">{{$user_name}}</span>
        <span class="col-md-3 col-md-offset-1">{{$role}}</span>
        <span class="col-md-3 col-md-offset-1">{{$complaint->created_at}}</span>
      </div>
      <div>
        <p>{{$complaint->message}}</p>
        <form class="form-horizontal form-label-left input_mask" method="POST" action="{{ route('admin.response.add')}}">
         {{ csrf_field() }}
         <!-- response -->
          <div class="form-group{{ $errors->has('response') ? ' has-error' : '' }}">                      
            <div >
              <textarea id="response" name="response" required  style="height: 100px;" class="form-control" autofocus >
                {{ old('response')}}
              </textarea>

               @if ($errors->has('response'))
                 <span class="help-block">
                    <strong>{{ $errors->first('response') }}</strong>
                </span>
               @endif
            </div>            
          </div>
          <div>
            <input type="hidden" name="id" value="{{$complaint->id}}" />
            <button type="submit" class="btn btn-primary">submit</button>
          </div>
  </form>
      </div>
    </div>
  </div>
  </div>
</div>

@endsection            