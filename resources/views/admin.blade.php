@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @component('components.who')

                    @endcomponent

                    @component('components.user')

                    @endcomponent

                    @component('components.maintenance')

                    @endcomponent

                    @component('components.complaint')

                    @endcomponent

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection