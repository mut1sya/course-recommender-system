<div class="x_content">
	<form class="form-horizontal form-label-left input_mask" method="POST" 
    @if(Auth::user()->role=='verifier')
      action="{{ route('verifier.addComment')}}">
    @endif
    @if(Auth::user()->role=='researcher')
      action="{{ route('researcher.addComment')}}">
    @endif 
    {{ csrf_field() }}
		<!-- comment -->
    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">          
        <label for="comment" class="control-label">Add a comment</label>            
        <div >
            <textarea id="comment" name="comment" required  style="height: 100px;" class="form-control" autofocus >
                {{ old('comment')}}
            </textarea>

            @if ($errors->has('comment'))
                 <span class="help-block">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
            @endif
        </div>            
      </div>
          <div>
            <input type="hidden" name="course_name" value="{{ $course->course_name }}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-primary">submit</button>
          </div>
	</form>
</div>
