@extends('layouts.app1')

@section('content')


<section class="page-add">
     <div class="container">
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
         <div class="row">
             <div class="col-lg-4">
                 <div class="page-breadcrumb">
                     <h2>Checkout<span>.</span></h2>
                 </div>
             </div>
             <div class="col-lg-8">
                 <img src="/novo/img/add.jpg" alt="">
             </div>
         </div>
     </div>
 </section>
 <section class="cart-total-page spad">
       <div class="container">

           <form action="{{route('checkout.store')}}"method="POST" class="checkout-form">
             {{csrf_field()}}
               <div class="row">
                   <div class="col-lg-12">

                       <h3>Vaše Informacije</h3>
                   </div>
                   <div  class="col-lg-9" >
                       <div class="row">
                           <div class="col-lg-2">
                               <p class="in-name">Ime*</p>
                           </div>
                           <div class="col-lg-5">
                               <input  name="firstname" type="text" placeholder="First Name"required>
                           </div>
                           <div class="col-lg-5">
                               <input name="lastname"type="text" placeholder="Last Name"required>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-2">
                               <p class="in-name">Email*</p>
                           </div>
                           <div class="col-lg-10">
                               <input name="email" type="text"required>

                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-2">
                               <p class="in-name">Adresa*</p>
                           </div>
                           <div class="col-lg-10">
                               <input name="address" type="text"required>

                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-2">
                               <p class="in-name">Država*</p>
                           </div>
                           <div class="col-lg-10">
                               <select name="state" class="cart-select country-usa"required>
                                   <option>BiH</option>
                                   <option>HRV</option>
                               </select>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-2">
                               <p class="in-name">Grad*</p>
                           </div>
                           <div class="col-lg-10">
                               <input name="city" type="text"required>
                           </div>
                       </div>


                       <div class="row">
                           <div class="col-lg-2">
                               <p class="in-name">Mobitel*</p>
                           </div>
                           <div class="col-lg-10">
                               <input name="phone" type="text"required>
                           </div>
                       </div>

                   </div>
                   <div class="col-lg-3" >

                       <div class="order-table" style="width:420px">
                         <h4 align="center" style="padding-bottom:30px">Narudžba</h4>
                         @foreach (Cart::content() as $item)
                           <div class="cart-item">
                             @if($item->model->gender_id==1)
                             @if($item->model->category_id==1)
                               <a href="{{ route('shop.show',$item->model->id) }}"> <img width="110px"src={{"images/majice/zene/".$item->model->img}} alt=""></a>
                               @elseif($item->model->category_id==2)
                                 <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/tajice/zene/".$item->model->img}} alt=""></a>
                               @elseif($item->model->category_id==3)
                                 <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/dukserice/zene/".$item->model->img}} alt=""></a>
                                 @else
                                   <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/tenisice/zene/".$item->model->img}} alt=""></a>
                                     @endif
                                     @elseif($item->model->gender_id==2)
                                     @if($item->model->category_id==1)
                                       <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/majice/muskarci/".$item->model->img}} alt=""></a>
                                       @elseif($item->model->category_id==4)
                                         <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/sorcevi/muskarci/".$item->model->img}} alt=""></a>
                                       @elseif($item->model->category_id==3)
                                         <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/dukserice/muskarci/".$item->model->img}} alt=""></a>
                                         @else
                                           <a href="{{ route('shop.show',$item->model->id) }}"> <img width="100px"src={{"images/tenisice/muskarci/".$item->model->img}} alt=""></a>
                                             @endif
                                             @endif
                                <div style="display:inline-block; margin-left:20px">

                               <p class="product-name"><span style="visibility:hidden">efewfhowe</span>{{ $item->model->name }}</br>

                                 <span>{{ $item->qty }}/{{$item->options->has('size') ? $item->options->size : ''}}
                                 </span></br>
                                 <span>{{ $item->model->description}}
                                 </span></br>

                                 <span >{{$item->subtotal }} KM</span></p>

                                </div>


                           </div>
                           @endforeach

                           <div class="cart-item">
                               <span>Cijena</span>
                               <p>{{Cart::subtotal()}} KM</p>
                           </div>
                           <div class="cart-item">
                               <span>Porez (17%)</span>
                               <p>{{Cart::tax()}} KM</p>
                           </div>

                           <div class="cart-total" style="margin:10px">
                               <span>Ukupno</span>
                               <p>{{Cart::total()}} KM</p>
                           </div>
                       </div>
                   </div>

               </div>

               <div class="row" style="text-align:center">
                   <div class="col-lg-12">

                            <br/><br/>
                           <button  type="submit" class="primary-btn">Potvrdi narudžbu</button>
                           <br/><br/> <br/><br/>
                   </div>
               </div>

           </form>
       </div>
   </section>

@endsection
