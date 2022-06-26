@extends('layouts/structure')
@section('title')
    Услуга
@endsection
@section('content')
    <div class="container">
        <div class="inner">
            <section class="service">
                <div class="service__info">
                    <h2>Дизайн проект</h2>
                    <div class="service__text">
                        <p class="service__paragraph">Дизайн-проект это это пакет документов, по которым выполняются ремонтно
                            - отделочные работы, происходит наполнение интерьеров техникой, мебелью, декорами. </p>
                        <p class="service__paragraph">Архитектурное проектирование включает себя разработку функциональных
                            особенностей помещения, его перепланировку, предопределяет, где и какое разместится
                            оборудование, мебель, источники света. Здесь же подразумевается принятие технических решений по
                            устройству конструкций проемов, лестниц, перегородок, потолков и полов, принимаются технические
                            решения по устройству системы кондиционирования и вентиляции, канализации и электроснабжения,
                            саун, бассейнов, каминов, теплых полов и тд.</p>
                    </div>
                </div>
                <img src="img/service.png" alt="План дома" class="service__img">
            </section>
            <section class="our-works">
                <h2>Наши работы</h2>
                <ul class="our-works__list grid grid--big">
                    @foreach (App\Models\OurWork::all()->sortBy('id') as $item)
                        <li><img src="{{ $item->getImgSrc() }}"></li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
