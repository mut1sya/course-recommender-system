

@include('rating.ratingSummary')
@if($course_rated)
  @include('rating.courseRated')
@else
  @include('rating.courseNotRated')
@endif
@if(session('status'))
 <script type="text/javascript">
     alert('{{ Session::get('status')}}');
 </script>                                
 @endif