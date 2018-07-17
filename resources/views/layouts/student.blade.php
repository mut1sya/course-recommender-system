@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('student.search') }}"><i class="fa fa-search"></i> Search </a></li>
        <li><a href="{{ route('student.recommendedCourses') }}"><i class="fa fa-star"></i> Recommended </a></li>
        <li><a href="{{ route('student.showComplaint')}}"><i class="fa fa-envelope"></i>Complaints </a></li>
        <li><a href="{{ route('student.showProfile') }}"><i class="fa fa-cog"></i>Profile </a></li>         
    </ul>
@endsection
 