<div class="cart">
    <div class="cen">
        <div class="mr-tb">
            <br>
            <img src="{{$one['image']}}" width=" 300px" alt="d">
        </div>
        <a href="/katalog/{{$one['id']}}" class="hh4">{{$one['name']}}</a>
        <div class="mr-tb">
            {{$one['packaging']}},
            {{$one['percent']}}%,
            {{$one['weight']}}
        </div>
    </div>
    <p class="hh4 cen">{{$one['price']}} &#8381;/шт.</p>

    <div class="d-flex mr-tb mr-l" >

        <div class="pd-t">
            
            <a href="" class="bt-1">В корзину</a>
            <a href="/katalog/{{$one['id']}}" class="bt-2">Подробнее</a> 
        </div>
    </div>

</div>
