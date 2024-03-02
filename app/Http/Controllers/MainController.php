<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function home()
    {
        $all_products = Product::all();
        $all_categories = Category::all();

        return view('index' , compact('all_products' , 'all_categories'));
    }

    public function contact()
    {
        return view('contact');
    }


    public function product($id){
        $produit = Product::find($id);
        
        if(!$produit) return redirect()->route('index');

        return view ('product' , compact('produit'));
    }

}
