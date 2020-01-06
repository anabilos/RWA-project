
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Dobrodošli Admine!</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('nav')
<a class="btn-link"href="{{ url('/admin') }}">
    Dashboard
</a>

<a class="btn-link"href="{{ url('/role-register') }}">
    Upravljaj Korisnicima
</a>
<a class="btn-link"href="#">
    Upravljaj Proizvodima
</a>
@endsection

