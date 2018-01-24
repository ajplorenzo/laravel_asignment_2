@extends('layouts.layout')

@section('content')
    <div class="album text-muted">
      <div class="container">

        <div class="row">
          @foreach ($whislist as $wishlist_product)
          <div class="card">
              <div>
                <img src="images/{{$wishlist_product->Product->image}}" alt="Card image cap" style = "padding: 2rem;">
              </div>
              <p class="card-text">{{$product->name}}</p>
              <ul>
                <li>{{$wishlist_product->Product->colour}}</li>
                <li>{{$wishlist_product->Product->type}}</li>
                <li>{{$wishlist_product->Product->brand}}</li>
              </ul>
              <p style="text-align: right; color: red; font-size: 3rem; ">
                €{{$wishlist_product->Product->price}}
              </p>
              @if(auth()->check())
                <form name="delete_from_wishlist" method="DELETE" action="/wishlist/delete/{{ $wishlist_product->Product->id }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="product_id" value="{{$wishlist_product->Product->id}}" />
                  <button type="submit" class="btn btn-danger" style="width: 100%;">Borrar</button>
                </form>
              @endif
          </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection