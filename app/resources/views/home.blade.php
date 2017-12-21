@extends('layouts.app', ['title' => Lang::get('landing-page.page_title'), 'bodyclass' => 'home'])
@section('content')


        <div class="grid-container">
            <div class="grid-x">
                <div class="small-12 cell">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>



        <!--
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
        -->


@endsection