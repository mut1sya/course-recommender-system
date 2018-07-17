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
                <h3>To add a new Rule  click button below</h3>
                <!-- <a href="#" class="btn btn-lg btn-success">+ Add a New Industry</a> -->
                <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#addModal">+ Add a New Rule</button>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>These rules will be used by Verifiers when verifying courses</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th class="hidden">#</th>
                          <th> Rule</th>
                          <th>Actions</th>
                        </tr>
                      </thead>


                      <tbody>
                        @empty($rules)
                          <p>no Rules present</p>
                        @endempty
                        @php
                        $counter=0;
                        @endphp
                        @foreach($rules as $rule)
                          <tr>
                            <td class="hidden">{{$rule->id}}</td>
                            <td>{{++$counter}}</td>
                            <td>{!! $rule->rule !!}</td>
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
<form method="POST" action="{{ route('admin.verifierRule.add')}}">
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
          <!-- rule name -->  
          <div class="row">
            <div class="form-group{{ $errors->has('rule') ? 'has-error' : '' }}">                        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea id="rule" name="rule" required  style="height: 250px;" class="form-control" autofocus >
                  {{ old('rule') }}                            
                </textarea>
                @if ($errors->has('rule'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rule') }}</strong>
                    </span>
                 @endif
              </div>
            </div>
          </div>
                 
          
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
<form method="POST" action="{{ route('admin.verifierRule.edit')}}">
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
            <!-- rule name -->  
          <div class="row">
            <input type="hidden" name="rule_id" id="rule_id" value="">
            <div class="form-group{{ $errors->has('edit_rule') ? 'has-error' : '' }}">                        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea id="edit_rule" name="edit_rule" required  style="height: 250px;" class="form-control" autofocus >
                     <span id="rule_data"></span>                         
                </textarea>
                @if ($errors->has('edit_rule'))
                    <span class="help-block">
                        <strong>{{ $errors->first('edit_rule') }}</strong>
                    </span>
                 @endif
              </div>
            </div>
          </div>      
          
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
<form method="POST" action="{{ route('admin.verifierRule.delete')}}">
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
          <input type="hidden" name="delete_rule_id" value="" id="delete_rule_id" >
          <span id="modal_contents"></span>
          
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
<script type="text/javascript" src="{{ asset('gentelellaAssets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  //tiny mce config
  var editor_config = {
      path_absolute : "{{ URL::to('/') }}/",
      selector : "textarea",
      theme : "modern", 
      plugins: [
        "advlist autolink lists link  charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
        if (type = 'image') {
          cmsURL = cmsURL+'&type=Images';
        } else {
          cmsUrl = cmsURL+'&type=Files';
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizeble : 'yes',
          close_previous : 'no'
        });
      }
    };

    tinymce.init(editor_config);
</script>      
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#datatable-responsive').DataTable();
    $('#datatable-responsive tbody').on('click', 'tr', function () {

        var data = table.row( this ).data();
        tinyMCE.activeEditor.setContent(data[2]);
        $(".modal-body #rule_id").val(data[0]);
        $(".modal-body #delete_rule_id").val(data[0]);
        $(".modal-body #modal_contents").html(data[2]);
    } );
});
</script>
@endsection