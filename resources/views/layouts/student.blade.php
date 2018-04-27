@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('student.search') }}"><i class="fa fa-search"></i> Search </a></li>
        <li><a href="{{ route('student.recommendedCourses') }}"><i class="fa fa-edit"></i> Recommended </a></li>
        <li><a href="{{ route('student.showProfile') }}"><i class="fa fa-desktop"></i>
             Profile </a></li>        
    </ul>
@endsection
