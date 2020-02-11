
@extends('layouts.app')
@section('nav')
<div class="li">
<a class="btn-link"href="{{ url('/admin') }}">
    Dashboard
</a>

<a class="btn-link"href="{{ url('/role-register') }}">
    Korisnici
</a>
<a class="btn-link"href="{{route('product.index')}}">
    Proizvodi
</a>
<a class="btn-link"href="{{route('product.dodaj')}}">
    Dodaj proizvod
</a>
<a class="btn-link"href="{{ url('/orders') }}">
    Narudžbe
</a>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                  @if (session()->has('success_message'))
                       <div class="spacer"></div>
                       <div class="alert alert-success">
                           {{ session()->get('success_message') }}
                       </div>
                   @endif

                   @if(count($errors) > 0)
                       <div class="spacer"></div>
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{!! $error !!}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                    <h3>Dobrodošli Admine !</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
