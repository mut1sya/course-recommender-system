@extends('layouts.admin')

@section('content')

<div class="col-md-9 col-md-offset-1">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>column name</th>
        <th>detail</th>
      </tr>
    </thead>    
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>User Name</td>
        <td>{{ Auth::user()->userName }}</td>
      </tr>
       <tr>
         <th scope="row">2</th>
        <td>E Mail</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
      <tr>
         <th scope="row">3</th>
        <td>First Name</td>
        <td>{{ $admin->first_name }}</td>
      </tr>
      <tr>
         <th scope="row">4</th>
        <td>Last Name</td>
        <td>{{ $admin->last_name }}</td>
      </tr>
      <tr>
         <th scope="row">5</th>
        <td>Location</td>
        <td>{{ $admin->location }}</td>
      </tr>
      <tr>
         <th scope="row">6</th>
        <td>Phone Number</td>
        <td>{{ $admin->phone_number }}</td>
      </tr>
      
    </tbody>
  </table>
  <a class="btn btn-success" href="{{ route('admin.editProfile') }}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
  </div>
  

@endsection