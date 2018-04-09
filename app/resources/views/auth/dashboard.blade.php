@extends('layouts.app', ['title' => Lang::get('dashboard.page_title'), 'bodyclass' => 'dashboard'])
@section('content')


<h1>{{ Lang::get('dashboard.title') }}</h1>

<?php

    // echo '<pre>';
    // var_dump(session()->all());
    // echo '</pre>';

    echo '<pre>';
    echo 'auth_passed: <br>';
    var_dump(session()->get('google2fa.auth_passed'));
    echo '</pre>';
?>

@endsection