@extends('layouts.app')
@section('title') Каталог @endsection
@section('content')

@include('parts.sl2')
<p class="hlkr"><a href="/">Главная</a>/<a href="/katalog">Каталог продукции</a></p>
<p class="ch2 mr-tb-1">Каталог продукции</p>
<div class="container d-flex flex-row ">
    <div class="cat">
        <p class="h4">Каталог</p>
@foreach($category as $one)
<a href="/katalog/kategory/{{$one['id']}}">{{$one['name']}}</a> <br>
@endforeach
</div>
    <div class="row row-cols-3 justify-content-between w-100 g-3">
        @foreach ($tovar as $one)
        @include('parts.cartTov', $one)
        @endforeach
        {{$tovar->links('pagination::bootstrap-5')}}
    </div>

</div>

@include('parts.ourprod', $one)
@include('parts.sl3')
@include('parts.stocks')
@include('parts.production')
@include('parts.where')
@endsection
