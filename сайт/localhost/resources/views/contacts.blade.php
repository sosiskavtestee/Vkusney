@extends('layouts.app')
@section('title') Контакты @endsection
@section('content')

<p class="ch2 mr-tb-1">
    Контакты
</p>
<div class="container">
<p style="font-weight: 700;">Вы можете связаться с нами:
</p>
<p>
+7 991 376 01 79</p>
<p>spk-sibir@bk.ru</p>
<p>рп. Усть-Абакан, Добровольского, 20</p>


    @include('parts.where')
@endsection
