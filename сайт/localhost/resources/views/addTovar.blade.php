@extends('layouts.app')

@section('title') Добавить категорию @endsection
@section('content')

<div class="container d-flex flex-row justify-content-center w-100">

     <div class="row flex-row  justify-content-center w-50 align-items-center mt-5">

        <form enctype="multipart/form-data" action="/katalog/tovar/add/addTovarSave" method="POST"
             class="d-flex col flex-column w-25">
            <h3>Добавить товар</h3>
            <label for="">Название</label>
             <input value="" name="name">
            
            <label for="">Категория</label>
             <select multiple name="category" class="select2">
                @foreach ($category as $one)
               <option value="{{$one->id}}"> {{$one->name}}
                </option>
                @endforeach
                 </select>
                <label for="">Цена</label>
                <input value="" name="price">
                  <label for="">В наличии</label>
                <input value="" name="amount">
                <label for="">Тара</label>
                 <input value="" name="packaging">
                <label for="">Процентность</label>
                <input value="" name="percent">
                 <label for="">Вес</label>
                <input value="" name="weight">
                <label for="">Описание</label>
                 <input value="" name="desc">

                <label for="">Изображение</label>
                <input type="file" name="image">
                <br>
               
                @csrf
             
   <input type="submit" class="mt-3" value="Добавить">
        </form>
    </div>
</div>
@endsection
