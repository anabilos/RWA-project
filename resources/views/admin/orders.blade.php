@extends('layouts.app')

@section('title')
    Orders
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
<div class="row">
        <div class="col-md-12">
          <div class="card" >
            <div class="card-header">
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
              <h4 class="card-title"> Narudžbe</h4>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                      <th>Id narudžbe</th>
                    <th>Id korisnika</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Adresa</th>
                    <th>Mobitel</th>
                    <th>Ukupna cijena</th>
                    <th>Poslano: 0/NE-1/DA</th>
                    <th >UREDI</th>
                    <th >IZBRIŠI</th>
                  </thead>
                  <tbody>
                    @foreach ($orders as $row)

                    <tr>
                     <td>{{$row->id}}</td>
                     <td>{{$row->user_id}}</td>
                      <td>{{$row->billing_firstname}}</td>
                      <td>{{$row->billing_lastname}}</td>
                      <td>{{$row->billing_email}}</td>
                      <td>{{$row->billing_address}}</td>
                      <td>{{$row->billing_phone}}</td>
                      <td>{{$row->billing_total}}KM</td>
                        <td>{{$row->shipped}}</td>

                    <td><a href="{{ url('orders-edit/'.$row->id) }}" class="btn btn-primary">Uredi</a></td>
                      <td>
                          <form action="{{ url('orders-delete/'.$row->id) }}"method="POST">
                         {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-secondary">
                            Izbriši
                        </button>
                          </form>

                        </td>
                    </tr>


                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
