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


    public function getProduct($id) {
        $product = Product::find($id);
        $manufacturers = Manufacturer::all();
        $sites = Site::all();
//        dd($product);
        return view('admin.update', ['product'=>$product,'manufacturers' => $manufacturers, 'sites' => $sites]);
        //TODO GET OLD id row

    }

    public function saveChange(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:255',
                'description'=>'required',
                'manufacturer_id'=> 'required',
                'price'=>'required',
                'site_id'=>'required',
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->price = $request->price;
        $product->site_id = $request->site_id;
        $product->save();
        return redirect(route('admin.index'));
    }

    public function delete(Product $product, Request $request)
    {
//        dd($product->owner_id);
        if($request->user()->id == $product->owner_id){
            $product->delete();
        }
        return redirect(route('admin.index'));
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:255',
                'description'=>'required',
                'manufacturer'=> 'required',
                'price'=>'required',
                'site'=>'required',
                ]);
        
        $product = new Product();
        
        $site = new Site();
        //        $manufacturers = Manufacturer::where('name','23')->orderBy()->get();//collection
        
        $product->name = $request->name;
        $product->description = $request->description;
        $manufacturer = Manufacturer::where('name', $request->manufacturer)->first();
        $site = Site::where('name',$request->site)->first();
        if(!$manufacturer){ // если ненайдено
            $manufacturer = new Manufacturer();
            $manufacturer->name = $request->manufacturer;
            $manufacturer->save();
        } else {
            $product->manufacturer_id = $manufacturer->id;
        }
        if(!$site){
            $site = new Site();
            $site->name = $request->site;
            $site->owner = $manufacturer->id;
            $product->site_id = $site->id;
            $site->save();
        }else {
            $product->site_id = $site->id;
        }
        $product->price = $request->price;
        $product->owner_id = $request->user()->id;
        $product->save();
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
