@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment View</div><br>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <div class="row">
                                <tr align="center">
                                    <div class="text-center col-md-6">
                                        <th> ID </th>
                                        <th> Chequeno </th>
                                        <th> Deposit </th>
                                        <th> cheque Date </th>
                                        <th> Cash Date </th>
                                        <th> Cash Paid to </th>
                                        <th> Branch </th>
                                        <th> Paid Via </th>
                                    </div>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            <div class="row">
                                @foreach($payment as $user)
                                <tr align="center">
                                    <div class="text-center col-md-6 col-md-offset-2">
                                        <td><b> {{++$i}} </b></td>
                                        <td> {{$user->chequeno}} </td>
                                        <td> {{$user->deposit}} </td>
                                        <td> {{$user->chequedate}} </td>
                                        <td> {{$user->cashdate}} </td>
                                        <td> {{$user->cpto}} </td>
                                        <td> {{$user->branch}} </td>
                                        <td> {{$user->paidvia}} </td>
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