<div id="editreview" style="display: none;">
	<h5>Rate the course:</h5>
	<div class='starrr' id='star2'>
	  rate how relevant this course was
	</div>
	<div>
	  <span class='your-choice-was' style='display: none;'>
	    Your rating was <span class='choice'></span>.
	  </span>
	  <span class="error" style="display: none;">
	    <span>there was an error in please ensure you select</span>
	  </span>
	</div>
	@if ($errors->has('rating'))
		<span class="help-block">
		  	<strong>{{ $errors->first('rating') }}</strong>
		</span>        
	@endif
	<form class="form-horizontal form-label-left input_mask" method="POST" action="{{route('student.rate.edit.submit')}}" id="myForm">
    	{{ csrf_field() }}
	   <!-- review -->
	    <label>give us a review</label>
	    <div class="form-group{{ $errors->has('review') ? 'has-error' : '' }}">	                       
	    	<div class="col-md-6 col-sm-12 col-xs-12">
	    		<textarea id="review" name="review" style="height: 200px;" class="form-control"  autofocus >
	            	{{ $myRating->review }}            
	        	</textarea>
		        @if ($errors->has('review'))
		            <span class="help-block">
		                <strong>{{ $errors->first('review') }}</strong>
		            </span>
		        @endif
	      	</div>
	    </div>  
	    <input id="rating" type="hidden" class="form-control" name="rating" value="{{ old('rating') }}" >
	    <input type="hidden" name="course_id" value="{{ $course->id}}">
	    <input type="hidden" name="student_id" value="{{ $student_id }}">
	    <input type="hidden" name="rating_id" value="{{$myRating->id}}">
	  	<button id="send" onclick="event.preventDefault();"  class="btn btn-primary">submit</button>
	  	<button id="cancel" onclick="event.preventDefault();"  class="btn btn-danger">cancel</button>
	</form>
</div>
<script>
$(document).ready(function(){
   $('#star1').starrr({
 		rating: {{ $myRating->rating }},
 		readOnly: true
	});
   $('#edit').click(function(){
   		$('#editreview').show();
   		$('#previousRating').remove();
   });

   $('#star2').starrr({
   		rating: {{$myRating->rating }},
   		change: function(e, value){
    		if (value) {
      			$('.your-choice-was').show();
      			$('.error').hide();
      			$('.choice').text(value);
      			$('#rating').val(value);
    		} else {
      			$('.your-choice-was').hide();
      			$('.error').hide();
    		}
  		}		
	});

   
   $('#send').click(function(){      
    	if($('#rating').val()!==''){
        	$('#myForm').submit();
      	}else {
        	$('.error').show();
      	}
   });

   $('#cancel').click(function(){      
       $('#editreview').hide(); 	
   });
});

</script>