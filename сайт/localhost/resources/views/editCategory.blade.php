@extends('layouts.app')

@section('title') Редактировать категорию @endsection
@section('content')

<div class="container d-flex flex-row justify-content-center w-100">

    <div class="row flex-row  justify-content-center w-50 align-items-center mt-5">

        <form enctype="multipart/form-data" action="/katalog/category/edit/{{$category->id}}/editCategSave" method="POST"
            class="d-flex col flex-column w-25">
            <h3>Редактирование категории</h3>
            <label for="">Название</label>
            <input value="{{$category->name}}" name="name">
                <input type="hidden" value="{{$category->id}}" name="id">
                @csrf
                <input type="submit" class="mt-3" value="Сохранить">
        </form>
    </div>
</div>
@endsection
