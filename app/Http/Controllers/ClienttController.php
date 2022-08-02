<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Http\Request;
use App\Models\Clientt;
use App\Models\Role;

class ClienttController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
   
    public function create()
    {
       
        return view('clientt.create');
    }

    public function store(UserFormRequest $request)
    {
        $clientt = new Clientt();

        $clientt->name = request('name'); 
        $clientt->name = request('apaterno'); 
        $clientt->name = request('amaterno'); 
        $clientt->celular = request('telefono');
        $clientt->email = request('email');       
        $clientt->password = bcrypt(request('password'));

        $clientt->save();

 

        return redirect('clientt');
    }

 //   public function show($id)
   // {
 //       return view('usuarios.show',['user' => User::findOrFail($id)]);
    //}
//
    //public function edit($id)
   // {
      //  $user = User::findOrFail($id);
     //   $roles = Role::all(); 
     //   return view('usuarios.edit',['user' => $user, 'roles' => $roles]);
  
}
