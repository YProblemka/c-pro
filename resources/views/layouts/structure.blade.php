<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.svg" sizes="48x48" type="image/x-icon">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">

    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__wrapper">
                    <a href="{{ route('index') }}" class="header__logo"><img src="/img/logo.svg"
                            alt="Сервис C PRO"></a>
                    <div class="header__links">
                        <a
                            href="tel:{{ App\Models\Setting::getByName('phone1')->value }}">{{ App\Models\Setting::getByName('phone1')->value }}</a>
                        <a href="{{ App\Models\Setting::getByName('telegram')->value }}">Наш телеграм <img
                                src="/img/telegram.svg" alt="Телеграм"></a>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="container">
                <div class="footer__wrapper">
                    <div class="footer__top">
                        <form method="POST" class="footer__form form" id="footer_form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <h4 class="form__title">Закажите консультацию, оставив нам свою почту. Мы вам всё расскажем
                            </h4>
                            <input type="email" name="email" placeholder="E-mail*" required>
                            <input type="text" name="text" placeholder="Напишите, что вас интересует">
                            <button type="submit" class="btn btn-hover" id="footer_form_btn">Отправить</button>
                        </form>
                        <img src="/img/footer.png" alt="Оставьте заявку">
                    </div>
                    <div class="footer__bottom">
                        <div class="footer__list-wrapper">
                            @php
                                $i = 0;
                            @endphp
                            @foreach (App\Models\Service::all()->sortBy('name') as $item)
                                @php
                                    $i++;
                                @endphp
                                @if ($i == 1)
                                    <ul class="footer__list footer__list--nav">
                                @endif
                                <li><a href="{{ route('service', ['service' => $item->id]) }}">{{ $item->name }}</a>
                                </li>
                                @if ($i == 4)
                                    </ul>
                                    @php
                                        $i = 0;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                        <div class="footer__bottom-right">
                            <div class="footer__list-wrapper footer__list-wrapper--contacts">
                                <ul class="footer__list">
                                    <li><a href="tel:{{ App\Models\Setting::getByName('phone1')->value }}">{{ App\Models\Setting::getByName('phone1')->value }}
                                            <img src="/img/phone.svg" alt=""></a></li>
                                    <li><a href="tel:{{ App\Models\Setting::getByName('phone2')->value }}">{{ App\Models\Setting::getByName('phone2')->value }}
                                            <img src="/img/phone.svg" alt=""></a></li>
                                </ul>
                                <ul class="footer__list">
                                    <li><a href="mailto:{{ App\Models\Setting::getByName('email1')->value }}">{{ App\Models\Setting::getByName('email1')->value }}
                                            <img src="/img/mail.svg" alt=""></a></li>
                                    <li><a href="mailto:{{ App\Models\Setting::getByName('email2')->value }}">{{ App\Models\Setting::getByName('email2')->value }}
                                            <img src="/img/mail.svg" alt=""></a></li>
                                </ul>
                            </div>
                            <a href="{{ App\Models\Setting::getByName('telegram')->value }}">Наш телеграм <img
                                    src="/img/telegram.svg" alt="Телеграм"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/mail.js"></script>
    @yield('scripts')

</body>

</html>
