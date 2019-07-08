@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Complaints</div><br>
                <div class="col-sm-2">
                  <a class="btn btn-sm btn-success" href="{{route('complaint.create')}}">Create Complaint</a>
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
                            <th> Description </th>
                            <th> Actions </th>
                            <th> Complaint By </th>
                            <th> Response </th>
                          </div>
                          </tr>
                        </div>
                        </thead>
                          <tbody>
                               @foreach($complaint as $user)
                                <div class="row">
                                <tr align="center">
                                  <div class="text-center col-md-6 col-md-offset-2">
                                    <td><b> {{++$i}} </b></td>
                                    <td> {{$user->Description}} </td>
                                    <td> {{$user->Actions}} </td>
                                    <td> {{$user->complaintby}} </td>
                                    <td> {{$user->response}} </td>
                                    <td>
                                      <form action="{{route('complaint.destroy',$user->id)}}" method="post">
                                        <a class="btn btn-sm btn-success" href="{{route ('complaint.show',$user->id)}}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{route ('complaint.edit',$user->id)}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                  </td>
                                  </div>
                                  </div>
                                </tr>
                              </div>
                               @endforeach
                         </tbody>
                      </table>
                      {!!$complaint ->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
