<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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


    public function list_categories(){

        $categories = Category::all();

        return view('admin.liste_categories' , compact('categories'));
    }

    public function ajouter_categorie(){

        $categories = Category::all();
        return view('admin.ajouter_categorie' , compact('categories') );
    }

    public function save_categorie(Request $form){

        $p = new Category();
        $p->title = $form->input('title');


        if($form->hasFile('image')){
            $p->image = $form->file('image')->store('categories');
        }

        $p->save();
        return redirect()->route('list_categories');

    }

    public function delete_categorie($id){
         Category::find($id)->delete();

        return redirect()->route('list_categories');
    }

    public function edit_categorie(Request $form , $id){

        $p = Category::find($id);
        $p->title = $form->input('title');

        if($form->hasFile('image')){
            $p->image = $form->file('image')->store('categories');
        }
        $p->save();
        return redirect()->route('list_categories');

    }
}
