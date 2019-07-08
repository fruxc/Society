@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Members</div><br>
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

                    <form action="{{route('user.update',$users->id)}}" method="post">

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $users->name }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $users->email }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $users->phone }}" required>

                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wing" class="col-md-4 col-form-label text-md-right">{{ __('Wing') }}</label>

                            <div class="col-md-6">
                                <select name="wing" id="wing" class="form-control{{ $errors->has('wing') ? ' is-invalid' : '' }}" required>
                                    <option value="{{ $users->wing }}">{{ $users->wing }}</option>
                                    @foreach ($mwing as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="flat" class="col-md-4 col-form-label text-md-right">{{ __('Flat') }}</label>

                            <div class="col-md-6">
                                <input id="flat" type="text" class="form-control{{ $errors->has('flat') ? ' is-invalid' : '' }}" name="flat" value="{{ $users->flat }}" required autofocus>

                                @if ($errors->has('flat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('flat') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" required>
                                    <option value="{{$users->role}}">{{$users->role}}</option>
                                    @foreach ($role as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a class="btn btn-success" href="{{route('user.index')}}">Back</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
