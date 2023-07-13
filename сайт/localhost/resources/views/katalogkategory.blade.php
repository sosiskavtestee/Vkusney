@extends('layouts.app')
@section('title') Каталог @endsection
@section('content')

@include('parts.sl2')
<p class="hlkr" style="text-decoration: underline 1px;"><a href="/">Главная</a>/<a href="/katalog">Каталог продукции</a>/<a href="/katalog/kategory/{{$category['id']}}">{{$category['name']}}</a></p>
<p class="ch2 mr-tb-1"> {{$category['name']}}</p>


<div style=" width: 70%; margin: 0 auto;" >
    <div class="row row-cols-3 justify-content-between w-100 g-3">
    @foreach ($category -> tovars as $one)
        @include('parts.cartTov', $one)
        @endforeach
       
    </div>

</div>
</div>

@endsection
