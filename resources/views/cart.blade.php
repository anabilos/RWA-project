@extends('layouts.app1')

@section('content')
<div id="app">
<div class="cart-page">
        <div class="container">
        </br>
          @if (session()->has('success_message'))
          <div class="alert alert-success">
              {{ session()->get('success_message') }}
          </div>
      @endif

      @if(count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      @if (Cart::count() > 0)
    </br></br>
            @if (Cart::count() == 1)
            <h5 align="center">{{ Cart::count() }} proizvod u košarici</h5>
            @else
            <h5 align="center">{{ Cart::count() }} proizvoda u košarici</h5>
            @endif
  </br></br>
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>

                            <th class="product-h">Proizvod</th>
                            <th class="product-h">Cijena</th>
                            <th class="product-h">Količina</th>
                            <th class="product-h">Veličina</th>
                            <th class="product-h">Ukupno</th>
                            <th></th>
                        </tr>
                    </thead>
                     @foreach (Cart::content() as $item)


                    <tbody>
                        <tr>
                            <td class="product-col">
                              @if($item->model->gender_id==1)
                              @if($item->model->category_id==1)
                                <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/majice/zene/".$item->model->img}} alt=""></a>
                                @elseif($item->model->category_id==2)
                                  <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/tajice/zene/".$item->model->img}} alt=""></a>
                                @elseif($item->model->category_id==3)
                                  <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/dukserice/zene/".$item->model->img}} alt=""></a>
                                  @else
                                    <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/tenisice/zene/".$item->model->img}} alt=""></a>
                                      @endif
                                      @elseif($item->model->gender_id==2)
                                      @if($item->model->category_id==1)
                                        <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/majice/muskarci/".$item->model->img}} alt=""></a>
                                        @elseif($item->model->category_id==4)
                                          <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/sorcevi/muskarci/".$item->model->img}} alt=""></a>
                                        @elseif($item->model->category_id==3)
                                          <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/dukserice/muskarci/".$item->model->img}} alt=""></a>
                                          @else
                                            <a href="{{ route('shop.show',$item->model->id) }}"> <img src={{"images/tenisice/muskarci/".$item->model->img}} alt=""></a>
                                              @endif
                                              @endif
                                <div class="title" style="text-align:center; margin-top:15px">

                                  <h4 >{{$item->model->name}}</h4>




                                </div>
                            </td>
                            <td class="price-col">{{$item->model->price}}KM</td>
                            <td class="price-col">
                              <select class="quantity" data-id="{{ $item->rowId }}">
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>

                            </td>
                              <td class="price-col">{{$item->options->has('size') ? $item->options->size : ''}}</td>

                            <td class="quantity-col"><b>{{$item->subtotal }} KM</b></td>
                            <td class="product-close">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit">x</button>
                            </form>
                          </td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>


        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Cijena</th>
                                            <th>Porez (17%)</th>
                                            <th class="total-cart">Ukupna cijena</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="sub-total">{{Cart::subtotal()}} KM</td>
                                            <td class="sub-total">{{Cart::tax()}} KM</td>
                                            <td class="total-cart-p">{{Cart::total()}} KM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            @else
                            <h5>Košarica je prazna!</h5>
                            @endif
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="{{route('zene.index')}}"><button class="primary-btn pc-btn" >Continue shopping</button></a>
                                    <span style="visibility: hidden">ef</span>
                                  <a href="{{route('checkout.index')}}">  <button class="primary-btn pc-btn"  >Proceed to checkout</button></a>
                                    </br></br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>



@endsection
@section('scriptt')
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                   const id = element.getAttribute('data-id')
                  axios.patch(`cart/${id}`, {
                          quantity: this.value
                      })
                      .then(function (response) {

                        window.location.href = '{{ route('cart.index') }}'
                      })
                      .catch(function (error) {
                        window.location.href = '{{ route('cart.index') }}'
                      });
                })
            })
        })();
    </script>


@endsection


