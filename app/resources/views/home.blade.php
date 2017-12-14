@extends('layouts.app', ['title' => 'Foundation Test - ' . Lang::get('landing-page.page_title'), 'bodyclass' => 'home'])
@section('content')


        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/laravel-files/css/laravel-supplied.css" rel="stylesheet">

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <h1>{{ Lang::get('landing-page.title') }}</h1>
                </div>

                <div><p>{{ Lang::get('landing-page.para') }}</p></div>

                <div class="links"><a href="/{{ $locale }}/submit">Submit a Link</a><br /><br /></div>

                <div class="links">
                    @foreach ($links as $link)
                        <a href="{{ $link->url }}">{{ $link->title }}</a>
                    @endforeach
                </div>

            </div>
        </div>

        <script src="/laravel-files/js/laravel-supplied.js"></script>

@endsection