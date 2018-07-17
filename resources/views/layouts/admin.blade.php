@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">  
        <li><a href="{{ route('admin.pendingVerifiers') }}"><i class="fa fa-users"></i> Verifiers </a></li>
        <li><a href="{{ route('admin.add') }}"><i class="fa fa-plus"></i> Add Admin </a></li> 
        <li><a href="{{ route('admin.viewComplaints') }}"><i class="fa fa-envelope"></i> View Complaints </a></li> 
        <li><a href="{{ route('admin.industries.view') }}"><i class="fa fa-tasks"></i> Industries </a></li>
        <li><a href="{{ route('admin.researcherRules.view') }}"><i class="fa fa-align-justify"></i> Researcher Rules </a></li>
        <li><a href="{{ route('admin.verifierRules.view') }}"><i class="fa fa-tasks"></i> Verifier Rules </a></li>
        <li><a href="{{ route('admin.showProfile') }}"><i class="fa fa-cog"></i> Profile </a></li> 
    </ul>
@endsection