@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Members</div><br>
                <div class="col-sm-2">
                  <a class="btn btn-sm btn-success" href="{{route('user.create')}}">Create User</a>
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
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Wing </th>
                            <th> Flat </th>
                            <th> Role Assigned  </th>
                          </div>
                          </tr>
                        </div>
                        </thead>
                          <tbody>
                               @foreach($users as $user)
                                <div class="row">
                                <tr align="center">
                                  <div class="text-center col-md-6 col-md-offset-2">
                                    <td><b> {{++$i}} </b></td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->phone}} </td>
                                    <td> {{$user->wing}} </td>
                                    <td> {{$user->flat}} </td>
                                    <td> {{$user->role}} </td>
                                    <td>
                                      <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        <a class="btn btn-sm btn-success" href="{{route ('user.show',$user->id)}}">Show</a>
                                        <a class="btn btn-sm btn-warning" href="{{route ('user.edit',$user->id)}}">Edit</a>
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
                      {!!$users ->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
