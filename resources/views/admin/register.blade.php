@extends('layouts.app')

@section('title')
    Registered Role
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
          <div class="card">
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
              <h4 class="card-title"> Registrirane Role</h4>


            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Kontakt</th>
                    <th>Email</th>
                    <th>Rola</th>
                    <th >UREDI</th>
                    <th >IZBRIŠI</th>
                  </thead>
                  <tbody>
                    @foreach ($users as $row)

                    <tr>
                     <td>{{$row->id}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->surname}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->role}}</td>
                    <td><a href="{{ url('role-edit/'.$row->id) }}" class="btn btn-primary">Uredi</a></td>
                      <td>
                          <form action="{{ url('role-delete/'.$row->id) }}"method="POST">
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

@section('scripts')

@endsection
