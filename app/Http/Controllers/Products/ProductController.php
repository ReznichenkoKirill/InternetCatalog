<?php

namespace App\Http\Controllers\Products;

use App\Manufacturer;
use App\Product;
use App\Site;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        //TODO get All products
        $products = Product::all();
//        dd($request);

        return view('products.index', ['products'=>$products,]);
    }

    public function select($id) {
        $product = Product::find($id);
        $product->getAttributes();

        return view('products.select', ['product'=>$product]);
    }


//    private function getManufacturer($id) {
//        return $tmp = Manufacturer::find($id)->getAttributes();
//    }
//    private function getSite($id){
//        return $tmp = Site::find($id)->getAttributes();
//    }
}
