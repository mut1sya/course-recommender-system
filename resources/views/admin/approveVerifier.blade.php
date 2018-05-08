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
        <td>First Name</td>
        <td>{{ $verifier->first_name }}</td>
      </tr>
       <tr>
         <th scope="row">2</th>
        <td>Last Name</td>
        <td>{{ $verifier->last_name }}</td>
      </tr>
      <tr>
         <th scope="row">3</th>
        <td>Phone Number</td>
        <td>{{ $verifier->phone_number }}</td>
      </tr>
      <tr>
         <th scope="row">4</th>
        <td>Location</td>
        <td>{{ $verifier->location }}</td>
      </tr>
      <tr>
         <th scope="row">5</th>
        <td>Social Media Handle</td>
        <td>{{ $verifier->social_media_handle }}</td>
      </tr>
      <tr>
         <th scope="row">6</th>
        <td>Professional Title</td>
        <td>{{ $verifier->professional_title }}</td>
      </tr>
      <tr>
         <th scope="row">7</th>
        <td>Level of Education </td>
        <td>{{ $verifier->level_of_education }}</td>
      </tr>
      <tr>
         <th scope="row">8</th>
        <td>Email</td>
        <td>{{ $verifier->user->email }}</td>
      </tr>
      <tr>
         <th scope="row">9</th>
        <td>User Name</td>
        <td>{{ $verifier->user->userName }}</td>
      </tr>
    </tbody>
  </table>
  <form action="{{ route('admin.approveVerifier') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="verifier_id" value="{{ $verifier->id }}">
    <button class="btn btn-sm btn-primary">verify</button>
  </form>
  </div>
  

@endsection