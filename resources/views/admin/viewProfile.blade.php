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
        <td>{{ $user->userName }}</td>
      </tr>
       <tr>
         <th scope="row">2</th>
        <td>E Mail</td>
        <td>{{ $user->email }}</td>
      </tr>
      
    </tbody>
  </table>
  <a class="btn btn-success" href="{{ route('admin.editProfile') }}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
  </div>
  

@endsection