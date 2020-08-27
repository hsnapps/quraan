<?php

use App\Sura;
use Illuminate\Http\Request;

Route::get('suras', 'SuraController@listSuras');
Route::get('verses', 'SuraController@getVerses');
Route::get('langs', 'SuraController@getAvailableLnaguages');
Route::get('find', 'SuraController@find');