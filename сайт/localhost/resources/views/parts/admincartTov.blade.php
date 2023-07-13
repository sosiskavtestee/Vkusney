<div style=" width: 250px !important; height: 350px;   border: 3px solid #e7f3fb;
    box-shadow: 0px 5px 27px 6px rgba(0, 0, 0, 0.1);
    border-radius: 43px; ">
    
    <div class="cen">
        <div class="mr-tb">
            <br>
           <img width="150"  src="{{$one['image']}}" alt="d">
        </div>
        <a href="/katalog/{{$one['id']}}" class="hh4">{{$one['name']}}</a>
        <div class="mr-tb">
            {{$one['packaging']}},
            {{$one['percent']}}%,
            {{$one['weight']}}
        </div>
    </div>
    <p class="hh4 cen">{{$one['price']}} &#8381;/шт.</p>

    <div style="text-align: center;" >        
             <a href="/admin/tovar/edit/{{$one['id']}}"> (редактировать) </a>
              <a href="/admin/tovar/delete/{{$one['id']}}"> (удалить) </a>
    </div>

</div>
