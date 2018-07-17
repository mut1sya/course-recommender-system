@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">
    	<li><a href="{{ route('verifier.rules') }}"><i class="fa fa-shield"></i> View Rules</a></li>
        <li><a href="{{ route('verifier.pendingCourses') }}"><i class="fa fa-folder"></i> Pending Courses </a></li>
        <li><a href="{{ route('verifier.verifying') }}"><i class="fa fa-folder-open"></i> Verifying </a></li>  
        <li><a href="{{ route('verifier.showComplaint') }}"><i class="fa fa-envelope"></i>Complaints </a></li> 
        <li><a href="{{ route('verifier.showProfile') }}"><i class="fa fa-cog"></i> Profile </a></li>     
    </ul>
@endsection