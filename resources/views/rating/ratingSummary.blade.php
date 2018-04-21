                  
<div class="row">                    
  <div class="col-md-6">
    <div>
      <div class="col-md-3">
        <label>5 <span class="fa fa-star "></span></label>
      </div>                        
      <div class="progress">
        <div class="progress-bar progress-bar-warning" data-transitiongoal="{{ $ratingsSummary['percentage5'] }}"><span class="fa fa-user"></span> {{ $ratingsSummary['star5'] }}</div> 
      </div>
    </div>
    <div>
      <div class="col-md-3">
        <label>4 <span class="fa fa-star "></span></label>
      </div>                        
      <div class="progress">
        <div class="progress-bar progress-bar-warning" data-transitiongoal="{{ $ratingsSummary['percentage4'] }}"><span class="fa fa-user"></span> {{ $ratingsSummary['star4'] }}</div> 
      </div>
    </div>
    <div>
      <div class="col-md-3">
        <label>3 <span class="fa fa-star "></span></label>
      </div>                        
      <div class="progress">
        <div class="progress-bar progress-bar-warning" data-transitiongoal="{{ $ratingsSummary['percentage3'] }}"><span class="fa fa-user"></span> {{ $ratingsSummary['star3'] }}</div> 
      </div>
    </div>
    <div>
      <div class="col-md-3">
        <label>2 <span class="fa fa-star "></span></label>
      </div>                        
      <div class="progress">
        <div class="progress-bar progress-bar-warning" data-transitiongoal="{{ $ratingsSummary['percentage2'] }}"><span class="fa fa-user"></span> {{ $ratingsSummary['star2'] }}</div> 
      </div>
    </div>
    <div>
      <div class="col-md-3">
        <label>1 <span class="fa fa-star "></span></label>
      </div>                        
      <div class="progress">
        <div class="progress-bar progress-bar-warning" data-transitiongoal="{{ $ratingsSummary['percentage1'] }}"><span class="fa fa-user"></span> {{ $ratingsSummary['star1'] }}</div> 
      </div>
    </div>
    <p> total user ratings are {{ $ratingsSummary['allRatings'] }}</p>
  </div>
</div>
@include('rating.reviews')