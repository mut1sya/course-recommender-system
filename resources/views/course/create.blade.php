@extends('layouts.researcher')

@section('content')
    

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add a course</h2>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left"  method="POST" action="{{ route('course.store') }}">
                      {{ csrf_field() }}
                      <span class="section">Course Article</span>
                      <!-- course description -->
                        <div class="form-group{{ $errors->has('description') ? 'has-error' : '' }}">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea id="description" name="description" required  style="height: 500px;" class="form-control" value="{{ old('description') }}" autofocus >
                            
                          </textarea>
                          @if ($errors->has('description'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>

                      <span class="section">Course Info</span>


                      <!-- type -->
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                              <label for="type" class="col-md-4 control-label">Type</label>
                              <div class="col-md-6">
                                <select name="type" class="form-control" id="type" required autofocus>
                                    <option selected="selected"> select type</option>
                                    <option value="certificate"> certificate</option>
                                    <option value="diploma"> diploma</option>
                                    <option value="degree"> degree</option>
                                </select>
                                @if ($errors->has('type'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('type') }}</strong>
                                      </span>
                                  @endif
                            </div>
                          </div>
                        

                        <!-- category -->
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                              <label for="category" class="col-md-4 control-label">Category</label>
                              <div class="col-md-6">
                                <select name="category" class="form-control" id="category" required autofocus>
                                    <option selected="selected"> Select Category</option>
                                    <option value="Art and Design"> Art and Design</option>
                                    <option value="Engineering and Technology"> Engineering and Technology</option>
                                    <option value="Science and Mathematics"> Science and Mathematics</option>
                                    <option value="Business Management"> Business Management</option>
                                    <option value="Computer Science and IT"> Computer Science and IT</option>
                                    <option value="Medical and Pharmacy"> Medical and Pharmacy</option>
                                    <option value="Education and Teaching"> Education and Teaching</option>
                                    <option value="Theology and Religion"> Theology and Religion</option>
                                    <option value="Social Sciences"> Social Sciences</option>
                                    <option value="Tourism and Hospitality"> Tourism and Hospitality</option>
                                    <option value="Architecture"> Architecture</option>
                                    <option value="Law"> Law</option>
                                    <option value="Accounting and Finance"> Accounting and Finance</option>
                                    <option value="Media and Advertising"> Media and Advertising</option>
                                    <option value="Agriculture"> Agriculture</option>
                                    <option value="Beauty and Fashion"> Beauty and Fashion</option>
                                </select>
                                @if ($errors->has('category'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('category') }}</strong>
                                      </span>
                                  @endif
                            </div>
                          </div>

                       <!-- course name -->
                        <div class="form-group{{ $errors->has('course_name') ? ' has-error' : '' }}">
                              <label for="course_name" class="col-md-4 control-label">Course Name</label>
                              <div class="col-md-6">
                                  <input id="course_name" type="text" class="form-control" name="course_name" value="{{ old('course_name') }}" required autofocus>

                                  @if ($errors->has('course_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('course_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                      
                        <!-- duration -->
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                              <label for="duration" class="col-md-4 control-label">Duration</label>
                              <div class="col-md-6">
                                  <input id="duration" type="text" class="form-control" name="duration" value="{{ old('duration') }}" required autofocus>

                                  @if ($errors->has('duration'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('duration') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                       <!-- grade -->
                        <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                              <label for="grade" class="col-md-4 control-label">Minimum Grade</label>
                              <div class="col-md-6">
                                  <input id="grade" type="text" class="form-control" name="grade" value="{{ old('grade') }}" required autofocus>

                                  @if ($errors->has('grade'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('grade') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
         
        <!-- tinymce -->
        <script type="text/javascript" src="{{ asset('gentelellaAssets/tinymce/tinymce.min.js') }}"></script>
        <script>
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

        <!-- /page content -->


@endsection