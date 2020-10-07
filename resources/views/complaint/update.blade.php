@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Complaints</div><br>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>
                            Whoops! There were some problems with your inputs!!!<br>
                        </strong>
                        <ul>
                            @foreach ($errors as $error)
                            <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form Action="{{route('complaint.update',$complaint->id)}}" method="post">

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">

                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" value="{{ $complaint->Description }}" required autofocus>

                                @if ($errors->has('Description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Description') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">

                            <label for="Actions" class="col-md-4 col-form-label text-md-right">{{ __('Actions') }}</label>

                            <div class="col-md-6">
                                <input id="Actions" type="text" class="form-control{{ $errors->has('Actions') ? ' is-invalid' : '' }}" name="Actions" value="{{ $complaint->Actions }}" required autofocus>

                                @if ($errors->has('Actions'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Actions') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">

                            <label for="complaintby" class="col-md-4 col-form-label text-md-right">{{ __('complaintby') }}</label>

                            <div class="col-md-6">
                                <input id="complaintby" type="text" class="form-control{{ $errors->has('complaintby') ? ' is-invalid' : '' }}" name="complaintby" value="{{ $complaint->complaintby }}" required autofocus>

                                @if ($errors->has('complaintby'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('complaintby') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="response" class="col-md-4 col-form-label text-md-right">{{ __('Response') }}</label>

                            <div class="col-md-6">
                                <select name="response" id="response" class="form-control{{ $errors->has('response') ? ' is-invalid' : '' }}" required>
                                    <option></option>
                                    @foreach ($act as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a class="btn btn-success" href="{{route('complaint.index')}}">Back</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                </tr>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection