<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getProducts()
    {
        return Product::all();
    }

    function getGlb()
    {
        $glbPath = 'storage/scaleTest.glb';
        return response()->file($glbPath);
    }

    function getUsdz()
    {
        $usdzFile = 'storage/scaleTest.usdz';
        return response()->download($usdzFile);
    }
}
