@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Staff Members
        </div>

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
                    <th scope="col"> ID </th>
                    <th scope="col"> Member Name </th>
                    <th scope="col"> Member Role </th>
                  </div>
                </tr>
              </div>
            </thead>
            <tbody>
              @foreach($users as $user)
              <div class="row">
                <tr align="center">
                  <div class="text-center col-md-6 col-md-offset-2">
                    <th scope="row"><b> {{++$i}} </b></th>
                    <td> {{$user->name}} </td>
                    <td> {{$user->role}} </td>
                    <td>
                  </div>
                </tr>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection