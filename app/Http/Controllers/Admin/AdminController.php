<?php

namespace App\Http\Controllers\Admin;

use App\Manufacturer;
use App\Product;
use App\Site;
use http\Client\Curl\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        //TODO check admin, if tru let it in
        $this->middleware('auth'); // посредник
    }

    public function index(Request $request)
    {
        $admin = $request->user();
        $products = $admin->products;
        return view('admin.index', ['products' => $products]);
    }


    public function getProduct() {
        //TODO GET OLD id row

    }

    public function saveChange(Request $request)
    {
        //TODO SAVE
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('admin.index'));
    }

    public function saveProduct(Request $request)
    {
        $tmp = new Product();
        $tmp->name = $request->name;
        $tmp->description = $request->description;
        $tmp->manufacturer_id = $request->manufacturer_id;
        $tmp->price = $request->price;
        $tmp->site_id = $request->site_id;
        $tmp->owner_id = $request->user()->id;
        $tmp->save();
        return redirect(route('admin.index'));
    }

    public function getEmptyProduct()
    {
        $product = new Product();
        $manufacturers = Manufacturer::all();
        $sites = Site::all();
        return view('admin.create', ['product' => $product, 'manufacturers' => $manufacturers, 'sites' => $sites]);
    }

}
