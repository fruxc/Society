@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Maintenance</div><br>
                <div class="col-sm-2">
                  <a class="btn btn-sm btn-success" href="{{route('maintenance.create')}}">Create Maintenance</a>
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
                            <th> Expenses </th>
                            <th> Amount </th>
                          </div>
                          </tr>
                        </div>
                        </thead>
                          <tbody>
                               @foreach($maintenance as $user)
                                <div class="row">
                                <tr align="center">
                                  <div class="text-center col-md-6 col-md-offset-2">
                                    <td><b> {{++$i}} </b></td>
                                    <td> {{$user->expenses}} </td>
                                    <td> {{$user->amount}} </td>
                                    <td>
                                      <form action="{{route('maintenance.destroy',$user->id)}}" method="post">
                                        <a class="btn btn-sm btn-success" href="{{route ('maintenance.show',$user->id)}}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{route ('maintenance.edit',$user->id)}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </tr>
                              </div>
                               @endforeach
                         </tbody>
                      </table>
<!-- 
                      <a class="btn btn-success" href="{{route('payment.index')}}">
                          {{ __('Proceed to payment') }}
                      </a> -->
                      {!!$maintenance ->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
