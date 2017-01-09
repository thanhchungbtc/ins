<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->middleware(function($request, $next) {
			$categories = ProductCategory::all();
			$hotProducts = Product::all();
			view()->share(compact('categories', 'hotProducts'));
			return $next($request);
		});

	}


    public function index()
    {
    	$products = Product::all();
    	return view('sites.products.index', compact('products'));
    }

    public function show(Product $product)
    {
    	$relatedProducts = Product::all();
    	return view('sites.products.show', compact('product', 'relatedProducts'));
    }

}
