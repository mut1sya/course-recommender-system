@extends('layouts.datatables')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('admin.pendingVerifiers') }}"><i class="fa fa-users"></i> Verifiers </a></li>
        <li><a href="{{ route('admin.add') }}"><i class="fa fa-plus"></i> Add Admin </a></li> 
        <li><a href="{{ route('admin.viewComplaints') }}"><i class="fa fa-envelope"></i> View Complaints </a></li> 
        <li><a href="{{ route('admin.industries.view') }}"><i class="fa fa-tasks"></i> Industries </a></li>
        <li><a href="{{ route('admin.researcherRules.view') }}"><i class="fa fa-align-justify"></i> Researcher Rules </a></li>
        <li><a href="{{ route('admin.verifierRules.view') }}"><i class="fa fa-tasks"></i> Verifier Rules </a></li>
        <li><a href="{{ route('admin.showProfile') }}"><i class="fa fa-cog"></i> Profile </a></li>        
    </ul>
@endsection

@section('content')


          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>To add a new industry  click button below</h3>
                <!-- <a href="#" class="btn btn-lg btn-success">+ Add a New Industry</a> -->
                <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#addModal">+ Add a New Industry</button>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>These industries appear when students are creating profile or updating</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="hidden">Id</th>
                          <th>#</th>
                          <th> Industry</th>
                          <th>Actions</th>
                        </tr>
                      </thead>


                      <tbody>
                        @empty($industries)
                          <p>no industries present</p>
                        @endempty

                        @php
                        $counter=0;
                        @endphp
                        @foreach($industries as $industry)
                          <tr>
                            <td class="hidden">{{$industry->id}}</td>
                            <td>{{++$counter}}</td>
                            <td>{{ $industry->industry_name }}</td>
                            <td>
                              
                              <div class="col-md-2">
                              <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#editModal">edit</button>
                              </div>
                              <div class="col-md-2">
                                <!-- delete -->
                                <button type="button" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#deleteModal">Delete</button>
                              </div>
                            </td>
                          </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<div>
  <div>
              <!-- add modal -->
<form method="POST" action="{{ route('admin.industry.add')}}">
  {{ csrf_field() }}
  <div id="addModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Add Modal</h4>
         </div>
        <div class="modal-body">

          <div class="row">
            <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                <label for="industry" class="col-md-4 control-label">Industry Name</label>
                <div class="col-md-6">
                    <input id="industry" type="text" class="form-control" name="industry" required autofocus>

                    @if ($errors->has('industry'))
                        <span class="help-block">
                             <strong>{{ $errors->first('industry') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
          </div>
          <!-- Industry name -->         
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        </div>
      </div>
    </div>
</form>
</div>
  <div>
              <!-- edit modal -->
<form method="POST" action="{{ route('admin.industry.edit')}}">
  {{ csrf_field() }}
  <div id="editModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit Modal</h4>
         </div>
        <div class="modal-body">

          <div class="row">
            <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                <label for="industry" class="col-md-4 control-label">Industry Name</label>
                <div class="col-md-6">
                    <input id="industry" type="text" class="form-control" name="industry"  value="" required autofocus>
                    <input id="industry_id" type="hidden" name="industry_id" value="">
                    @if ($errors->has('industry'))
                        <span class="help-block">
                             <strong>{{ $errors->first('industry') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
          </div>
          <!-- Industry name -->         
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        </div>
      </div>
    </div>
</form>

  </div>  
                <!-- delete modal -->
<form method="POST" action="{{ route('admin.industry.delete')}}">
  {{ csrf_field() }}
  <div id="deleteModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Delete Modal</h4>
         </div>
        <div class="modal-body">
          <h2>Are you sure you want to delete this industry</h2>
          <input type="text" name="industry1" value="" id="industry1" disabled >
          
          <!-- Industry name -->         
          <input type="hidden" name="industry_id1" value="" id="industry_id1">
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
             <button type="submit" class="btn btn-danger">Yes</button>
          </div>

        </div>
      </div>
    </div>
</form>

  </div>  

</div> 
<script src="{{ asset('gentelellaAssets/jquery/dist/jquery.min.js') }}"></script>         
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#datatable-responsive').DataTable();
    $('#datatable-responsive tbody').on('click', 'tr', function () {

        var data = table.row( this ).data();
        $(".modal-body #industry").val(data[2]);
        $(".modal-body #industry_id").val(data[0]);
        $(".modal-body #industry1").val(data[2]);
        $(".modal-body #industry_id1").val(data[0]);
    } );
});
</script>
        @endsection