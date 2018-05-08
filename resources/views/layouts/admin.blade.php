@extends('layouts.master')

@section('navigationLinks')
    <ul class="nav side-menu">
        <li><a href="{{ route('admin.showProfile') }}"><i class="fa fa-desktop"></i> Profile </a></li>   
        <li><a href="{{ route('admin.pendingVerifiers') }}"><i class="fa fa-desktop"></i> Verifiers </a></li>    
    </ul>
@endsection