@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Complaint</div><br>
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

                    <form action="{{route('create.store')}}" method="post">
                        @csrf

                        <div class="form-group row">

                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Description" value="{{ old('Description') }}" required autofocus>

                                @if ($errors->has('Description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Description') }}</strong>
                                </span>
                                @endif
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