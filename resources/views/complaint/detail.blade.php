@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">View Complaints</div><br>
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
                    <th> Complainy By </th>
                    <th> Response </th>
                  </div>
                </tr>
              </div>
            </thead>
            <tbody>
              <div class="row">
                <tr align="center">
                  <div class="text-center col-md-6 col-md-offset-2">
                    <td><b> {{1}} </b></td>
                    <td> {{$complaint->Description}} </td>
                    <td> {{$complaint->Actions}} </td>
                    <td> {{$complaint->complaintby}} </td>
                    <td> {{$complaint->response}} </td>
                    <td>
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