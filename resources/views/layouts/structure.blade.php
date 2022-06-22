<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.svg" sizes="48x48" type="image/x-icon">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">

    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__wrapper">
                    <a href=""><img src="img/logo.svg" alt="Сервис C PRO"></a>
                    <div class="header__links">
                        <a href="tel:+79467384837">+7 946 738 48 37</a>
                        <a href="">Наш телеграм <img src="img/telegram.svg" alt="Телеграм"></a>
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
                        <form action="" class="footer__form form">
                            <h4 class="form__title">Закажите консультацию, оставив нам свою почту. Мы вам всё расскажем
                            </h4>
                            <input type="email" placeholder="E-mail*" required>
                            <input type="text" placeholder="Напишите, что вас интересует">
                            <button type="submit" class="btn btn-hover">Отправить</button>
                        </form>
                        <img src="img/footer.png" alt="Оставьте заявку">
                    </div>
                    <div class="footer__bottom">
                        <div class="footer__list-wrapper">
                            <ul class="footer__list">
                                <li><a href="">Отопление</a></li>
                                <li><a href="">Водоснабжение</a></li>
                                <li><a href="">Автономные канализации</a></li>
                                <li><a href="">Теплые полы</a></li>
                            </ul>
                            <ul class="footer__list">
                                <li><a href="">Сборка Котельной</a></li>
                                <li><a href="">Электричесвто</a></li>
                                <li><a href="">Дизайн проект</a></li>
                            </ul>
                        </div>
                        <div class="footer__bottom-right">
                            <div class="footer__list-wrapper">
                                <ul class="footer__list">
                                    <li><a href="tel:+79467384837">+7 946 738 48 37 <img src="img/phone.svg"
                                                alt=""></a></li>
                                    <li><a href="tel:+79467384837">+7 946 738 48 37 <img src="img/phone.svg"
                                                alt=""></a></li>
                                </ul>
                                <ul class="footer__list">
                                    <li><a href="mailto:mail@mail.com">mail@mail.com <img src="img/mail.svg"
                                                alt=""></a></li>
                                    <li><a href="mailto:mail@mail.com">mail@mail.com <img src="img/mail.svg"
                                                alt=""></a></li>
                                </ul>
                            </div>
                            <a href="">Наш телеграм <img src="img/telegram.svg" alt="Телеграм"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @yield('scripts')

</body>

</html>
