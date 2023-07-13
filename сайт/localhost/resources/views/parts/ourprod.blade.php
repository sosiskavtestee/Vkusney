<p class="ch2 mr-tb-1">Наша продукция</p>
<div class="d-flex cn">
    @foreach ($product as $one)
       <a href="/katalog" style="text-decoration: none;">     
    <div class="bl-prod" style="background: url({{$one['image']}}) no-repeat; background-size: 100%;">
        <div class="bl-prod-1">
            <div class="bl-prod-2" id="content">
            <p class="ch-4">{{$one['name']}}</p>
            <p>{{$one['desc']}}</p>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div>
