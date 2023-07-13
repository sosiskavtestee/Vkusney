@extends('layouts.app')

@section('title') Редактировать товар @endsection
@section('content')

<div class="container d-flex flex-row justify-content-center w-100">

    <div class="row flex-row  justify-content-center w-50 align-items-center mt-5">

        <form enctype="multipart/form-data" action="/katalog/tovar/edit/{{$tovar->id}}/editSave" method="POST"
            class="d-flex col flex-column w-25">
            <h3>Редактирование товара</h3>
            <label for="">Название</label>
            <input value="{{$tovar->name}}" name="name">
            
            <label for="">Категория</label>
            <select name="category" class="select2">
                @foreach ($category as $one)
                <option value="{{$one->id}}" @if ($one->id==$tovar->category_id) selected @endif>
                    {{$one->name}}
                </option>
                @endforeach
                </select>
                <label for="">Цена</label>
                <input value="{{$tovar->price}}" name="price">
                 <label for="">В наличии</label>
                <input value="{{$tovar->amount}}" name="amount">
                <label for="">Тара</label>
                <input value="{{$tovar->packaging}}" name="packaging">
                <label for="">Процентность</label>
                <input value="{{$tovar->percent}}" name="percent">
                <label for="">Вес</label>
                <input value="{{$tovar->weight}}" name="weight">
                <label for="">Описание</label>
                <input value="{{$tovar->desc}}" name="desc">

                <label for="">Изображение</label>
                <img src="{{$tovar->image}}" width=" 300px" alt="d">
                <input type="file" name="image">
                <img width="150" src="{{Storage::url($tovar->image)}}">
                <br>
                <input type="hidden" value="{{$tovar->id}}" name="id">
                @csrf
                <input type="submit" class="mt-3" value="Сохранить">
        </form>
    </div>
</div>
@endsection
