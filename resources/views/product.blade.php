@extends('layouts.app1')


@section('content')

<section class="product-page">
  <br/><br/><br/><br/>
        <div class="container">
          <div class="categories-controls">
                         <div class="row">
                             <div class="col-lg-12">
                                 <div class="categories-filter">
                                   <div class="cf-left">


                                       <a href="{{ route('home') }} " style="color:black;font-size:90%">Home</a><span>></span>
                                       @if($product->gender_id==1)
                                       <a href="{{ route('zene.index') }} " style="color:black;font-size:90%">Back</a><span>></span>
                                       @elseif($product->gender_id==2)
                                       <a href="{{ route('muskarci.index') }} " style="color:black;font-size:90%">Back</a><span>></span>
                                       @endif
                                       <a href=""style="color:black;font-size:90%">{{$product->name}}</a>


                                   </div>
                                 </div>
                             </div>
                         </div>
                     </div>

            <div class="row">
                <div class="col-lg-6">

                        <div class="product-img">
                            <figure>
                                @if($product->gender_id==1)
                              @if($product->category_id==1)
                                 <img src=" {{asset('images/majice/zene/'.$product->img)}}" alt="">
                                 @elseif($product->category_id==2)
                                 <img src=" {{asset('images/tajice/zene/'.$product->img)}}" alt="">
                                   @elseif($product->category_id==3)
                                   <img src=" {{asset('images/dukserice/zene/'.$product->img)}}" alt="">
                                     @else
                                     <img src=" {{asset('images/tenisice/zene/'.$product->img)}}" alt="">
                                     @endif
                                     @else
                                     @if($product->category_id==1)
                                        <img src=" {{asset('images/majice/muskarci/'.$product->img)}}" alt="">
                                        @elseif($product->category_id==4)
                                        <img src=" {{asset('images/sorcevi/muskarci/'.$product->img)}}" alt="">
                                          @elseif($product->category_id==3)
                                          <img src=" {{asset('images/dukserice/muskarci/'.$product->img)}}" alt="">
                                            @else
                                            <img src=" {{asset('images/tenisice/muskarci/'.$product->img)}}" alt="">
                                            @endif
                                              @endif

                            </figure>
                        </div>



                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                      @if($product->gender_id==1)
                      <a href="{{ route('zene.index')}}"><h2>{{$product->name}}</h2></a>
                      @else<a href="{{ route('muskarci.index')}}"><h2>{{$product->name}}</h2></a>
                      @endif
                        <div class="pc-meta">
                            <h5>{{$product->price}} KM</h5>

                        </div>
                        <p>{{$product->description}}</p>
                        <div class="shipping-info">
                          <h6 >Veličina:</h6></br>
                          <div class="chose-shipping">
                              <div class="cs-item">
                                <form action="{{route('cart.store')}}" method="POST">
                                  {{ csrf_field() }}
                                  <select  name="size">
                                     @foreach($product->sizes as $size)
                                    <option value="{{$size->name}}">{{$size->name}}</option>
                                      @endforeach
                                    </select>


                              </div>

                          </div>

                      </div>

                       <input type="hidden" name="id" value="{{$product->id}}">
                    
                       <input type="hidden" name="name" value="{{$product->name}}">
                       <input type="hidden" name="price" value="{{$product->price}}">
                   <button style="cursor:pointer"type="submit" class="primary-btn pc-btn">Dodaj u košaricu</button>
                   </form>

                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/><br/>
    </section>
@endsection
