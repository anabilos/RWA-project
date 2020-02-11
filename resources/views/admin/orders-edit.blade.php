@extends('layouts.app')

@section('title')
    Edit-Orders
@endsection
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
                        <div class="card-header">Uredite narudžbu</div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">

                                        <form action="{{ url('orders-update/'.$orders->id) }}"method="POST">
                                                {{ csrf_field() }}
                                            {{ method_field('PUT') }}




                                                <div class="form-group">
                                                      <label >Želite li odobriti narudžbu?</label></br>
                                                      <select name="shipped" class="form-group">
                                                          <option value="0">NE</option>
                                                          <option value="1">DA</option>
                                                      </select>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">
                                                            Ažuriraj
                                                        </button>
                                                        <a href="{{ url('/orders') }}"  class="btn btn-secondary">Odustani</a>


                                        </form>



                                </div>

                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@endsection
