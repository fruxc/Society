@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Member Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in as <strong> {{ Auth::user()->name }} </strong>!
                    <br><br>
                    <a class="btn btn-success" href="{{route('maintenance')}}">
                        {{ __('View Maintenance') }}
                    </a>&nbsp&nbsp&nbsp&nbsp&nbsp

                    <a class="btn btn-success" href="{{route('complaint')}}">
                        {{ __('Add Complaint') }}
                    </a>&nbsp&nbsp&nbsp&nbsp&nbsp

                    <a href="{{route('staff')}}" class="btn btn-success">
                        {{ __('View Staff') }}
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection