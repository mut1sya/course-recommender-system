  <div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Course Edit Chat</h2>
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
      @foreach($comments as $comment) 
          <li>
            <a>
              <span class="image">{{ $comment->user->role }}</span>
              <span>
                <span> {{ $comment->user->userName}}</span>
                <span class="time">{{ $comment->updated_at}}</span>
              </span>
              <span class="message">
                {{$comment->comment }}
              </span>
            </a>
          </li>             
      @endforeach
      </ul>
      {{ $comments->links() }}
    </div>
    @include('comment.addComment')
  </div>
  </div>
</div>


  
              