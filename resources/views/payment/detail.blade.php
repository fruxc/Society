@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Payment</div><br>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <table class="table table-hoard">
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
                            <th> Paid By </th>
                          </div>
                          </tr>
                        </div>
                        </thead>
                          <tbody>
                                <div class="row">
                                <tr align="center">
                                  <div class="text-center col-md-6 col-md-offset-2">
                                    <td><b> {{1}} </b></td>
                                    <td> {{$payment->chequeno}} </td>
                                    <td> {{$payment->deposit}} </td>
                                    <td> {{$payment->chequedate}} </td>
                                    <td> {{$payment->cashdate}} </td>
                                    <td> {{$payment->cpto}} </td>
                                    <td> {{$payment->branch}} </td>
                                    <td> {{$payment->paidvia}} </td>
                                    <td> {{$payment->paidby}}</td>
                                  </div>
                                </tr>
                              </div>
                         </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
