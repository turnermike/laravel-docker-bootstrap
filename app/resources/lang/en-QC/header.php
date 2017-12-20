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

    'user_menu_item_1'          => 'Quebec &Eacute;quipe McDo<sup>MD</sup>',
    'user_menu_item_1_target'   => '/en-CA',
    'user_menu_item_2'          => 'FR',
    'user_menu_item_2_target'   => '/fr-QC',
    'user_menu_item_3'          => 'Sign In / Create Account',
    'user_menu_item_3_target'   => '/'.$locale.'/signin',
    'user_menu_item_4'          => 'Search',

    'site_menu_item_1'          => 'Home',
    'site_menu_item_1_target'   => '/',
    'site_menu_item_2'          => 'Program Overview',
    'site_menu_item_2_target'   => '/'.$locale.'/program-overview',
    'site_menu_item_3'          => 'Contact',
    'site_menu_item_3_target'   => '/'.$locale.'/contact',

];
