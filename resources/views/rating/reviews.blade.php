
  <div class="x_content">
    <h2>User Reviews </h2>
    <hr>
    @if($ratings== null)
      <span class="message">
        This course has not been reviewed yet
      </span>
    @endif
    <ul class="list-unstyled msg_list">
    @foreach($ratings as $rating) 
      @if($rating->student->user->userName == Auth::user()->userName)
        <li>
          <a>
            <span class='starrr' id='star1'> {{ $rating->student->user->userName}}</span>
            <span class="time">{{ $rating->updated_at}}</span>
            </span>
            <span class="message">
              {{$rating->review }}<br>
              <button id="edit" class="btn btn-primary btn-xs">edit</button>
            </span>
          </a>
        </li> 
      @else
        <li>
          <a>
            <span class="starrr" id="star{{$rating->id}}"> {{ $rating->student->user->userName}}</span>
            <span class="time">{{ $rating->updated_at}}</span>
            </span>
            <span class="message">
              {{$rating->review }}
            </span>
          </a>
        </li>
        <script>
          $(document).ready(function(){
            $('#star{{$rating->id}}').starrr({
              rating: {{ $rating->rating }},
              readOnly: true
            });
          });
        </script>
      @endif

             
    @endforeach
    </ul>

  </div>
  {{ $ratings->links() }}
              