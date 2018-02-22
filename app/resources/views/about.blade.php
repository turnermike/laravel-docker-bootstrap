@extends('layouts.app', ['title' => Lang::get('about.page_title'), 'bodyclass' => 'about'])
@section('content')

        <div class="grid-container">
            <div class="grid-x">
                <div class="small-12 cell">
                    <h1>{{ Lang::get('about.title') }}</h1>
                </div>
            </div>
        </div>

@endsection