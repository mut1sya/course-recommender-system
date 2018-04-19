<div class="col-md-10">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-align-left"></i> Ratings Summary</h2>
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
                </div>
              </div>
            </div>
            <div class="clearfix"></div>