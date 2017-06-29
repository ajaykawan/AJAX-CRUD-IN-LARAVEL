@extends('layouts.app')
@section('title','Home')
@section('breadcrumb')
    <section class="content-header">
        <h1>
           Home Page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <a href="{{route('user.logout')}}"> Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
