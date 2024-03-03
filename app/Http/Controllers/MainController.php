<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    //
    public function home()
    {
        $all_products = Product::all();
        $all_categories = Category::all();

        $last10products = Product::orderBy('created_at', 'desc')->take(10)->get();
        return view('index', compact('all_products', 'all_categories', 'last10products'));
    }

    public function contact()
    {
        return view('contact');
    }


    public function product($id)
    {
        $produit = Product::find($id);

        if (!$produit) return redirect()->route('index');

        return view('product', compact('produit'));
    }

    public function shop()
    {

        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function shopByCategory($category_id)
    {

        $products = Product::where('category_id', $category_id)->get();
        return view('shop', compact('products'));
    }


    public function filtrer(Request $request)
    {

        $price = $request->input('price');

        if ($price == '20-50') {
            $products = Product::whereBetween('price', [25, 50])->get();
        } elseif ($price == '50-100') {
            $products = Product::whereBetween('price', [50, 100])->get();
        } elseif ($price == '100-250') {
            $products = Product::whereBetween('price', [100, 250])->get();
        } else {
            $products = Product::all();
        }


        return view('shop', compact('products'));
    }


    public function addToCard(Request $request)
    {
        //$id = id du produit
        $id = $request->input('id');
        //
        $product = Product::find($id);

        $card = array();
        if (Session::has('card')) {
            $card = Session::get('card');
        }

        array_push($card, $product);
        Session::put('card', $card);
        return back();
    }


    public function deleteCard(Request $request)
    {
        $index = $request->input('index');
        $card = array();
        if (Session::has('card')) {
            $card = Session::get('card');
        }
        // supprimer l'element selon son position
        array_splice($card, $index, 1);


        Session::put('card', $card);
        return back();
    }


    public function card()
    {
        $card = array();
        if (Session::has('card')) {
            $card = Session::get('card');
        }

        $totale = 0;
        foreach ($card as $p) {
            $totale += $p->price;
        }

        return view('card' , compact('card' , 'totale'));
    }
}
