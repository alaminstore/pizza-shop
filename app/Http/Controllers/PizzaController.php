<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){

        $pizzas = Pizza::all(); //retrive all kind of different records inside that table
        //$pizzas = Pizza::orderBy('name','desc')->get();
        //$pizzas = Pizza::orderBy('price','desc')->get();
       // $pizzas = Pizza::where('type','hawaiin')->get();
        //$pizzas = Pizza::latest()->get();

        return view('pizzas.index',[
            'pizzas' => $pizzas
            ]);
    }

    public function show($id){

        $pizza = Pizza::findOrFail($id);

        return view('pizzas.show',['pizza' => $pizza]);
    }

    public function create(){
        return view('pizzas.create');
    }
    
    public function store(){
        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();
        return redirect('/')->with('msg','Thanks for order a pizza');
    }

    public function destroy($id){
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return  redirect('/pizzas');
    }

}
