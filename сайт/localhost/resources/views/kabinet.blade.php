@extends('layouts.app')
@section('title') Личный кабинет @endsection
@section('content')

<div class="d-flex container">
    <div>

        <div class="cart-leader" style="text-align: center;">
            <div class="photo-leader" style="background: url({{ $user['image'] }}) no-repeat;  background-size: 200%;">
            </div>
            <div class="otstup"></div>
            <div class="name-leader">{{ $user['name'] }}</div>
        </div>
        <div>

        </div>

    </div>

     <div style="margin-left: 50px;">
    <div slyle="display:block; ">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Личные данные</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">История
                    заказов</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Адреса
                    доставки</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="d-flex" style="margin: 20px 0">
                    <div style="margin: 0 20px">
                    <p>Имя: {{ $user['name'] }}</p>
                     <p>Почта: {{ $user['email'] }}</p>
                     </div>
                      <div>
                    <p>Телефон: {{ $user['phone'] }}</p>
                   
                    <p>Тип профиля:
                        @if ($user->type == 1)
                        Розница
                        @else
                        Оптом
                        @endif </p>
                         </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                ...</div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                ...</div>
            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                tabindex="0">...</div>
        </div>
    </div>
</div>
</div>
@endsection
