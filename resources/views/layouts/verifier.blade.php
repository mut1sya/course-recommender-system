@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('verifier.pendingCourses') }}"><i class="fa fa-book"></i> Pending Courses </a></li>
        <li><a href="{{ route('verifier.showProfile') }}"><i class="fa fa-desktop"></i>
             Profile </a></li>
        <li><a href="#"><i class="fa fa-table"></i> Forumns </a></li>
        
    </ul>
@endsection