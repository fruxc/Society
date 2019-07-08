@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maintenance for <strong> {{ Auth::user()->name }} </strong>!</div><br>
                <div class="col-sm-2">
                    <a href="{{ url('users/maintenance/pdf') }}" class="btn btn-danger">Convert into PDF</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                      Name : {{ Auth::user()->name }}
                    </div><div>
                      Flat : {{ Auth::user()->flat }}
                    </div><div>
                      Wing : {{ Auth::user()->wing }}
                    </div><div>
                      Role : {{ Auth::user()->role }}
                    </div><div>
                      Email : {{ Auth::user()->email }}
                    </div><div>
                      Phone : {{ Auth::user()->phone }}
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <div class="row">
                                <tr align="center">
                                    <div class="text-center col-md-6">
                                        <th> ID </th>
                                        <th> Expenses </th>
                                        <th> Amount </th>
                                    </div>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            <div class="row">
                                @foreach($maintenance as $user)
                                <tr align="center">
                                    <div class="text-center col-md-6 col-md-offset-2">
                                        <td><b> {{++$i}} </b></td>
                                        <td> {{$user->expenses}} </td>
                                        <td> {{$user->amount}} </td>
                                        <td></td>
                                    </div>
                                </tr>
                                @endforeach
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
