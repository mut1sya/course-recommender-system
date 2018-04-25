@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('researcher.search') }}"><i class="fa fa-search"></i> Search Course</a></li>
        <li><a href="{{ route('course.create') }}"><i class="fa fa-plus"></i> Add Course </a></li>
        <li><a href="{{ route('course.index') }}"><i class="fa fa-book"></i> My Courses</a></li>
        <li><a href="{{ route('researcher.showProfile') }}"><i class="fa fa-desktop"></i>
             Profile </a></li>
    </ul>
@endsection