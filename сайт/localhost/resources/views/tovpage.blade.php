@extends('layouts.app')

@section('title') {{$tovar['name']}} @endsection
@section('content')
@include('parts.sl2')
<di style="margin: 0 0 50px 0">
    <p class="hlkr"><a href="/">Главная</a>/<a href="/katalog">Каталог продукции</a>/<a href="/katalog/kategory/{{$tovar->category->id}}">{{$tovar->category->name}}</a>/<a href="/katalog/{{$tovar['id']}}">{{$tovar['name']}}</a></p>
</di v>
<div class="container tov">




    <div>
        <img src="{{$tovar->image}}" width="600px" alt="d">
    </div>

    <div class="opis">
        <p class="ch2">{{$tovar['name']}}</p>
        <p class="hh4 cen">{{$tovar->category->name}}</p>
        <p class="hh4 cen">{{$tovar['price']}} &#8381;/шт.</p>
        <div class="tov-cen">
            <div class="tov">
                <div class="tov-inf"> {{$tovar['packaging']}} <p class="tov-h3">тара</p>
                </div>
                <div class="tov-inf"> {{$tovar['percent']}}% <p class="tov-h3">жирность</p>
                </div>
                <div class="tov-inf"> {{$tovar['weight']}}г <p class="tov-h3">вес</p>
                </div>
            </div>
        </div>
        {{$tovar['desc']}}

        <form action="/cart/add" class="d-flex to_cart-form" method="post" style="margin-top: 20px;">
            <div class="d-flex quantity-counter" style="margin-right: 10px;">
                <button class="bl-1 minus-btn amount-btn" onclick="event.preventDefault()">-</button>
                <input class="frm amount-input" id="quantity-input" max="{{ $tovar->amount }}" min="1"
                    name="quantity" type="text" value="1">
                <button class="bl-2 plus-btn amount-btn" onclick="event.preventDefault()">+</button>
            </div>

            <input name="tovar_id" type="hidden" value="{{ $tovar->id }}">
            @csrf
            <input class="bt-1 to_cart-btn" style="margin-top: -6px;" type="submit" value="В корзину">

        </form>
    </div>

   </div>




    <script>
        var tovar = <?php echo json_encode($tovar->amount); ?>;
    </script>
  <script src="{{ asset('public/js/script.js') }}"></script>
    @include('parts.sl3')
    @include('parts.where')
    @include('parts.stocks')
    @endsection
