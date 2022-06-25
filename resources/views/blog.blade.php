@extends('layouts/structure')
@section('title')
    Блог
@endsection
@section('content')
    <div class="container">
        <div class="inner">
            <section class="blog">
                <h2>Блог</h2>
                <ul class="blog__list">
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="{{route("blog-details")}}" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="{{route("blog-details")}}" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="{{route("blog-details")}}" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="{{route("blog-details")}}" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="{{route("blog-details")}}" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="{{route("blog-details")}}" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                </ul>
                <div class="align-center">
                    <ul class="pagination">
                        <li class="pagination__item">
                            <a href="" class="pagination__link"><img src="img/arrow.svg" alt="Назад"></a>
                        </li>
                        <li class="pagination__item">
                            <a href="" class="pagination__link">1</a>
                        </li>
                        <li class="pagination__item">
                            <a href="" class="pagination__link pagination__link--active">2</a>
                        </li>
                        <li class="pagination__item">
                            <a href="" class="pagination__link">3</a>
                        </li>
                        <li class="pagination__item">
                            <p class="pagination__link pagination__link--disabled">...</p>
                        </li>
                        <li class="pagination__item">
                            <a href="" class="pagination__link">10</a>
                        </li>
                        <li class="pagination__item">
                            <a href="" class="pagination__link"><img src="img/arrow.svg" alt="Вперед"></a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
