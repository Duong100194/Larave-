@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">{{ __('Dashboard') }}</div>
=======
                <div class="card-header">Dashboard</div>
>>>>>>> 95be89aaeef364817fd2bfcea6dbc0132e1bf579

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    {{ __('You are logged in!') }}
=======
                    You are logged in!
>>>>>>> 95be89aaeef364817fd2bfcea6dbc0132e1bf579
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
