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
        $products = Product::paginate(5); // создаётся пагинация(отображение колличества элементов на странице, simplePaginate (делает внесто номеров переода, указатели)

//        dd($products->getAttributes());
//        $products->description = mb_substr($products->description, 0 , 200).'...';

        return view('products.index', ['products'=>$products,]);
    }

    public function select($id) {
        $product = Product::find($id);
        $product->getAttributes();

        return view('products.select', ['product'=>$product]);
    }

}
