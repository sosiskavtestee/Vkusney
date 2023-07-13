@extends('layouts.app')
@section('title') Личный кабинет админа @endsection
@section('content')
@if(Auth::user()->admin)
<p class="ch2 mr-tb-1">Админ-панель</p>
<div class="d-flex container">
    <div>

        <div class="cart-leader">
            <div class="photo-leader" style="background: url({{ $user['image'] }}) no-repeat;  background-size: 200%;">
            </div>
            <div class="otstup"></div>
            <div class="name-leader">{{ $user['name'] }}</div>
        </div>
        <div>

        </div>

    </div>
    <div style="margin-left: 50px;">
        <div slyle="display:block;">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Каталог
                        товаров</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Категории
                        товаров</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Заказы</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div  style="margin-top: 20px;">
                     <a href="/admin/tovar/add"> Добавить товар</a>  <br>  <br> 
                 <div class="row row-cols-4 justify-content-between w-100 g-3">
                
                        @foreach ($tovar as $one)
                        @include('parts.admincartTov', $one)
                        @endforeach
                        {{$tovar->links('pagination::bootstrap-5')}}
                    </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                     <div  style="margin-top: 20px;">
                       <a href="/admin/category/add"> Добавить категорию</a>  <br>  <br> 
                    @foreach($category as $one)
                    {{$one['name']}} <a href="/admin/category/edit/{{$one['id']}}"> (редактировать)</a> 
                    <a href="/admin/category/delete/{{$one['id']}}" onclick="return confirm('Удалить?')" class="del">Удалить</a> <br>
                    @endforeach
                     </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    <div  style="margin-top: 20px;">
                    <table class="table">
                        <tr>
                            <th class="col-3">ID заказа</th>
                            <th class="col-3 text-center">ID корзины</th>
                            <th class="col-2">ID пользователя, имя </th>
                            <th class="col-2">Статус</th>
                            <th class="col"></th>
                        </tr>
                        @foreach ($order as $one)
                        <tr>
                            <td class="col-3">{{ $one->id }}</td>
                            <td class="col-3">{{ $one->cart_id}}</td>
                            <td class="col-3">{{ $one->user_id }}</td>
                            
                            <td class="col-3">
                                
                            @if ($one->status == 0)
                                Доставляется

                                 @elseif ($one->status == 1)
                                 Доставлен

                            @else
                                Самовывоз
                            @endif
                            </td>
                            <td class="col-3"> <a href="/admin/order/edit/{{$one['id']}}"> (редактировать)</a> </td>
                             <td class="col-3"> <a href="/admin/order/delete/{{$one['id']}}"> (удалить)</a> </td>
                        </tr>
                        @endforeach
                    </table>
                     </div>
                </div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                    tabindex="0">...</div>
            </div>
        </div>
    </div>
</div>
@else
пусто
@endif
@endsection
