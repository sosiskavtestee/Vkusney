@extends('layouts.app')

@section('title') Добавить категорию @endsection
@section('content')

<div class="container d-flex flex-row justify-content-center w-100">

    <div class="row flex-row  justify-content-center w-50 align-items-center mt-5">

        <form enctype="multipart/form-data" action="/katalog/category/add/addCategSave" method="POST"
            class="d-flex col flex-column w-25">
            <h3>Добавить категории</h3>
            <label for="">Название</label>
             <input type="text" name="name">
             <label for="">Подкатегория</label>
             <input type="text" name="category_id">
                @csrf
                <input type="submit" class="mt-3" value="Сохранить">
        </form>
    </div>
</div>
@endsection
