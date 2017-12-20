@extends('layouts.app', ['title' => Lang::get('landing-page.page_title'), 'bodyclass' => 'home'])
@section('content')

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

@endsection