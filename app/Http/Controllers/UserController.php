<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        echo "method() <br>";
        echo $request->method();
        echo "<br>";
        echo $request->url();
        echo "<br>";
        echo $request->fullUrl();
        echo "<br>";
        echo $request->path();
    } 
}
