@extends('layouts/structure')
@section('title')
    Блог подробнее
@endsection
@section('content')
    <div class="container">
        <div class="inner">
            <section class="blog-details">
                <h2>{{ $post->title }}</h2>
                <p class="subtitle blog-details__date">{{ $post->date }}</p>
            </section>
            <section class="our-works">
                <ul class="our-works__list grid grid--big">
                    @foreach ($post->imgs() as $item)
                        <li><img src="{{ $item->getImgSrc() }}"></li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
