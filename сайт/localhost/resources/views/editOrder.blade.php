@extends('layouts.app')

@section('title') Редактировать заказ @endsection
@section('content')

<div class="container d-flex flex-row justify-content-center w-100">

    <div class="row flex-row  justify-content-center w-50 align-items-center mt-5">


@php  
            $status = [0 => 'Доставляется', 'Доставлен', 'Самовывоз'];
            @endphp

        <form enctype="multipart/form-data" action="/admin/order/edit/{{$order->id}}/editOrderSave" method="POST"
            class="d-flex col flex-column w-25">
            <h3>Редактирование заказа</h3>
        

            <label for="">ID корзины</label>
                <p>
                    {{$order->cart_id}}
                </p>

            <label for="">ID пользователя, его имя</label>
                <p>
                    {{$order->user_id}}
                </p>


                <label for="">Статус</label>
                <select name="status" class="select2">
                                @foreach ($status as $k => $s)
                                    <option value="{{ $k }}" @if ($k == $order->status) selected @endif>
                                        {{ $s }}
                                    </option>
                                @endforeach
                            </select>
        
                
                <br>
                <input type="hidden" value="{{$order->id}}" name="id">
                @csrf
                <input type="submit" class="mt-3" value="Сохранить">
        </form>
    </div>
</div>
@endsection
