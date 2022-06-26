@extends('layouts/admin-structure')
@section('title')
    Услуги
@endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Услуги</h1>
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
                        <button class="btn app-btn-primary add-btn add-btn-services"><i class="fa fa-plus"
                                style="margin-right:5px;"></i>Создать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 all-cards">
        @foreach (App\Models\Service::all()->sortBy("name") as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-4">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <img src="{{$item->getImgSrc()}}" class="admin-services-img">
                    <div class="app-card-body p-3">
                        <input type="file" class="add-img-btn">
                        <h4 class="app-doc-title truncate mb-0" title="{{ $item->name }}">{{ $item->name }}</h4>
                        <input type="text" name="name" class="change-input" placeholder="Название услуги"
                            value="{{ $item->name }}">
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                <li class="services-dcp-text">
                                    <span class="text-muted">Описание:</span>
                                    <span class="admin-services-dcp">{{ $item->text }}</span>
                                </li>
                                <textarea name="services-dcp" class="services-dcp product-dcp" placeholder="Описание">{{ $item->text }}</textarea>
                            </ul>
                        </div>
                        <button class="change-btn change-btn-services btn btn-primary">Изменить</button>
                        <button class="save-btn save-btn-services btn btn-primary"
                            id="{{ $item->id }}">Сохранить</button>
                        <button class="delete-btn btn btn-primary" path="service"><i class="far fa-trash-alt"
                                style="color: white;"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
