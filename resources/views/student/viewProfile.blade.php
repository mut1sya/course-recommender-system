@extends('layouts.student')

@section('content')
<div class="right_col" role="main">
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
        <td>{{ $student->first_name }}</td>
      </tr>
       <tr>
         <th scope="row">2</th>
        <td>Last Name</td>
        <td>{{ $student->last_name }}</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>User Name</td>
        <td>{{Auth::user()->userName}}</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Email Address</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Telephone  Number</td>
        <td>{{ $student->phone_number }}</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Date of Birth</td>
        <td>{{ $student->dob }}</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Gender</td>
        <td>{{ $student->gender }}</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Location</td>
        <td>{{ $student->location }}</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>KCSE Grade</td>
        <td>{{ $student->kcse_grade }}</td>
      </tr>
      <tr>
        <th scope="row">10</th>
        <td>KCSE Points</td>
        <td>{{ $student->kcse_points }}</td>
      </tr>
      <tr>
        <th scope="row">11</th>
        <td>High School</td>
        <td>{{ $student->highschool }}</td>
      </tr>
      <tr>
        <th scope="row">12</th>
        <td>Year completed highschool</td>
        <td>{{ $student->year_completed }}</td>
      </tr>
      <tr>
        <th scope="row">13</th>
        <td>Personality</td>
        <td>{{ $student->personality }}</td>
      </tr>
      <tr>
        <th scope="row">14</th>
        <td>Hobbies</td>
        <td>{{ $student->hobbies }}</td>
      </tr>
      <tr>
        <th scope="row">15</th>
        <td>Skills</td>
        <td>{{ $student->skills }}</td>
      </tr>
      <tr>
        <th scope="row">16</th>
        <td>Interests</td>
        <td>{{ $student->interests }}</td>
      </tr>
    </tbody>
  </table>
  <a class="btn btn-success" href="{{ route('student.editProfile') }}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
  </div>
  </div>

@endsection