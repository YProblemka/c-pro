@extends('layouts/structure')
@section('title')
    Блог подробнее
@endsection
@section('content')
    <div class="container">
        <div class="inner">
            <section class="blog-details">
                <h2>Сделали квартиру в танхаусе</h2>
                <p class="subtitle blog-details__date">09.02.2021</p>
            </section>
            <section class="our-works">
                <ul class="our-works__list grid grid--big">
                    <li><img src="img/our-works1.png" alt="Проводка"></li>
                    <li><img src="img/our-works2.png" alt="Отопление"></li>
                    <li><img src="img/our-works3.png" alt="Проводка"></li>
                    <li><img src="img/our-works4.png" alt="Отопление"></li>
                    <li><img src="img/our-works5.png" alt="Пол"></li>
                    <li><img src="img/our-works6.png" alt="Отопление"></li>
                </ul>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
