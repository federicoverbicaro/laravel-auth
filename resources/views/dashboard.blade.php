@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

            </div>

            <div class="col mt-2 ">
                <div class="border p-3 rounded-3 ">
                    <h3 class="border-top-0 border-end-0 border-start-0 border text-capitalize ">Pagina Principale del Portfolio </h3>
                    <a href="{{ route('dashboard.wallets.index') }}" class="btn btn-primary mt-2">Project</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
