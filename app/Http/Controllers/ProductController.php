<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function index(){
    $products = Product::orderBy('name', 'asc')->get();
    return $products;
  }

  public function show($id){
    $product = Product::findOrFail($id);
    return $product;
  }
}
