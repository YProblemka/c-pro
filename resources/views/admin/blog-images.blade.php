@extends('layouts/admin-structure')
@section('title')
    Изменить картинки
@endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Изменить картинки</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    {{-- <div class="col-auto filter">
                        <select class="form-select w-auto">
                            <option selected disabled hidden>Сортировать по</option>
                            <option value="price">Цене</option>
                            <option value="makers">Производителю</option>
                            <option value="category">Категории</option>
                            <option value="department">Отделу</option>
                        </select>
                    </div> --}}
                    <div class="col-auto">
                        <button class="btn app-btn-primary add-btn add-btn-blog-images"><i class="fa fa-plus"
                                style="margin-right:5px;"></i>Создать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 all-cards">
        @foreach ($post->imgs()->sortBy('id') as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <img src="{{ $item->getImgSrc() }}" class="admin-blog-images-img">
                    <div class="app-card-body p-3">
                        <input type="file" class="add-img-btn">
                        <button class="change-btn change-btn-blog-images btn btn-primary">Изменить</button>
                        <button class="save-btn save-btn-blog-images btn btn-primary" id="{{ $item->id }}">Сохранить</button>
                        <button class="delete-btn btn btn-primary" path="post_img"><i class="far fa-trash-alt"
                                style="color: white;"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
