<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('novo/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('novo/css/font-awesome.min.css') }}"type="text/css">
    <link rel="stylesheet" href="{{ asset('novo/css/nice-select.css') }}"type="text/css">
    <link rel="stylesheet" href="{{ asset('novo/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('novo/css/magnific-popup.css') }}"type="text/css">
    <link rel="stylesheet" href="{{ asset('novo/css/slicknav.min.css') }}"type="text/css">
    <link rel="stylesheet" href="{{ asset('novo/css/style.css') }}"type="text/css">
</head>

<body>


    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo" height="70px">

                </div>
                <div class="header-right">


                    <a href="{{ route('cart.index') }}">
                        <img src="novo/img/icons/bag.png" alt="">
                        <span>{{Cart::instance('default')->count()}}</span>
                    </a>
                </div>





                <div class="user-access">
                        @guest
                                <a href="{{ route('login') }}">Prijavi se</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="in">Registriraj se</a>
                                @endif

                            @else
                            <a  href="{{ url('/admin') }}">
                                    {{ Auth::user()->name }}
                                    {{ Auth::user()->surname }}

                                </a>
                                <a class="in" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Odjavi se
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @endguest
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a class="active" href="{{ url('/') }}">AB-Shop</a></li>
                        <li><a href="{{ route('zene.index') }}">Žene</a></li>
                        <li><a href="{{ route('muskarci.index') }}">Muškarci</a></li>
                        <li><a href="{{route('about')}}">O nama</a></li>
                        <li><a href="{{asset('vizija.pdf')}}">Vizija</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
      @yield('content')

      <footer class="footer-section spad">
          <div class="container">

              <div class="footer-widget">
                  <div class="row" >
                      <div class="col-lg-3 col-sm-6">
                          <div class="single-footer-widget">
                              <h4>O nama</h4>
                              <ul>
                                  <li>O nama</li>
                                  <li>Vizija</li>
                                  <li>Men products</li>
                                  <li>Women products</li>
                              </ul>
                          </div>
                      </div>

          <div class="social-links-warp">
              <div class="container">
                  <div class="social-links">
                      <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                      <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                      <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>

                  </div>
              </div>

  <div class="container text-center pt-5">
                  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> </p>
              </div>


          </div>
      </footer>


@yield('script')


</body>

</html>
