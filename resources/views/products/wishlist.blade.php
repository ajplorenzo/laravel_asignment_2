@extends('layouts.layout')

@section('content')
    <div class="album text-muted">
      <div class="container">
        <div class="row">

          @foreach ($products as $product)
          <div class="card">
              <p class="card-text">{{$product->name}}</p>
              <ul>
                <li>{{$product->colour}}</li>
                <li>{{$product->type}}</li>
                <li>{{$product->brand}}</li>
              </ul>
              <p style="text-align: right; color: red; font-size: 3rem; ">
                €{{$product->price}}
              </p>
              @if(auth()->check())
                <form name="delete_from_wishlist" method="DELETE" action="/wishlist/delete">
                  {{ csrf_field() }}
                  <input type="hidden" name="product_id" value="{{$product->id}}" />
                  <button type="submit" class="btn btn-danger" style="width: 100%;">Delete</button>
                </form>
              @endif
          </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection