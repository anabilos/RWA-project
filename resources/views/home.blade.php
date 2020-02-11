@extends('layouts.app1')
@section('content')
    <section class="hero-slider">
        <div class="hero-items owl-carousel">
            <div class="single-slider-item set-bg" data-setbg="novo/img/slider-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Women</h2>

                            <a href="{{ route('zene.index') }}" class="primary-btn">SHOP</a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="single-slider-item set-bg" data-setbg="novo/img/slider-2.jpg">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Men</h2>


                            <a href="{{ route('muskarci.index') }}" class="primary-btn">SHOP</a>
                        </div>
                    </div>
                </div>

            </div>



</div>
    </section>
  

@endsection


      @section('script')
    <script src="novo/js/jquery-3.3.1.min.js"></script>
    <script src="novo/js/bootstrap.min.js"></script>
    <script src="novo/js/jquery.magnific-popup.min.js"></script>
    <script src="novo/js/jquery.slicknav.js"></script>
    <script src="novo/js/owl.carousel.min.js"></script>
    <script src="novo/js/jquery.nice-select.min.js"></script>
    <script src="novo/js/mixitup.min.js"></script>
    <script src="novo/js/main.js"></script>
    @endsection
