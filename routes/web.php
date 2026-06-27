<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ChatPageController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\CroquetteController;
use App\Models\Mating;
use App\Http\Controllers\Admin\MatingController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| ANCIENNES URLS WORDPRESS
|--------------------------------------------------------------------------
| Ces redirections gardent le référencement et évitent les erreurs lorsque
| Google affiche encore les anciennes pages de l'ancien site.
*/

Route::redirect('/nos-chats-disponible', '/nos-chats/chats-disponibles', 301);
Route::redirect('/nos-chats-disponibles', '/nos-chats/chats-disponibles', 301);
Route::redirect('/nos-chats/nos-chats-disponibles', '/nos-chats/chats-disponibles', 301);
Route::redirect('/nos-chats/nos-chats-disponible', '/nos-chats/chats-disponibles', 301);
Route::redirect('/chats-disponibles', '/nos-chats/chats-disponibles', 301);
Route::redirect('/elevage-chat-bengal', '/le-bengal/origines-morphologie-robe', 301);
Route::redirect('/nos-femelles', '/nos-chats/nos-femelles', 301);
Route::redirect('/nos-males', '/nos-chats/nos-males', 301);
Route::redirect('/nos-mâles', '/nos-chats/nos-males', 301);
Route::redirect('/reproduction', '/le-bengal/reproduction', 301);
Route::redirect('/nous-contactez', '/contact', 301);
Route::redirect('/la-chatterie-du-diamant-sauvage', '/la-chatterie', 301);
Route::redirect('/chat-bengal', '/le-bengal/origines-morphologie-robe', 301);
Route::redirect('/le-bengal', '/le-bengal/origines-morphologie-robe', 301);

Route::get('/', fn () => view('pages.home'))->name('home');

Route::get('/la-chatterie', fn () => view('pages.chatterie'))->name('chatterie');

Route::get('/notre-histoire', fn () => view('pages.story'))->name('histoire');

Route::prefix('le-bengal')->name('bengal.')->group(function () {
    Route::get('/origines-morphologie-robe', fn () => view('pages.bengal.origines-morphologie-robe'))->name('origines');
    Route::get('/besoins-et-alimentation', fn () => view('pages.bengal.besoins'))->name('besoins');
    Route::get('/sante', fn () => view('pages.bengal.sante'))->name('sante');
    Route::get('/reproduction', fn () => view('pages.bengal.reproduction'))->name('reproduction');
    Route::get('/preparer-son-arrivee', fn () => view('pages.bengal.arrivee'))->name('arrivee');
});

Route::prefix('nos-chats')->name('chats.')->group(function () {
    Route::get('/', [ChatPageController::class, 'index'])->name('index');
    Route::get('/nos-femelles', [ChatPageController::class, 'femelles'])->name('femelles');
    Route::get('/nos-males', [ChatPageController::class, 'males'])->name('males');
    Route::get('/chats-disponibles', [ChatPageController::class, 'disponibles'])->name('disponibles');
    Route::get('/mariages-a-venir', function () {
        $matings = Mating::where('is_visible', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('pages.chats.mariages', compact('matings'));
    })->name('mariages');
});

Route::get('/contact', fn () => view('pages.contact'))->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/mentions-legales', fn () => view('pages.mentions-legales'))->name('mentions');

/*
|--------------------------------------------------------------------------
| AUTH ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminLoginController::class, 'show'])
    ->middleware('guest')
    ->name('login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->middleware('guest')
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.chats.index'))->name('index');

    Route::get('/chats', [CatController::class, 'index'])->name('chats.index');
    Route::get('/chats/create', [CatController::class, 'create'])->name('chats.create');
    Route::post('/chats', [CatController::class, 'store'])->name('chats.store');

    Route::get('/chats/{cat}/edit', [CatController::class, 'edit'])->name('chats.edit');
    Route::put('/chats/{cat}', [CatController::class, 'update'])->name('chats.update');
    Route::delete('/chats/{cat}', [CatController::class, 'destroy'])->name('chats.destroy');

    Route::patch('/chats/{cat}/images/reorder', [CatController::class, 'reorderImages'])->name('chats.images.reorder');
    Route::delete('/cat-images/{image}', [CatController::class, 'destroyImage'])->name('cat-images.destroy');
    Route::patch('/cat-images/{image}/main', [CatController::class, 'setMainImage'])->name('cat-images.main');
    Route::patch('/cat-images/{image}/crop', [CatController::class, 'updateImageCrop'])->name('cat-images.crop');

    Route::get('/croquettes', [CroquetteController::class, 'index'])->name('croquettes.index');
    Route::put('/croquettes/section', [CroquetteController::class, 'updateSection'])->name('croquettes.section.update');
    Route::post('/croquettes', [CroquetteController::class, 'store'])->name('croquettes.store');
    Route::put('/croquettes/{croquette}', [CroquetteController::class, 'update'])->name('croquettes.update');
    Route::delete('/croquettes/{croquette}', [CroquetteController::class, 'destroy'])->name('croquettes.destroy');

    Route::get('/mariages', [MatingController::class, 'index'])->name('mariages.index');
    Route::post('/mariages', [MatingController::class, 'store'])->name('mariages.store');
    Route::put('/mariages/{mating}', [MatingController::class, 'update'])->name('mariages.update');
    Route::delete('/mariages/{mating}', [MatingController::class, 'destroy'])->name('mariages.destroy');
});
