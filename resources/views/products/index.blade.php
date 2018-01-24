@extends('layouts.layout')

@section('content')
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Retro Radios, Vintage Radios &amp; More</h1>
        <p class="lead text-muted">A staple in every Irish home! We have a range of radios, retro radio and vintage radios, so you can keep up with everything that’s happening on the airwaves. We have alarm-clock radios with digital display so you can wake up the right way every morning. To add a touch of style to the room, go for one of our retro vintage style radios. We've also got internet radios to let you tune into any show you want across the world. We've even got portable radios, so you can take your favourite shows with you. Keep it simple with an FM radio, or go for something more sophisticated with DAB +. Browse our range of radios today and get the best deal with our Price Match Promise.</p>
      </div>
    </section>

    <div class="album text-muted">
      <div class="container">

        <div class="row">
          @foreach ($products as $product)
          <div class="card">
              <div>
                <img src="images/{{$product->image}}" alt="Card image cap" style = "padding: 2rem;">
              </div>
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
                <form method="POST" action="add/{{$product->id}}">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-success" style="width: 100%;">Add to your wishlist</button>
                </form>
              @endif
          </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection
