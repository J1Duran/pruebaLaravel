<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class PruebaController extends Controller
{

    public function show()
    {
      $producto =product::all();
      dd($producto);
    }
  
}
