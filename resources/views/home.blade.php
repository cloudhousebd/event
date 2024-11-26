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

                    <h1>Your Registration is Now <br><b class="text-success">Pending for Payment</b>. </h1>
                    <br> <h3>We are working on payment process. We will notify you ASAP.</h3>

                    <img src="{{ url('side.png') }}" width="25%" class="pt-4 mt-4" alt="">

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
