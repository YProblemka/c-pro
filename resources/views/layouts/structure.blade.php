<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.svg" sizes="48x48" type="image/x-icon">

    <link rel="stylesheet" href="css/main.css">

    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__wrapper">
                    
                </div>
            </div>
        </header>
        <main class="main">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="container">
                <div class="footer__wrapper">

                </div>
            </div>
        </footer>
    </div>
    @yield('scripts')

</body>

</html>
