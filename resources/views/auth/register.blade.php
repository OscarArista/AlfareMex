@extends('layouts.init')

@section('content')
<div class="conatiner">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <div class="form">
   
        <div class="contact-info">
                <h3 class="contact_tittle">BIENVENID@</h3>
                <p class="contact_text">
                </p>

            <div class="contactos_info">
                <div class="contact_information">
              <i class="fas fa-2x fa-user"></i>
                    <p>alfamexi007@gmail.com</p>
                </div>
                <div class="contact_information">
                <h1>  <i class="fas fa-mobile-alt"></i></h1>
                    <p>+52 77 13 38 19 78</p>
                </div>
                
            </div>
            <div class="social_media">
                @if (Session::has('message'))
                <div class="container mt-3">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;text-align: left;" >
                    {{ Session::get('message') }}
                    @if ($errors->any())
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    @endif
                    <script>
                      $('.alert').slideDown();
                      setTimeout(function(){ $('.alert').slideUp(); }, 10000)
                    </script>
                  </div>
               </div>
              @endif
            </div>
        </div>
       
        <div class="contact-form">
            <form method="POST" action="{{ route('register') }}" autocomplete="off" name="loginform" >
            @csrf
                <div class="input-container">
                    <label class="text-white">NOMBRE</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="NOMBRE" >
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="text-white">APELLIDO PATERNO</label>
                        <input id="apaterno" type="text" class="form-control" name="apaterno"  placeholder="APELLIDO PATERNO" >
                    </div>
                    <div class="col">
                        <label class="text-white">APELLIDO MATERNO</label>
                        <input id="amaterno" type="text" class="form-control" name="amaterno"placeholder="APELLIDO MATERNO" >
                    </div>
                </div>
                <br>      

                <div class="form-row">
                    <div class="col">
                        <label class="text-white" for="numeros">TELEFONO</label>
                        <input type="text" id="celular" class="form-control" name="celular" pattern="[0-9]+" maxlength="10" minlength="10" placeholder="TELEFONO" >
                    </div>
                    <div class="col">
                        <label class="text-white">EMAIL</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="EMAIL" >
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label class="text-white">CONTRASE??A</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="CONTRASE??A">
                    </div>
                    <div class="col">
                        <label class="text-white">CONFIRMAR CONTRASE??A</label>
                        <input id="password-confirm" type="password" class="form-control" name="cpassword"  placeholder="CONFIRMAR CONTRASE??A">
                    </div>
                </div>
                <br>



                <script tcype="text/javascript">
                    function enableSending() {
                        document.loginform.submit.disabled = !document.loginform.terms.checked;
                    };
                </script>


                 <div class="terms">
                    <input type="checkbox" name="terms" onClick="enableSending()">
                    <label for="terms"><p style="color:black;padding-left:20px;">Aceptar los
                    <a href=""  data-toggle="modal" data-target=".bd-example-modal">T??rminos y Condiciones</a>  
                    </p></label>                    
                 </div>                 
                
                <input type="submit" name="submit" value="Registrar" class="contact_btn" disabled>
                <a  href="{{ route('login') }}" type=""  class="contact_btn">Login</a>            
               <br>
            </form>
        </div>       
    </div>
</div>





<div class="modal fade modal fade bd-example-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title"><center><h1 class="modal-title"><center>POL??TICA DE PRIVACIDAD</center></h1></center></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p> 
            <p> El presente Pol??tica de Privacidad establece los t??rminos en que AlfareMex usa y protege la informaci??n que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compa????a est?? comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de informaci??n personal con la cual usted pueda ser identificado, lo hacemos asegurando que s??lo se emplear?? de acuerdo con los t??rminos de este documento. Sin embargo esta Pol??tica de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta p??gina para asegurarse que est?? de acuerdo con dichos cambios.
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
  <button type="button" class="btn btn-danger" data-dismiss="modal">De Acuerdo</button>
      
    </div>
  </div>
</div>
</div>
@endsection 

