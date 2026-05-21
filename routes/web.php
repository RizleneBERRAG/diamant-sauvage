<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('pages.home'))->name('home');

Route::get('/la-chatterie', fn () => view('pages.chatterie'))->name('chatterie');

Route::prefix('le-bengal')->name('bengal.')->group(function () {
    Route::get('/origines-morphologie-robe', fn () => view('pages.bengal.origines-morphologie-robe'))->name('origines');
    Route::get('/besoins-et-alimentation', fn () => view('pages.bengal.besoins'))->name('besoins');
    Route::get('/sante', fn () => view('pages.bengal.sante'))->name('sante');
    Route::get('/reproduction', fn () => view('pages.bengal.reproduction'))->name('reproduction');
    Route::get('/preparer-son-arrivee', fn () => view('pages.bengal.arrivee'))->name('arrivee');
});

Route::prefix('nos-chats')->name('chats.')->group(function () {
    Route::get('/', fn () => view('pages.chats.index'))->name('index');
    Route::get('/nos-femelles', fn () => view('pages.chats.femelles'))->name('femelles');
    Route::get('/nos-males', fn () => view('pages.chats.males'))->name('males');
    Route::get('/chats-disponibles', fn () => view('pages.chats.disponibles'))->name('disponibles');
});

Route::get('/contact', fn () => view('pages.contact'))->name('contact');
Route::get('/mentions-legales', fn () => view('pages.mentions-legales'))->name('mentions');
