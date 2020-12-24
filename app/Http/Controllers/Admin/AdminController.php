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
//        $admin = $request->user();
//        $products = $admin->products;

        $products = Product::all();

        return view('admin.index', ['products' => $products]);
    }


    public function getProduct($id) {
        $product = Product::find($id);
        $manufacturers = Manufacturer::all();
        $sites = Site::all();
//        dd($product);
        return view('admin.update', ['product'=>$product,'manufacturers' => $manufacturers, 'sites' => $sites]);
    }

    public function saveChange(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:255',
                'description'=>'required',
                'manufacturer'=> 'required',
                'price'=>'required',
                'site'=>'required',
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $manufacturer_id = $this->getManufacturer($request->manufacturer);
        $site_id = $this->getSite($request->site, $manufacturer_id);
        $product->manufacturer_id = $manufacturer_id;
        $product->site_id = $site_id;
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
        //        $manufacturers = Manufacturer::where('name','23')->orderBy()->get();//collection
        $product->name = $request->name;
        $product->description = $request->description;
        $manufacturer_id = $this->getManufacturer($request->manufacturer);
        $site_id = $this->getSite($request->site, $manufacturer_id);
        $product->manufacturer_id = $manufacturer_id;
        $product->site_id = $site_id;
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

    private function getManufacturer($request) {
        $manufacturer = Manufacturer::where('name', $request)->first();
        if(!$manufacturer) { // если ненайдено
            $manufacturer = $this->addManufacturer($request);
        }
        return $manufacturer->id;
    }
    private function addManufacturer($request){
        $manufacturer = new Manufacturer();
        $manufacturer->name = $request;
        $manufacturer->save();
        return $manufacturer;
    }
    private function getSite($request, $manufacturer_id)
    {
        $site = Site::where('name', $request)->first();
        if (!$site) {
            $site = $this->addSite($request, $manufacturer_id);
        }
        return $site->id;
    }
    private function addSite($request, $manufacturer_id){
        $site = new Site();
        $site->name = $request;
        $site->owner = $manufacturer_id;
        $site->save();
        return $site;
    }


}
