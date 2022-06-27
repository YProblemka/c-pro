<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8a553633d6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link id="theme-style" rel="stylesheet" href="/css/admin.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    role="img">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div>

                        {{-- search --}}
                        {{-- <div class="search-mobile-trigger d-sm-none col">
                            <i class="search-mobile-trigger-icon fas fa-search"></i>
                        </div>
                        <div class="app-search-box col">
                            <form class="app-search-form">
                                <input type="text" placeholder="Поиск..." name="search"
                                    class="form-control search-input">
                                <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                        class="fas fa-search"></i></button>
                            </form>
                        </div> --}}
                        {{-- search --}}

                        <div class="app-utilities col-auto">
                            <div class="app-utility-item">
                                <i class="admin-name">{{ auth()->user()->login }}</i>
                                <a class="btn app-btn-primary" style="margin-left: 10px;" href="{{ route("admin.logout") }}"><i class="fa fa-sign-out" style="color: white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                <div class="app-branding">
                    <a class="app-logo">
                        <span class="logo-text">Admin</span>
                    </a>
                </div>
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                    <ul class="app-menu list-unstyled">
                        <li class="nav-item">
                            <a class="{{Request::url() == route('admin.settings') ? 'active nav-link' : 'nav-link'}}" href="{{ route('admin.settings') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-address-card" aria-hidden="true" style="font-size: 18px;"></i>
                                </span>
                                <span class="nav-link-text">Контакты</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::url() == route('admin.ourWorks') ? 'active nav-link' : 'nav-link'}}" href="{{ route('admin.ourWorks') }}">
                                <span class="nav-icon">
                                    <i class="far fa-images" aria-hidden="true" style="font-size: 18px;"></i>
                                </span>
                                <span class="nav-link-text">Наши работы</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::url() == route('admin.services') ? 'active nav-link' : 'nav-link'}}" href="{{ route('admin.services') }}">
                                <span class="nav-icon">
                                    <i class="fas fa-wrench" aria-hidden="true" style="font-size: 18px;"></i>
                                </span>
                                <span class="nav-link-text">Услуги</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::url() == route('admin.blog') ? 'active nav-link' : 'nav-link'}}" href="{{ route('admin.blog') }}">
                                <span class="nav-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1007 6.81244C16.3744 6.07331 16.4534 5.3685 16.2568 4.73597C16.1663 4.74413 16.0723 4.74834 15.9761 4.74834C13.0956 4.74834 8.00438 1.12669 7.61907 0.5625C6.03142 2.87522 2.70367 4.65328 1.19954 6.64734C0.590916 7.45425 0.286603 8.05472 0.892135 8.97778L7.23404 17.1264C7.52007 17.5137 8.0806 17.5452 8.4797 17.188C8.4797 17.188 13.6806 10.5142 17.4378 8.44931C17.1554 7.89778 16.6854 7.34738 16.1007 6.81244M7.12351 15.3996L7.09707 15.4178L7.07317 15.4387C6.97623 15.5256 6.89011 15.6239 6.81667 15.7314L1.3216 8.67122C0.925885 8.05894 1.0381 7.73662 1.62057 6.96487C2.28123 6.08934 3.33704 5.23941 4.45501 4.33969C5.61713 3.40425 6.81413 2.44125 7.69332 1.3455C9.14457 2.53969 13.2039 5.17641 15.8304 5.27287C16.1454 8.36578 9.73238 13.5799 7.12351 15.3996" fill="black"/>
                                        <path d="M5.623 3.98206L12.7119 9.53675L12.9645 9.31062L5.8075 3.81668L5.623 3.98206ZM7.93319 6.93884L5.03182 4.51109C5.03182 4.51109 4.02213 5.15572 2.79925 6.56956L5.37325 9.23075L7.93319 6.93884M1.57666 7.892L7.05203 14.6029L8.06313 13.6981L2.2255 7.02378C2.2255 7.02378 1.71672 7.29912 1.57666 7.892ZM7.71185 8.27675L10.8925 11.1652L11.903 10.2604L8.59132 7.48953L7.71185 8.27675ZM6.17425 8.51356L9.09279 11.6366L10.103 10.7321L7.05372 7.72634L6.17425 8.51356ZM8.0561 1.68734L7.62719 2.89165L7.89607 3.0874L9.26154 1.86481L8.99435 1.69662L8.05357 2.53896L8.46953 1.36503L8.19053 1.18896L6.88919 2.3539L7.12235 2.5235L8.0561 1.68734ZM9.22469 4.05631L9.48513 3.82259L8.6906 3.25784L9.05088 2.93553L9.75654 3.41871L10.0071 3.194L9.2936 2.71756L9.59116 2.4515L10.3812 2.96253L10.6377 2.73331L9.54532 2.04368L8.16213 3.28203L9.22469 4.05631ZM10.071 4.67281L11.1507 4.0189L11.5042 3.79503L11.2697 4.09821L10.575 5.04068L10.9105 5.28509L12.9884 4.21662L12.5941 3.96771L11.4547 4.61965L11.1639 4.79571L11.3591 4.53893L12.0344 3.61446L11.6553 3.3754L10.602 4.02818L10.3221 4.20509L10.5148 3.96012L11.1527 3.05815L10.7972 2.83371L9.7675 4.45175L10.071 4.67281ZM13.9764 4.76675C13.7208 4.60615 13.482 4.52937 13.2587 4.53387C13.037 4.53865 12.8553 4.60531 12.7122 4.73356C12.555 4.87418 12.5021 5.02015 12.5538 5.17146C12.5842 5.26231 12.681 5.39365 12.8461 5.56746L13.0168 5.7469C13.1186 5.85265 13.1841 5.93928 13.2128 6.00565C13.2409 6.07287 13.2272 6.13165 13.1718 6.18115C13.077 6.26581 12.9535 6.28184 12.8019 6.23009C12.7077 6.19434 12.6189 6.14559 12.5381 6.08525C12.3778 5.97106 12.2999 5.86109 12.3018 5.75506C12.303 5.69712 12.3348 5.63075 12.3969 5.55593L12.0282 5.29887C11.862 5.44765 11.799 5.61359 11.8406 5.79781C11.8825 5.98372 12.0251 6.16709 12.2726 6.34765C12.5193 6.5285 12.7648 6.62525 13.0061 6.63593C13.2499 6.64634 13.4508 6.58221 13.6054 6.443C13.7573 6.30743 13.8113 6.16175 13.768 6.00678C13.7404 5.9075 13.6631 5.7919 13.5382 5.66028L13.2584 5.36496C13.1518 5.25359 13.0882 5.17625 13.0666 5.13209C13.0328 5.06487 13.0449 5.00553 13.1031 4.95378C13.1664 4.89697 13.2474 4.8739 13.3464 4.88375C13.4468 4.89359 13.5514 4.93381 13.6608 5.00412C13.7601 5.06825 13.8302 5.13462 13.8693 5.20325C13.9297 5.30675 13.9128 5.40659 13.82 5.50137L14.2354 5.77503C14.4081 5.60853 14.4621 5.43218 14.3977 5.24684C14.3347 5.06318 14.1938 4.90287 13.9764 4.76675" fill="black"/>
                                        </svg>
                                        
                                </span>
                                <span class="nav-link-text">Блог</span>
                            </a>
                        </li>
                       
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="/js/admin/change-info.js"></script>

</body>

</html>
