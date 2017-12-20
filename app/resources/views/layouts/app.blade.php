<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ (!empty($title) ? $title : 'Fallback Page Title Here') }}</title>

    <!-- Styles -->
    <link href="/output/app.css" rel="stylesheet">

</head>
<body class="{{ (!empty($bodyclass) ? $bodyclass : 'page') }}">

    <div class="grid-container">

        <header class="grid-x">
            <div class="small-12 medium-6 cell">
                <a href="/{{$locale}}/" class="logo">{{ Lang::get('header.logo_text' )}}</a>
            </div>
            <div class="small-12 medium-6 cell">
                <ul class="user-menu menu">
                    <li><a href="{{ Lang::get('header.user_menu_item_1_target') }}">{!! Lang::get('header.user_menu_item_1') !!}</a></li>
                    <li><a href="{{ Lang::get('header.user_menu_item_2_target') }}">{{ Lang::get('header.user_menu_item_2') }}</a></li>
                    <li><a href="{{ Lang::get('header.user_menu_item_3_target') }}">{{ Lang::get('header.user_menu_item_3') }}</a></li>
                    <li><a href="#" class="fi-magnifying-glass">{{ Lang::get('header.user_menu_item_4') }}</a></li>
                </ul>
                <ul class="site-menu menu">
                    <li><a href="{{ Lang::get('header.site_menu_item_1_target') }}">{{ Lang::get('header.site_menu_item_1') }}</a></li>
                    <li><a href="{{ Lang::get('header.site_menu_item_2_target') }}">{{ Lang::get('header.site_menu_item_2') }}</a></li>
                    <li><a href="{{ Lang::get('header.site_menu_item_3_target') }}">{{ Lang::get('header.site_menu_item_3') }}</a></li>
                </ul>
            </div>
        </header>

    </div>
    <!-- .grid-container -->

    {{-- @yield('content') --}}

    {{-- <input type="hidden" id="txtDebug" value="true" /> --}}

    <!-- Scripts -->
    <script src="/output/vendor.js"></script>
    <script src="/output/app.js"></script>

</body>
</html>
