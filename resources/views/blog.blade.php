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
                    @foreach ($paginate->sortBy('id') as $item)
                        <li class="blog__item">
                            <div class="card">
                                <img src="img/blog.png" class="card__img">
                                <p class="card__title">{{ $item->title }}</p>
                                <p class="card__date">{{ $item->date }}</p>
                                <a href="{{ route('blog-details', ['post' => $item->id]) }}"
                                    class="btn btn-hover">Подробнее</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if ($paginate->lastPage() > 1)
                    <div class="align-center">
                        <ul class="pagination">

                            @if ($paginate->lastPage() > 1 && $paginate->currentPage() != 1)
                                <li class="pagination__item"><a class="pagination__link"
                                        href="{{ $paginate->url($paginate->currentPage() - 1) }}"><img  id="paginate-left-arrow"src="img/arrow.svg"
                                            alt="Назад"></a>
                                </li>
                            @endif

                            @if ($paginate->currentPage() > 4)
                                <li class="pagination__item"><a class="pagination__link"
                                        href="{{ $paginate->url(1) }}">1</a>
                                </li>
                                <li class="pagination__item"><a class="pagination__link"
                                        style="background: none; cursor: default">...</a></li>
                            @endif

                            @for ($i = $paginate->currentPage() > 4 ? $paginate->currentPage() - 2 : 1; $i <= ($paginate->currentPage() < $paginate->lastPage() - 3 ? $paginate->currentPage() + 2 : $paginate->lastPage()); $i++)
                                <li
                                    class="pagination__item">
                                    <a class="pagination__link {{ $i == $paginate->currentPage() ? 'pagination__link--active' : '' }}" href="{{ $paginate->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($paginate->currentPage() < $paginate->lastPage() - 3)
                                <li class="pagination__item"><a class="pagination__link"
                                        style="background: none; cursor: default">...</a></li>
                                <li class="pagination__item"><a class="pagination__link"
                                        href="{{ $paginate->url($paginate->lastPage()) }}">{{ $paginate->lastPage() }}</a>
                                </li>
                            @endif

                            @if ($paginate->lastPage() > 1 && $paginate->currentPage() != $paginate->lastPage())
                                <li class="pagination__item"><a class="pagination__link"
                                        href="{{ $paginate->url($paginate->currentPage() + 1) }}"><img id="paginate-right-arrow"
                                            src="img/arrow.svg" alt="Вперед"></a>
                                </li>
                            @endif

                        </ul>
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection
