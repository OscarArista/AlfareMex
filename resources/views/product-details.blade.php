@extends('layouts.fronted.product-details')
@section('redes')

@endsection
@section('navbar_top')
<div class="header-top">
    <div class="container d-flex justify-content-between">
        <div class="d-inline-flex ml-auto">
            <!-- <div class="headcont">
                <i class="fas fa-2x fa-mobile-alt messenge"></i>
                +52 7713381133
            </div>
            <div class="headcont">
                <i class="fas fa-2x fa-envelope messenge"></i>
                Alfamexi007@gmail.com
            </div> -->
        </div>
    </div>
</div>
@endsection
@section('navbar')
    <header>
    <a href="#" class="logo">
        <h2 style="color: white" class="imgtamaño">AlfareMex</h2>
        <!--<img  class="imgtamaño" src="{{ asset('img/Logojldm.png')}}" alt="JLDM ! Proyects">-->
    </a>
    <div class="menu-toggle" ></div>
        <nav>
            <ul>
                <li><a href="{{ url('/')}}" >INICIO</a></li>
                <li><a href="{{ url('/contact')}}">CONTÁCTENOS</a></li>
                <li><a href="{{ url('/productos')}}">PRODUCTOS</a></li>
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
                        <h1 class="tipeo1">DESCRIPCIÓN:</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 
@section('content')
<main class="container_product">
    <div class="left-column">
        <img data-image="red" class="active" src="{{asset('/img/productos/'.$producto->image)}}">
    </div>
    <!-- Right Column -->
    <div class="right-column">
    <!-- Product Description -->
    <div class="product-description">
        <span>{{$producto->visible == 1 ? "Disponible":"Agotado"}}</span>
        <h1>{{$producto->name}}</h1>
        <p>{{$producto->extract}}</p>
    </div>

    <!-- Product Configuration -->
    <div class="product-configuration">
        <!-- Cable Configuration -->
        <div class="cable-config">
            <span>Categoría: </span><br>
                <div class="cable-choose">
                    <button>
                        <a href="{{ route('searchCategory' , $producto->categoria->slug)}}">
                            {{$producto->categoria->name}}
                        </a>
                    </button>
                </div>
        </div>
    </div>

    <!-- Product Pricing -->
    <div class="product-price">
        <span>S/{{$producto->price}}</span>
            <a target="none" href="https://wa.me/51987456321?text=Hola+interesad%40+en+el+Producto%3A+{{$producto->name}}" class="cart-btn">
            Consultar
            </a>
    </div>
  </div>
</main><br><br>
<div class="container">
<div class="media">
    <img width="100" height="100"  src="{{asset('/img/productos/'.$producto->image)}}" class="align-self-start mr-3" alt="...">
    <div class="media-body">
      <h5 class="mt-0">Descripción:</h5>
      <p>{{$producto->descriptions}}</p>
    </div>
  </div>
</div>
@endsection 

@section('footer')
<footer class="footer">
    <div class="l-footer">
        <img  class="footer_img" src="{{asset('img/ico.jpg')}}" alt="AlfareMex">
        <h2 style="color: white" class="footer_img">AlfareMex</h2>
    <p>
    </p>
    </div>
        <ul class="r-footer">
            <li>
            <h2>Social</h2>
                <ul class="box">
                    <li class="button_social">
                        <i class="fab mr-2 fa-facebook"></i>
                        <a href="#" target="_blank">Facebook</a>
                    </li>
                    <li class="button_social">
                    <i class="fab mr-2 fa-twitter"></i>
                        <a href="#">Twitter</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-instagram"></i>
                        <a href="#" target="_blank">Instagram</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-linkedin-in"></i>
                        <a href="#" target="_blank">Linkedin</a>
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
                    <li><a type="button" class="btn btn-outline-info" href="#">Ver mas</a></li>
                </ul>
                </li>
        </ul>
        <div class="b-footer">
            <p>Todos los Derechos reservados by <a href="#" target="_blank">©AlfareMex-2022</a></p>
        </div>
</footer>
@endsection
