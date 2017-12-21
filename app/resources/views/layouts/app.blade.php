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

    <div class="off-canvas in-canvas-for-medium position-right" id="offCanvas" data-off-canvas>

        <div class="grid-container">

            <header class="grid-x grid-margin-x">

                <div class="small-12 medium-6 cell hide-for-small-only">
                    <a href="/{{$locale}}/" class="logo">{{ Lang::get('header.logo_text' )}}</a>
                </div>

                <div class="small-12 medium-6 cell relative">
                    <ul class="site-menu vertical medium-horizontal menu">
                        <li><a href="{{ Lang::get('header.site_menu_item_1_target') }}">{{ Lang::get('header.site_menu_item_1') }}</a></li>
                        <li><a href="{{ Lang::get('header.site_menu_item_2_target') }}">{{ Lang::get('header.site_menu_item_2') }}</a></li>
                        <li><a href="{{ Lang::get('header.site_menu_item_3_target') }}">{{ Lang::get('header.site_menu_item_3') }}</a></li>
                    </ul>
                    <ul class="user-menu vertical medium-horizontal menu">
                        <li><a href="{{ Lang::get('header.user_menu_item_1_target') }}">{!! Lang::get('header.user_menu_item_1') !!}</a></li>
                        <li><a href="{{ Lang::get('header.user_menu_item_2_target') }}">{{ Lang::get('header.user_menu_item_2') }}</a></li>
                        <li><a href="{{ Lang::get('header.user_menu_item_3_target') }}">{{ Lang::get('header.user_menu_item_3') }}</a></li>
                        {{-- <li><a href="#" class="fi-magnifying-glass"></a></li> --}}
                    </ul>
                </div>

            </header>

        </div>

    </div>

  <div class="off-canvas-content" data-off-canvas-content>

    <header class="title-bar hide-for-medium">
        <div class="title-bar-left">
            <a href="/{{$locale}}/" class="logo">{{ Lang::get('header.logo_text' )}}</a>
            {{-- <span class="title-bar-title"></span> --}}
        </div>
        <div class="title-bar-right">
            <button class="menu-icon" type="button" data-open="offCanvas"></button>
        </div>
    </header>

    @yield('content')

  </div>


    <!-- .grid-container -->



    {{-- <input type="hidden" id="txtDebug" value="true" /> --}}

    <!-- Scripts -->
    <script src="/output/vendor.js"></script>
    <script src="/output/app.js"></script>

</body>
</html>
