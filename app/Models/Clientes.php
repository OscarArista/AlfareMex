<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
}

class Categorias extends Model
{
    use HasFactory;
    protected $table = 'clientt';
    protected $fillable = ['name' , 'apaterno','amaterno','telefono','email','password'];  
   
}
