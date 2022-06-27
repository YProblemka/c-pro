@extends('layouts/admin-structure')
@section('title')
    Блог
@endsection
@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Блог</h1>
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
                        <button class="btn app-btn-primary add-btn add-btn-blog"><i class="fa fa-plus"
                                style="margin-right:5px;"></i>Создать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 all-cards">
        @foreach (App\Models\Post::all() as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-4">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <div class="app-card-body p-3">
                        <h4 class="app-doc-title truncate mb-0" title="{{ $item->name }}">{{ $item->name }}</h4>
                        <input type="text" name="name" class="change-input" placeholder="Название услуги"
                            value="{{ $item->name }}">
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                <li class="blog-dcp-text">
                                    <span class="text-muted">Дата:</span>
                                    <span class="admin-blog-date">{{ $item->date }}</span>
                                </li>
                                <input type="text" name="price" class="change-input-price" placeholder="Цена товара"
                                    value="{{ $item->getPrice() }}">
                            </ul>
                        </div>
                        <button class="change-btn change-btn-blog btn btn-primary">Изменить</button>
                        <button class="save-btn save-btn-blog btn btn-primary" id="{{ $item->id }}">Сохранить</button>
                        <button class="delete-btn btn btn-primary" path="service"><i class="far fa-trash-alt"
                                style="color: white;"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($paginate->lastPage() > 1)
        <ul class="pagination">

            @if ($paginate->lastPage() > 1 && $paginate->currentPage() != 1)
                <li><a href="{{ $paginate->url($paginate->currentPage() - 1) }}">&laquo;</a>
                </li>
            @endif

            @if ($paginate->currentPage() > 4)
                <li><a href="{{ $paginate->url(1) }}">1</a>
                </li>
                <li><a style="background: none; color: #75c5f0; cursor: default">...</a></li>
            @endif

            @for ($i = $paginate->currentPage() > 4 ? $paginate->currentPage() - 2 : 1; $i <= ($paginate->currentPage() < $paginate->lastPage() - 3 ? $paginate->currentPage() + 2 : $paginate->lastPage()); $i++)
                <li class="{{ $i == $paginate->currentPage() ? 'active' : '' }}"><a
                        href="{{ $paginate->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($paginate->currentPage() < $paginate->lastPage() - 3)
                <li><a style="background: none; color: #75c5f0; cursor: default">...</a></li>
                <li><a href="{{ $paginate->url($paginate->lastPage()) }}">{{ $paginate->lastPage() }}</a>
                </li>
            @endif

            @if ($paginate->lastPage() > 1 && $paginate->currentPage() != $paginate->lastPage())
                <li><a href="{{ $paginate->url($paginate->currentPage() + 1) }}">&raquo;</a>
                </li>
            @endif

        </ul>
    @endif
@endsection
