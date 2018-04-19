@extends('layouts.researcher')

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
        <td>{{Auth::user()->userName}}</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Email Address</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Telephone  Number</td>
        <td>{{ $researcher->phone_number }}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Social Media Handle</td>
        <td>{{ $researcher->social_media_handle }}</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Location</td>
        <td>{{ $researcher->location }}</td>
      </tr>
    </tbody>
  </table>
  <a class="btn btn-success" href="{{ route('researcher.editProfile') }}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
  </div>


@endsection