@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">

            <div class="card">
                <div class="card-header">{{ __('Congratulations') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @if($trxInfo->bk_status=='Completed')
                        <h1 class="text-success">Your Payment and Registration is Successfully Complete.</h1>
                        <h2></h2>
                @else

                    <h1>Your Registration is Now <br><b class="text-success">Pending for Payment</b>. </h1>
                    <br> <h3>Payable is <b>{{ $trxInfo->amount }}</b> taka</h3>

                    <form action="{{ route('url-create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="amount" value="{{ $trxInfo->amount }}">
                        <input type="hidden" name="merchantInvoiceNumber" value="{{ $trxInfo->id }}">

                        <button type="submit" name="payment" class="btn btn-lg btn-success">CLICK HERE TO PAY</button>
                    </form>

                @endif

                    <br>
                    <img src="{{ url('side.png') }}" class="dashboard_banner" class="pt-4 mt-4" alt="">

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
