<?php

$base = 'http://127.0.0.1:8000';
$githubBase = '/diamant-sauvage';

$pages = [
    '/' => 'docs/index.html',
    '/la-chatterie' => 'docs/la-chatterie/index.html',
    '/notre-histoire' => 'docs/notre-histoire/index.html',
    '/contact' => 'docs/contact/index.html',
    '/mentions-legales' => 'docs/mentions-legales/index.html',

    '/le-bengal/origines-morphologie-robe' => 'docs/le-bengal/origines-morphologie-robe/index.html',
    '/le-bengal/besoins-et-alimentation' => 'docs/le-bengal/besoins-et-alimentation/index.html',
    '/le-bengal/sante' => 'docs/le-bengal/sante/index.html',
    '/le-bengal/reproduction' => 'docs/le-bengal/reproduction/index.html',
    '/le-bengal/preparer-son-arrivee' => 'docs/le-bengal/preparer-son-arrivee/index.html',

    '/nos-chats' => 'docs/nos-chats/index.html',
    '/nos-chats/nos-femelles' => 'docs/nos-chats/nos-femelles/index.html',
    '/nos-chats/nos-males' => 'docs/nos-chats/nos-males/index.html',
    '/nos-chats/chats-disponibles' => 'docs/nos-chats/chats-disponibles/index.html',
    '/nos-chats/mariages-a-venir' => 'docs/nos-chats/mariages-a-venir/index.html',
];

foreach ($pages as $route => $output) {
    $html = @file_get_contents($base . $route);

    if ($html === false) {
        echo "Erreur sur : $route\n";
        continue;
    }

    $html = str_replace('http://127.0.0.1:8000', $githubBase, $html);
    $html = str_replace('http://localhost:8000', $githubBase, $html);

    // Préfixe les chemins absolus pour GitHub Pages, sans doubler /diamant-sauvage
    // Corrige notamment href="/diamant-sauvage" qui ne doit pas devenir /diamant-sauvage/diamant-sauvage.
    $html = preg_replace('#(href|src|poster|action)="/(?!diamant-sauvage(?:/|"))#', '$1="' . $githubBase . '/', $html);
    $html = preg_replace("#url\('/(?!diamant-sauvage(?:/|'))#", "url('" . $githubBase . "/", $html);
    $html = preg_replace('#url\("/(?!diamant-sauvage(?:/|"))#', 'url("' . $githubBase . '/', $html);

    $dir = dirname($output);

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    file_put_contents($output, $html);
    echo "OK : $output\n";
}

function copyDirectory($source, $destination) {
    if (!is_dir($source)) {
        return;
    }

    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    $items = scandir($source);

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $from = $source . DIRECTORY_SEPARATOR . $item;
        $to = $destination . DIRECTORY_SEPARATOR . $item;

        if (is_dir($from)) {
            copyDirectory($from, $to);
        } else {
            copy($from, $to);
        }
    }
}

copyDirectory('public/css', 'docs/css');
copyDirectory('public/js', 'docs/js');
copyDirectory('public/images', 'docs/images');

echo "Export terminé.\n";
