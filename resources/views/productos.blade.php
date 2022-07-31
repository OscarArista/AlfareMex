@extends('layouts.fronted.productos')

@section('navbar_top')
<div class="header-top">
    <div class="container d-flex justify-content-between">
        <div class="d-inline-flex ml-auto">
            <!-- <div class="headcont">
                <i class="fas fa-2x fa-mobile-alt messenge"></i>
                +51 999-999-999
            </div>
            <div class="headcont">
                <i class="fas fa-2x fa-envelope messenge"></i>
                AlfareMex@gmail.com
            </div> -->
        </div>
    </div>
</div>
@endsection
@section('navbar')
<header>
    <a href="#" class="logo">
        <h2 style="color: white" class="imgtamaño">AlfareMex</h2>
        <!--<img  class="imgtamaño" src="{{ asset('img/Logo-Higienika_office_peru_div.png')}}" alt="JLDM ! Proyects">-->
    </a>
    <div class="menu-toggle"></div>
    <nav>
        <ul>
            <li><a href="{{ url('/')}}">INICIO</a></li>
            <li><a href="{{ url('/contact')}}">CONTÁCTENOS</a></li>
            <li><a class="active" href="{{ url('/productos')}}">PRODUCTOS</a></li>
            <li><a href="{{ url('/nosotros')}}">NOSOTROS</a></li>
            <li>
                @guest
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                @else
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    <span class="badge badge-warning navbar-badge">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('/home')}}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>Mi cuenta
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">
                        Cerrar Sesión
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                @endguest 
            </li>
        </ul>
    </nav>
    <div class="clearfix"></div>
</header>
@endsection
@section('banner')
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-text">
                    <h4>ARTESANIA <span>-Sitio Web-</span></h4>
                    <br><br>
                    <!-- buscador -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="container">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <div class="search"> <i class="fas fa-search icon"></i> 
                                    <input type="text" id="mysearch" class="form-control"  placeholder="Buscar un producto">
                                </div>
                                <ul id="showlist" tabindex='1' class="list-group"></ul>
                            </div>
                        </div>
                    </div>

                    <h1 class="tipeo1">VARIEDAD DE PRODUCTOS</h1>
                    <h1 class="tipeo2"><span class="type"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('products')
<div class="container mt-5 mb-5">
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="#">
                        <img class="pic-1" src="{{asset('/img/productos/'.$producto->image)}}" alt="{{$producto->image}}">
                        <!--<img class="pic-2" src="https://via.placeholder.com/280x300/FFF5EE/000000">-->
                    </a>
                    <ul class="social">
                        <li><a href="" class="fa fa-search"></a></li>
                    </ul>
                    <span class="product-discount-label">{{$producto->visible == 1 ? "Disponible":"No Disponible"}}</span>
                </div>
                <div class="product-content">
                    <div class="price">{{$producto->name}}</div>
                    <div class="price">{{$producto->extract}}</div>
                    <!--<<span class="product-shipping">Free Shipping</span>-->
                    <h3 class="title"><a href="{{ route('searchCategory' ,$producto->categoria->name)}}">{{$producto->categoria->name}}</a></h3>
                    <a class="all-deals" href="{{route('product-details', $producto->slug)}}">Detalles<i class="fa fa-angle-right icon"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$productos->links()}}
</div>
@endsection
@section('footer')
<footer class="footer">
    <div class="l-footer">
        <img  class="footer_img" src="{{asset('img/ico.jpg')}}" alt="AlfareMex">
        <h2 style="color: white" class="footer_img">AlfareMex</h2>
    </div>
    <ul class="r-footer">
        <li>
            <h2>Social</h2>
            <ul class="box">
                <li class="button_social">
                    <i class="fab mr-2 fa-facebook"></i>
                    <a href="https://www.linkedin.com/in/jose-diaz-mira/" target="_blank">Facebook</a>
                </li>
                <li class="button_social">
                    <i class="fab mr-2 fa-twitter"></i>
                    <a href="#">Twitter</a>
                </li>
                <li class="button_social">
                    <i class="fab mr-2 fa-instagram"></i>
                    <a href="https://www.linkedin.com/in/jose-diaz-mira/" target="_blank">Instagram</a>
                </li>
                <li class="button_social">
                    <i class="fab mr-2 fa-linkedin-in"></i>
                    <a href="https://www.linkedin.com/in/jose-diaz-mira/" target="_blank">Linkedin</a>
                </li>
            </ul>
        </li>
        <li class="features">
            <h2>Información</h2>
            <ul class="box">
                <li><a href="#">Políticas de Privacidad</a></li>
                <li><a href="#">Trabaja con nosotros</a></li>
            </ul>
        </li>
        <li class="features">
            <h2>Procedimiento de Pagos</h2>
            <ul class="box">
                <li><a type="button" href="#">Ver mas</a></li>
            </ul>
        </li>
    </ul>
    <div class="b-footer">
        <p>Todos los Derechos reservados by <a href="" target="_blank">©AlfareMex-2022</a></p>
    </div>
</footer>
@endsection