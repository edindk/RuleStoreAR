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

    function getGlb($productId)
    {
        $productId;
        $glbPath = 'storage/scaleTest' . $productId . '.glb';
        return response()->file($glbPath);
    }

    function getUsdz($productId)
    {
        $usdzFile = 'storage/scaleTest' . $productId . '.usdz';
        return response()->download($usdzFile);
    }
}
