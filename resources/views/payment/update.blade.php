@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Payment</div><br>
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

                    <form action="{{route('payment.update',$payment->id)}}" method="post">

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">

                            <label for="chequeno" class="col-md-4 col-form-label text-md-right">{{ __('chequeno') }}</label>

                            <div class="col-md-6">
                                <input id="chequeno" type="text" class="form-control{{ $errors->has('chequeno') ? ' is-invalid' : '' }}" name="chequeno" value="{{ $payment->chequeno }}" required autofocus>

                                @if ($errors->has('chequeno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('chequeno') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">

                            <label for="deposit" class="col-md-4 col-form-label text-md-right">{{ __('Deposit') }}</label>

                            <div class="col-md-6">
                                <input id="deposit" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="deposit" value="{{ old('deposit') }}" required autofocus>

                                @if ($errors->has('deposit'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('deposit') }}</strong>
                                </span>
                                @endif
                            </div>
                          </div>
                            <div class="form-group row">

                                <label for="chequedate" class="col-md-4 col-form-label text-md-right">{{ __('ChequeDate') }}</label>

                                <div class="col-md-6">
                                    <input id="chequedate" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="chequedate" value="{{ old('chequedate') }}" required autofocus>

                                    @if ($errors->has('chequedate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chequedate') }}</strong>
                                    </span>
                                    @endif
                          </div>
                              </div>
                                <div class="form-group row">

                                    <label for="cashdate" class="col-md-4 col-form-label text-md-right">{{ __('Cash Date') }}</label>

                                    <div class="col-md-6">
                                        <input id="cashdate" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cashdate" value="{{ old('cashdate') }}" required autofocus>

                                        @if ($errors->has('cashdate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cashdate') }}</strong>
                                        </span>
                                        @endif
                        </div>
                                  </div>
                                    <div class="form-group row">

                                        <label for="cpto" class="col-md-4 col-form-label text-md-right">{{ __('Cash Paid to') }}</label>

                                        <div class="col-md-6">
                                            <input id="cpto" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cpto" value="{{ old('cpto') }}" required autofocus>

                                            @if ($errors->has('cpto'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cpto') }}</strong>
                                            </span>
                                            @endif
                      </div>
                                      </div>
                                        <div class="form-group row">

                                            <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>

                                            <div class="col-md-6">
                                                <input id="branch" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="branch" value="{{ old('branch') }}" required autofocus>

                                                @if ($errors->has('branch'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('branch') }}</strong>
                                                </span>
                                                @endif
                    </div>
                                          </div>
                                          <div class="form-group row">

                                              <label for="paidvia" class="col-md-4 col-form-label text-md-right">{{ __('Paid Via') }}</label>

                                              <div class="col-md-6">
                                                  <input id="paidvia" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="paidvia" value="{{ old('paidvia') }}" required autofocus>

                                                  @if ($errors->has('paidvia'))
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('paidvia') }}</strong>
                                                  </span>
                                                  @endif
                </div>
                                            </div>

                                            <div class="form-group row">

                                                <label for="paidby" class="col-md-4 col-form-label text-md-right">{{ __('Paid By') }}</label>

                                                <div class="col-md-6">
                                                    <input id="paidby" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="paidvia" value="{{ old('paidby') }}" required autofocus>

                                                    @if ($errors->has('paidby'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('paidby') }}</strong>
                                                    </span>
                                                    @endif
                                            </div>
                                              </div>

                    </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <a class="btn btn-success" href="{{route('payment.index')}}">Back</a>
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
