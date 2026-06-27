# Chatterie du Diamant Sauvage

Site officiel Laravel de la Chatterie du Diamant Sauvage.

Le projet remplace l'ancien site vitrine et inclut un espace administrateur permettant de gérer les chats, les photos, les mariages à venir et la section croquettes.

## Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Blade
- CSS et JavaScript organisés dans `public/`
- Vite disponible pour les assets Laravel si besoin

## Fonctionnalités principales

- Pages publiques : accueil, histoire, chatterie, Bengal, besoins, santé, reproduction, arrivée, contact, mentions légales.
- Pages chats : tous les chats, mâles, femelles, chats disponibles, mariages à venir.
- Administration protégée par connexion.
- Gestion des chats : statut, visibilité, photos, photo principale, recadrage, ordre d'affichage.
- Gestion des mariages à venir.
- Gestion de la section croquettes.
- Formulaire de contact avec envoi email.

## Installation locale

```bash
git clone <url-du-repo>
cd diamant-sauvage
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configurer ensuite le fichier `.env` avec la base MySQL locale.

Puis lancer :

```bash
php artisan migrate
php artisan storage:link
npm run build
php artisan optimize:clear
php artisan serve
```

Créer le compte administrateur :

```bash
php artisan admin:create email@example.com --name="Administrateur"
```

Le terminal demandera le mot de passe admin de façon masquée.

## Accès admin

```text
/admin
```

L'administration est protégée par authentification.

## Préparation production

Avant la mise en ligne officielle :

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Le fichier `.env` de production doit impérativement contenir :

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.fr
DB_CONNECTION=mysql
FILESYSTEM_DISK=public
MAIL_MAILER=smtp
MAIL_CONTACT_TO=adresse-de-reception@example.com
```

## Dossier `docs/`

Le dossier `docs/` a servi uniquement pour une prévisualisation temporaire via GitHub Pages.

Pour le site officiel, il ne doit pas être utilisé comme source de vérité. Le vrai site est l'application Laravel servie depuis le dossier `public/`.

## Commandes utiles

Vider les caches Laravel :

```bash
php artisan optimize:clear
```

Recréer les caches de production :

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Relancer les migrations :

```bash
php artisan migrate --force
```

Créer ou mettre à jour un admin :

```bash
php artisan admin:create email@example.com --name="Administrateur"
```

## Notes de déploiement

Le domaine doit pointer vers le dossier `public/` du projet Laravel.

Si l'hébergement ne permet pas de choisir `public/` comme racine web, il faut placer les fichiers Laravel hors du dossier public accessible et rediriger le domaine vers le bon point d'entrée `public/index.php`.

Ne jamais envoyer en ligne :

- le fichier `.env` local ;
- le dossier `node_modules/` ;
- le dossier `vendor/` si Composer peut être lancé sur le serveur ;
- les caches locaux ;
- les fichiers temporaires.
