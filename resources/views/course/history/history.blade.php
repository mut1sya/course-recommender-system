  <div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Course Edit History</h2>
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
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Time </th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $counter = 1;
           ?>
          @foreach($histories as $history)
          <tr>
            <th scope="row">{{ $counter }}</th>
            <td>{{ $history->updated_at }}</td>
            <td>{{ $history->message }}</td>
          </tr>
          <?php 
          $counter++;
           ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>


  
              