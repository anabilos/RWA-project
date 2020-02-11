
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
              <h4 class="card-title">Proizvodi</h4>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Id proizvoda</th>
                    <th>Ime</th>
                    <th>Opis</th>
                    <th>Cijena</th>
                    <th>Slika</th>
                    <th >UREDI</th>
                    <th >IZBRIŠI</th>
                  </thead>
                  <tbody>
                    @foreach ($products as $row)

                    <tr>
                     <td></br></br>{{$row->id}}</td>
                     <td></br></br>{{$row->name}}</td>
                     <td></br></br>{{$row->description}}</td>
                      <td></br></br>{{$row->price}} KM</td><td>
                      @if($row->gender_id==1)
                      @if($row->category_id==1)
                        <img width="100px" src="{{asset('images/majice/zene/'. $row->img)}}" alt="">
                         @elseif($row->category_id==2)
                        <img width="100px" src="{{asset('images/tajice/zene/'. $row->img)}}" alt="">
                           @elseif($row->category_id==3)
                           <img width="100px" src="{{asset('images/dukserice/zene/'. $row->img)}}" alt="">
                             @else
                             <img width="100px" src="{{asset('images/tenisice/zene/'. $row->img)}}" alt="">
                             @endif
                        @else
                          @if($row->category_id==1)
                            <img width="100px" src="{{asset('images/majice/muskarci/'. $row->img)}}" alt="">
                             @elseif($row->category_id==4)
                          <img width="100px" src="{{asset('images/sorcevi/muskarci/'. $row->img)}}" alt="">
                               @elseif($row->category_id==3)
                              <img width="100px" src="{{asset('images/dukserice/muskarci/'. $row->img)}}" alt="">
                                 @else
                              <img width="100px" src="{{asset('images/tenisice/muskarci/'. $row->img)}}" alt="">
                                 @endif

                        @endif

                      </td>


                    <td></br></br><a href="{{ url('products-edit/'.$row->id) }}" class="btn btn-primary">Uredi</a></td>
                      <td></br></br>
                          <form action="{{ url('product-delete/'.$row->id) }}"method="POST">
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
