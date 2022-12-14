@extends('layouts.init')
@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-header">{{ __('') }}</div>
                <div class="card-header">{{ __('inicio') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    //<form method="POST" action="{{ route('home') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
<br><br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="conatiner">
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
                <p></p>
                <div class="social-icons">
                        <img src="{{asset('img/favicon_higienika_office_peru.png')}}" alt="">
                        <p></p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
                <h3 class="contact_tittle">INGRESA TUS DATOS</h3>
                <div class="input-container">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong><h6 style="color:yellow;">{{ __('Por favor digite bien su usuario o contrase??a') }}</h6></strong>
                            </span>
                        @enderror
                </div>
               
                 <div class="input-group">
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required  placeholder="CONTRASE??A" autocomplete="current-password"
                    minlength="5" maxlength="40" pattern="[A-Za-z0-9]+">
                    <div class="input-group-append">
            <button id="show_password" class="btn btn-dark" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div>
          </div>
          <br>
                
                
                
                <input type="submit" value="Login" class="contact_btn">
               @if (Route::has('register'))
             
                  <a class="contact_btn" href={{ route('register') }}> {{ __('Register')}}</a>
              
              @endif
              <a class="contact_btn" href="{{ url('/')}}">Inicio</a>
                 <br><br>
               
                    <div class="form-group row mb-0">
                                @if (Route::has('password.request'))
                                
                              
                                <a class="text-dark" href="{{ route('password.request') }}">
                                        {{ __('??Olvidaste tu contrase??a?') }}
                                    </a>
                                @endif
                    </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contrase??a
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
</div>
@endsection 








































