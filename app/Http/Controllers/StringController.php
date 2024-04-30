<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StringController extends Controller
{
    public function index()
    {
        echo '<h1>String Controller</h1>';
        $rs = Str::of('Welcome to my Laravel')->after('Welcome to my');
        echo "<br> 결과: ". $rs ."<br>";

        echo "Str::of('This is my name')->before('my');";
        $rs = Str::of('This is my name')->before('my');
        echo "<br> 결과: ". $rs ."<br>";
    }
}
