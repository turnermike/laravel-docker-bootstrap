<?php

$locale = Lang::locale();

return [

    /*
    |--------------------------------------------------------------------------
    | Header Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'logo_text'                 => 'McDonald\'s AtoMc Hockey',

    'user_menu_item_1'          => 'McDonald\'s AtoMc Hockey',
    'user_menu_item_1_target'   => '/fr-QC',
    'user_menu_item_2'          => 'EN',
    'user_menu_item_2_target'   => '/en-CA',
    'user_menu_item_3'          => 'FR - Sign In / Create Account',
    'user_menu_item_3_target'   => '/'.$locale.'/signin',

    'site_menu_item_1'          => 'FR - Home',
    'site_menu_item_1_target'   => '/',
    'site_menu_item_2'          => 'FR - Program Overview',
    'site_menu_item_2_target'   => '/'.$locale.'/program-overview',
    'site_menu_item_3'          => 'FR - Contact',
    'site_menu_item_3_target'   => '/'.$locale.'/contact',

];