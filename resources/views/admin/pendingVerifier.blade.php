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
                <h3>Verifiers</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>verifiers pending approval</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Phone Number</th>
                          <th>location</th>
                          <th>details</th>
                        </tr>
                      </thead>


                      <tbody>
                        @empty($verifiers)
                          <p>no verifiers to verify</p>
                        @endempty

                        @foreach($verifiers as $verifier)
                          <tr>
                            <td>{{ $verifier->first_name }}</td>
                            <td>{{ $verifier->last_name }}</td>
                            <td>{{ $verifier->phone_number }}</td>
                            <td>{{ $verifier->location }}</td>
                            <td>
                              <a href="{{ route('admin.showVerifier',['id'=>$verifier->id]) }}" >
                                <button class="btn btn-primary">show</button>
                              </a>
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


        @endsection