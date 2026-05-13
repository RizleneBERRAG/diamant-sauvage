@extends('layouts.site')

@section('title', 'La chatterie | Diamant Sauvage')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chatterie.css') }}">
@endpush

@section('content')
    <section class="page-hero">
        <div class="container">
            <span class="kicker">La chatterie</span>
            <h1>Un élevage familial dédié au Bengal.</h1>
            <p>Découvrez l’histoire, les valeurs, l’environnement et le quotidien de la Chatterie du Diamant Sauvage.</p>
        </div>
    </section>

    <section class="chatterie-content">
        <div class="container">
            <h2>Une page complète arrive ici.</h2>
            <p>Nous construirons cette page avec son histoire, ses photos, ses valeurs, ses engagements et son environnement.</p>
        </div>
    </section>
@endsection
