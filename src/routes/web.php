<?php

use Illuminate\Support\Facades\Route;

Route::resource('guides', 'GuideController');
Route::get('guides/get-config-guide-fields/{index}', 'GuideController@getGuideConfigFields');
