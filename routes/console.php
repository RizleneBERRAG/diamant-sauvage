<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('admin:create {email?} {--name=Administrateur}', function (?string $email = null) {
    $email = $email ?: $this->ask('Email admin');
    $name = (string) ($this->option('name') ?: 'Administrateur');

    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->error('Adresse email invalide.');
        return 1;
    }

    $password = (string) $this->secret('Mot de passe admin');

    if (strlen($password) < 8) {
        $this->error('Le mot de passe doit contenir au moins 8 caractères.');
        return 1;
    }

    $confirmation = (string) $this->secret('Confirme le mot de passe admin');

    if ($password !== $confirmation) {
        $this->error('Les deux mots de passe ne correspondent pas.');
        return 1;
    }

    $user = User::updateOrCreate(
        ['email' => $email],
        [
            'name' => $name,
            'password' => Hash::make($password),
        ]
    );

    $this->info($user->wasRecentlyCreated
        ? 'Compte administrateur créé.'
        : 'Compte administrateur mis à jour.'
    );

    return 0;
})->purpose('Create or update an administrator account');
