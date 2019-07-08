@extends('layouts.app')

@section('content')
<br />
<div class="container">
    <div class="row">
        <div class="col-md-7" align="right">
            <h4>Maintenance</h4>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ url('users/maintenance/pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Expenses</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer_data as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->expenses }}</td>
                    <td>{{ $customer->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>

</html>

@endsection
