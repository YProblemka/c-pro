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
                            @foreach (App\Models\Service::all()->sortBy('name') as $item)
                                <li class="nav__item"><a href="{{ route('service', ['service' => $item->id]) }}"
                                        class="nav__link">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
                <div class="our-works">
                    <h2>Наши работы</h2>
                    <ul class="our-works__list grid">
                        @foreach (App\Models\OurWork::all()->sortBy('id') as $item)
                            <li><img src="{{ $item->getImgSrc() }}"></li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section class="blog index-blog">
                <h2>Блог</h2>
                <ul class="blog__list">
                    @foreach (App\Models\Post::query()->orderByDesc('updated_at')->limit(3)->get()
        as $item)
                        @php
                            $images = $item->imgs();
                        @endphp
                        @if (count($images) != 0)
                            <li class="blog__item">
                                <div class="card">
                                    <img src="{{ $images[0]->getImgSrc() }}" class="card__img">
                                    <p class="card__title">{{ $item->title }}</p>
                                    <p class="card__date">{{ $item->date }}</p>
                                    <a href="{{ route('blog-details', ['post' => $item->id]) }}"
                                        class="btn btn-hover">Подробнее</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="align-right">
                    <a href="{{ route('blog') }}" class="load-more">Ещё <img src="img/arrow.svg" alt="Загрузить"></a>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
