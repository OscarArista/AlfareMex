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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{asset('css/backend.css') }}" rel="stylesheet">
    <!--LINNK-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/responsive.js') }}"></script>
    <script src="{{asset('js/security.js') }}"></script>
  


    <a href="/" class="logo">
        <h2 style="color: white" class="imgtama??o">AlfareMex</h2>
        <!--<img  class="imgtama??o" src="{{ asset('img/Logo-Higienika_office_peru_div.png')}}" alt="JLDM ! Proyects">-->
    </a>
    <div class="menu-toggle"></div>
    <nav>
        <ul>
            <li><a href="{{ url('/')}}">INICIO</a></li>
            <li><a href="{{ url('/contact')}}">CONT??CTENOS</a></li>
            <li><a class="active" href="{{ url('/productos')}}">PRODUCTOS</a></li>
            <li><a href="{{ url('/nosotros')}}">NOSOTROS</a></li>
             <li>
                @guest
                <a href="{{ route('login') }}">LOGIN</a>
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
                        Cerrar Sesi??n
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
            <h2>Informaci??n</h2>
            <ul class="box">
            








            


            <div class="modal fade bd-example-modal">
  <div class="modal-dialog" role="document">
        
      </div>
      <div class="modal-body" >
      <center><h1 class="modal-title"><center>POL??TICA DE PRIVACIDAD</center></h1></center>
        <p>
            El presente Pol??tica de Privacidad establece los t??rminos en que AlfareMex usa y protege la informaci??n que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compa????a est?? comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de informaci??n personal con la cual usted pueda ser identificado, lo hacemos asegurando que s??lo se emplear?? de acuerdo con los t??rminos de este documento. Sin embargo esta Pol??tica de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta p??gina para asegurarse que est?? de acuerdo con dichos cambios.
<center><h1>Informaci??n que es recogida</h1></center>
Nuestro sitio web podr?? recoger informaci??n personal por ejemplo: Nombre,  informaci??n de contacto como  su direcci??n de correo electr??nica e informaci??n demogr??fica. As?? mismo cuando sea necesario podr?? ser requerida informaci??n espec??fica para procesar alg??n pedido o realizar una entrega o facturaci??n. <br><br>

<center><h1>Uso de la informaci??n recogida</h1></center>
Nuestro sitio web emplea la informaci??n con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados correos electr??nicos peri??dicamente a trav??s de nuestro sitio con ofertas especiales, nuevos productos y otra informaci??n publicitaria que consideremos relevante para usted o que pueda brindarle alg??n beneficio, estos correos electr??nicos ser??n enviados a la direcci??n que usted proporcione y podr??n ser cancelados en cualquier momento.
AlfareMex est?? altamente comprometido para cumplir con el compromiso de mantener su informaci??n segura. Usamos los sistemas m??s avanzados y los actualizamos constantemente para asegurarnos que no exista ning??n acceso no autorizado. <br><br>

<center><h1>Cookies</h1></center>
Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener informaci??n respecto al tr??fico web, y tambi??n facilita las futuras visitas a una web recurrente. Otra funci??n que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.
Nuestro sitio web emplea las cookies para poder identificar las p??ginas que son visitadas y su frecuencia. Esta informaci??n es empleada ??nicamente para an??lisis estad??stico y despu??s la informaci??n se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, est??s no dan acceso a informaci??n de su ordenador ni de usted, a menos de que usted as?? lo quiera y la proporcione directamente . Usted puede aceptar o negar el uso de cookies, sin embargo la mayor??a de navegadores aceptan cookies autom??ticamente pues sirve para tener un mejor servicio web. Tambi??n usted puede cambiar la configuraci??n de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
<br><br>

<center><h1>Enlaces a Terceros</h1></center>
Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su inter??s. Una vez que usted de clic en estos enlaces y abandone nuestra p??gina, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los t??rminos o privacidad ni de la protecci??n de sus datos en esos otros sitios terceros. Dichos sitios est??n sujetos a sus propias pol??ticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted est?? de acuerdo con estas.
<br><br>

<center><h1>Control de su informaci??n personal</h1></center>
<p>En cualquier momento usted puede restringir la recopilaci??n o el uso de la informaci??n personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opci??n de recibir informaci??n por correo electr??nico.  En caso de que haya marcado la opci??n de recibir nuestro bolet??n o publicidad usted puede cancelarla en cualquier momento.
Esta compa????a no vender??, ceder?? ni distribuir?? la informaci??n personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.</p><br>

<p>AlfareMex Se reserva el derecho de cambiar los t??rminos de la presente Pol??tica de Privacidad en cualquier momento.</p>
</p>
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
</div>   
</div>
    <a href=""  data-toggle="modal" data-target=".bd-example-modal">Politica de Privacidad</a>  
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
        <p>Todos los Derechos reservados by <a href="" target="_blank">??AlfareMex-2022</a></p>
    </div>
</footer>
@endsection