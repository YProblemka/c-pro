@extends('layouts/admin-structure')
@section('title')
    Наши работы
@endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Наши работы</h1>
        </div>
    </div>
    <div class="row g-4 all-cards">
        @foreach (App\Models\OurWork::all()->sortBy("id") as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-3">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <img src="{{ $item->getImgSrc() }}" class="admin-ourWorks-img">
                    <div class="app-card-body p-3">
                        <input type="file" class="add-img-btn">
                        <button class="change-btn change-btn-ourWorks btn btn-primary">Изменить</button>
                        <button class="save-btn save-btn-ourWorks btn btn-primary"
                            id="{{ $item->id }}">Сохранить</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
