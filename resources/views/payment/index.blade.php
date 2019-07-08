@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Payment</div><br>
                <div class="col-sm-2">
                  <a class="btn btn-sm btn-success" href="{{route('payment.create')}}">Create Payment</a>
                </div>
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
                            <th> Cheque Date </th>
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
                               @foreach($payment as $user)
                                <div class="row">
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
                                    <td> {{$user->paidby}} </td>
                                    <td>
                                      <form action="{{route('payment.destroy',$user->id)}}" method="post">
                                        <a class="btn btn-sm btn-success" href="{{route ('payment.show',$user->id)}}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{route ('payment.edit',$user->id)}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                  </td>
                                  </div>
                                </tr>
                              </div>
                               @endforeach
                         </tbody>
                      </table>
                      {!!$payment ->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
