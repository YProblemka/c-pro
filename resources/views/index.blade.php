@extends('layouts/structure')
@section('title')
    С-про
@endsection
@section('content')
    <div class="container">
        <div class="inner">
            <section class="jb">
                <img src="img/jb.png" alt="">
                <h1>Сервис С PRO - инженерия для вашего дома</h1>
            </section>
            <section class="index-screen">
                <aside>
                    <nav class="nav">
                        <h3 class="nav__title">Все услуги</h3>
                        <ul class="nav__list">
                            <li class="nav__item"><a href="" class="nav__link">Отопление</a></li>
                            <li class="nav__item"><a href="" class="nav__link">Водоснабжение</a></li>
                            <li class="nav__item"><a href="" class="nav__link">Автономные канализации</a></li>
                            <li class="nav__item"><a href="" class="nav__link">Теплые полы</a></li>
                            <li class="nav__item"><a href="" class="nav__link">Сборка Котельной</a></li>
                            <li class="nav__item"><a href="" class="nav__link">Электричесвто</a></li>
                            <li class="nav__item"><a href="{{route("service")}}" class="nav__link">Дизайн проект</a></li>
                        </ul>
                    </nav>
                </aside>
                <div class="our-works">
                    <h2>Наши работы</h2>
                    <ul class="our-works__list grid">
                        <li><img src="img/our-works1.png" alt="Проводка"></li>
                        <li><img src="img/our-works2.png" alt="Отопление"></li>
                        <li><img src="img/our-works3.png" alt="Проводка"></li>
                        <li><img src="img/our-works4.png" alt="Отопление"></li>
                        <li><img src="img/our-works5.png" alt="Пол"></li>
                        <li><img src="img/our-works6.png" alt="Отопление"></li>
                    </ul>
                </div>
            </section>
            <section class="blog index-blog">
                <h2>Блог</h2>
                <ul class="blog__list">
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                    <li class="blog__item">
                        <div class="card">
                            <img src="img/blog.png" alt="" class="card__img">
                            <p class="card__title">Сделали квартиру в танхаусе</p>
                            <p class="card__date">09.06.2022</p>
                            <a href="" class="btn btn-hover">Подробнее</a>
                        </div>
                    </li>
                </ul>
                <div class="align-right">
                    <a href="{{route("blog")}}" class="load-more">Ещё <img src="img/arrow.svg" alt="Загрузить"></a>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
