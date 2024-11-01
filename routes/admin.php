<?php

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('debug', function () {
        return view('admin.debug.index');
    });
});
