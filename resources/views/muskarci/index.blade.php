@extends('layouts.app1')

@section('content')
<br/><br/>

<div class="container">
  <div class="product-filter">
                  <div class="row">
                      <div class="col-lg-12 text-center">
                          <div class="section-title">
                              <h2>{{$categoryName}}</h2>
                          </div>
                          <ul class="product-controls">
                            <li data-filter="*"><a href ="{{ route('muskarci.index') }}" >All</a></li>
                          @foreach($categories as $category)
                        @if($category->id!=2)
                            <li data-filter="*"><a href ="{{ route('muskarci.index',['category'=>$category->name]) }}">{{$category->name}}</a></li>
                            @endif
                           @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
  <div class="categories-controls">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="categories-filter">
                           <div class="cf-right">
                               <span style="color:black;">Sortiraj:</span>

                               <a href="{{route('muskarci.index',['category'=>request()->category, 'sort'=>'high_low'])}}">Cijena silazno</a><span>|</span>
                               <a href="{{route('muskarci.index',['category'=>request()->category, 'sort'=>'low_high'])}}">Cijena uzlazno</a>
                               <span>|</span>
                               <a href="{{route('muskarci.index',['category'=>request()->category, 'sort'=>'alphabet'])}}">Abecedni red</a>


                           </div>
                         </div>
                     </div>
                 </div>
             </div>
 <div class="row" >


   @php $br=0; @endphp
                       @foreach ($products as $product)
                       @php $br++;@endphp
                        @if(($br-1)%5==0)
                        @if(($br-1)!=0)
                             </div>
                           </div>
                           @endif


                                 <div class="col-lg-6 col-md-6">
                                   <div class="single-product-item">
                                     <figure>
                                       @if($product->category_id==1)
                                        <a href="{{ route('shop.show',$product->id) }}">  <img src={{"images/majice/muskarci/".$product->img}} alt=""><a/>
                                          @elseif($product->category_id==4)
                                        <a href="{{ route('shop.show',$product->id) }}">  <img src={{"images/sorcevi/muskarci/".$product->img}} alt=""><a/>
                                            @elseif($product->category_id==3)
                                          <a href="{{ route('shop.show',$product->id) }}">  <img src={{"images/dukserice/muskarci/".$product->img}} alt=""><a/>
                                              @else
                                            <a href="{{ route('shop.show',$product->id) }}">  <img src={{"images/tenisice/muskarci/".$product->img}} alt=""><a/>
                                              @endif


                                     </figure>
                              <div class="product-text">
                                  <a href="{{ route('shop.show',$product->id) }}">
                                      <h4 style="color:#838383">{{$product->name}}</h4><br/>
                                  </a>
                                  <p>{{$product->price}} KM</p><br/><a  class="btn btn-secondary" href="{{ route('shop.show',$product->id) }}">
                                  Naruči
                                </a>
                              </div>
                          </div>
                      </div>

                       @if(($br-1)!=count((array)$products)-1)
                      <div class="col-lg-6 col-md-6">
                            <div class="row">
                              @endif
                                @else

                                  <div class="col-lg-6 col-md-6">
                                    <div class="single-product-item">
                                        <figure>
                                          @if($product->category_id==1)
                                             <a href="{{ route('shop.show',$product->id) }}"><img src={{"images/majice/muskarci/".$product->img}} alt=""><a/>
                                             @elseif($product->category_id==4)
                                             <a href="{{ route('shop.show',$product->id) }}"><img src={{"images/sorcevi/muskarci/".$product->img}} alt=""><a/>
                                               @elseif($product->category_id==3)
                                              <a href="{{ route('shop.show',$product->id) }}"> <img src={{"images/dukserice/muskarci/".$product->img}} alt=""><a/>
                                                 @else
                                                 <a href="{{ route('shop.show',$product->id) }}"><img src={{"images/tenisice/muskarci/".$product->img}} alt=""><a/>
                                                 @endif

                                        </figure>
                                        <div class="product-text">
                                            <a href="{{ route('shop.show',$product->id) }}">
                                                <h4 style="color:#838383">{{$product->name}}</h4><br/>
                                            </a>
                                            <p>{{$product->price}} KM</p><br/><a  class="btn btn-secondary" href="{{ route('shop.show',$product->id) }}">
                                            Naruči
                                          </a>
                                        </div>
                                    </div>
                                </div>





                            @endif

                            @endforeach
                            @if(($br-1)%5!=0)
                          </div>
                        </div>
                            @endif
                            

					

	{!! str_replace('/studenti.sum.ba', 'studenti.sum.ba/projekti/fsre/2019/g10', $products->appends(request()->input())->links()) !!}
                      
</div></div></div>                                            </div>
                                              <br/><br/><br/><br/>



 @endsection

