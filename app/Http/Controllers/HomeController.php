<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function list_produits(){
        $produits = Product::all();
        $categories = Category::all();

        return view('admin.liste_produits' , compact('produits' , 'categories'));
    }

    public function ajouter_produit(){

        $categories = Category::all();
        return view('admin.ajouter_produit' , compact('categories') );
    }

    public function save_produit(Request $form){

        $p = new Product();
        $p->title = $form->input('title');
        $p->price = $form->input('price');
        $p->new = $form->input('new');
        $p->best_seller = $form->input('best_seller');
        $p->hot = $form->input('hot');
        $p->description = $form->input('description');


        if($form->hasFile('image')){
            $p->image = $form->file('image')->store('products');
        }
        $p->category_id = $form->input('category_id');
        $p->save();
        return redirect()->route('list_produits');

    }

    public function delete_produit($id){
         Product::find($id)->delete();

        return redirect()->route('list_produits');
    }

    public function edit_produit(Request $form , $id){

        $p = Product::find($id);
        $p->title = $form->input('title');
        $p->price = $form->input('price');
        $p->description = $form->input('description');
        $p->price = $form->input('price');

        if($form->hasFile('image')){
            $p->image = $form->file('image')->store('products');
        }
        $p->category_id = $form->input('category_id');
        $p->save();
        return redirect()->route('list_produits');

    }
}
