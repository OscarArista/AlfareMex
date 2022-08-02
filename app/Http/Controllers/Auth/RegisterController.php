<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\Clientt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postregister(Request $request){
        $rules = [
          'name' => 'required',
          'apaterno' => 'required',
          'amaterno' => 'required',
          'celular' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:8',
          'cpassword' => 'required|min:8|same:password'
        ];
        $message = [
          'name.required' => 'Su nombre es requerido.',
          'apaterno.required' => 'Sus Apellido Paterno es requerido.',
          'amaterno.required' => 'Sus Apellidos Materno es requerido.',
          'celular.required' => 'Sus telefono es requeridos.',
          'email.required' => 'El Email es requerido.',
          'email.email' => 'El formato de su Email no es el correcto.',
          'email.unique' => 'El Email ya está en uso por otro usuario.',
          'password.required' => 'Su Contraseña es requerido.',
          'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
          'cpassword.required' => 'Es necesario confirmar su contraseña.',
          'cpassword.min' => 'La contraseña debe tener mínimo 8 caracteres.',
          'cpassword.same' => 'Las contraseñas no coinciden.',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()):
          return back()->withErrors($validator)->with('message','Se ha producido un error:')->with('typealert','danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));
            $user->apaterno = e($request->input('apaterno'));
            $user->amaterno = e($request->input('amaterno'));
            $user->celular = e($request->input('celular'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            if($user->save()):
                $id = $user->id;
                DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$id, 3]);
              return redirect('/')->with('message','La cuenta esta registrada')->with('typealert','info');
            endif;
        endif;
      }
}
