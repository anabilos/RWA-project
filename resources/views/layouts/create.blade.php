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
                  <div class="card-header">Dodajte proizvod</div>


                  <div class="card-body">
</br>
                      <div class="row">
                          <div class="col-md-12">
                            <form action="{{route('product.store')}}"method="POST" class="checkout-form" enctype="multipart/form-data">
                              {{csrf_field()}}


            <div class="form-group">
                {{ Form::label('name', 'Ime proizvoda') }}
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Opis') }}
                {{ Form::text('description', null, array('class' => 'form-control','required'=>'')) }}
            </div>
            <div class="form-group">
                {{ Form::label('price', 'Cijena') }}
                {{ Form::number('price', null, array('class' => 'form-control','step' => '0.01','required'=>'')) }}
            </div>

            @yield('velicina')
              @yield('kategorija')

            <div class="form-group">
                {{ Form::label('gender_id', 'Proizvod(spol)') }}
                {{ Form::select('gender_id', $genders, null, ['class' => 'form-control','placeholder'=>'Odaberi za koga je namjenjen proizvod','required'=>'']) }}
            </div>

            <div class="form-group">
                {{ Form::label('image', 'Slika') }}
                {{ Form::file('image',array('class' => 'form-control','required'=>'')) }}
            </div>

             {{ Form::submit('Dodaj proizvod', array('class' => 'btn btn-primary')) }}
           </form>


                                            </div>

                                        </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




@endsection
