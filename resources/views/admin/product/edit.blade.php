@extends('layouts.app')

@section('title')
    Edit-Product
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
                        <div class="card-header">Uredite proizvod</div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">

                                        <form action="{{ url('product-update/'.$products->id) }}"method="POST">
                                                {{ csrf_field() }}
                                            {{ method_field('PUT') }}




                                            <div class="form-group">
                                            </br>
                                                {{ Form::label('name', 'Ime proizvoda') }}
                                                {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                                            </div>

                                            <div class="form-group">
                                                {{ Form::label('description', 'Opis') }}
                                                {{ Form::text('description', null, array('class' => 'form-control','required'=>'')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('price', 'Cijena') }}
                                                {{ Form::text('price', null, array('class' => 'form-control','required'=>'')) }}
                                            </div>


</br>
                                              {{ Form::submit('Ažuriraj', array('class' => 'btn btn-primary')) }}
                                                <a href="{{ url('/product/index') }}"  class="btn btn-secondary">Odustani</a>
                                              </br></br>
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
