<?php

use Lib\Router\Route;

Route::controller('ShortController')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/:short', 'redirect')->name('redirect');
    Route::post('/generate', 'generate')->name('generate');
});
