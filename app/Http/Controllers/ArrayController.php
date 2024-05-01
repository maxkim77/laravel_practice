<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ArrayController extends Controller
{
    public function index()
    {
        echo '<h1>Array Helper</h1>';
        // $array = [100,200,300,100];
        // $result = Arr::last($array, function($value, $key) {
        //     return $value >= 200;
        // });
        // echo $result;

        // $array = ['name'=> 'Desk'];
        // $result = Arr::add($array, 'price', 100);
        // print_r($result);
        // $array = ['name'=> 'Desk', 'price' => null];
        // print_r($array);
        // $result = Arr::add($array, 'pricex', 100);
        // print_r($result);

        // flatten()
        // $array = ['name'=> 'Joe','language'=>['PHP', 'Ruby']];
        // print_r($array);

        // $result = Arr::flatten($array);
        // print_r($result);
        $array = ['products' => ['desk' => ['price' => 100]]];
        $result = Arr::dot($array);
        print_r($result);
    }
}
