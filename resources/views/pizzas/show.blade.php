@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">


    <div class="">
        <div class="wrapper pizza-details">
           <h1> Order for - {{$pizza->name}}</h1>
           <p class="type">Pizza type - {{$pizza->type}}</p>
           <p class="base">Pizza base - {{$pizza->base}}</p>
           <p class="toppings">Extra Toppings:</p>
           <ul>
              @foreach($pizza->toppings as $topping)
                <li>{{$topping}}</li>
              @endforeach
           </ul>
              <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                @csrf 
                @method('DELETE')
                <button>Complete Order</button>
              </form>
        </div>
        <a href="/pizzas" class="back"><- Back to all pizzas</a>

    </div>
</div>

@endsection