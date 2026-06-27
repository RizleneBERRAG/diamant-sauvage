# Déploiement officiel — Chatterie du Diamant Sauvage

Ce fichier sert de checklist pour remplacer l'ancien site par le nouveau site Laravel.

## 1. Préparer l'hébergement

Le site doit être déployé sur un hébergement compatible :

- PHP 8.2 minimum ;
- MySQL ou MariaDB ;
- Composer disponible, ou possibilité d'envoyer le dossier `vendor/` déjà installé ;
- domaine pointant vers le dossier `public/` du projet Laravel ;
- extension PHP courantes activées : `mbstring`, `openssl`, `pdo_mysql`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`.

## 2. Préparer la base de données

Créer une base MySQL de production avec :

- nom de base ;
- utilisateur ;
- mot de passe ;
- hôte ;
- port, généralement `3306`.

Ces informations devront être placées dans le fichier `.env` du serveur.

## 3. Préparer le fichier `.env` de production

Copier `.env.example` en `.env`, puis remplir :

```env
APP_NAME="Chatterie du Diamant Sauvage"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://votre-domaine.fr

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_la_base
DB_USERNAME=utilisateur_mysql
DB_PASSWORD=mot_de_passe_mysql

FILESYSTEM_DISK=public

MAIL_MAILER=smtp
MAIL_HOST=smtp.exemple.fr
MAIL_PORT=587
MAIL_USERNAME=adresse@votre-domaine.fr
MAIL_PASSWORD=mot_de_passe_mail
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="adresse@votre-domaine.fr"
MAIL_FROM_NAME="${APP_NAME}"
MAIL_CONTACT_TO="adresse-reception@example.com"
```

Puis générer la clé si elle n'existe pas :

```bash
php artisan key:generate
```

## 4. Installer le projet sur le serveur

Depuis le serveur :

```bash
git clone <url-du-repo> diamant-sauvage
cd diamant-sauvage
composer install --no-dev --optimize-autoloader
npm install
npm run build
```

Si `npm` n'est pas disponible sur le serveur, lancer `npm run build` en local puis envoyer le dossier `public/build` généré.

## 5. Lancer Laravel en production

```bash
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Créer le compte admin :

```bash
php artisan admin:create email@example.com --name="Administrateur"
```

## 6. Configurer le domaine

Le domaine officiel doit pointer vers :

```text
/chemin/vers/diamant-sauvage/public
```

Le fichier important est :

```text
public/index.php
```

Le dossier racine complet du projet ne doit pas être directement exposé publiquement.

## 7. Vérifications avant bascule officielle

Vérifier ces pages :

```text
/
/la-chatterie
/notre-histoire
/le-bengal/origines-morphologie-robe
/le-bengal/besoins-et-alimentation
/le-bengal/sante
/le-bengal/reproduction
/le-bengal/preparer-son-arrivee
/nos-chats
/nos-chats/nos-femelles
/nos-chats/nos-males
/nos-chats/chats-disponibles
/nos-chats/mariages-a-venir
/contact
/mentions-legales
/admin
```

Vérifier aussi :

- connexion admin ;
- création/modification d'un chat ;
- upload photo ;
- lien symbolique `storage` ;
- affichage des images uploadées ;
- formulaire de contact ;
- réception de l'email de contact ;
- responsive mobile ;
- certificat SSL actif ;
- `APP_DEBUG=false`.

## 8. Après la mise en ligne

Sur le serveur, si une modification est envoyée sur GitHub :

```bash
git pull
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Si seules des vues ou du CSS public changent, il suffit souvent de faire :

```bash
git pull
php artisan optimize:clear
```

## 9. Ancien dossier `docs/`

Le dossier `docs/` correspond à l'ancienne prévisualisation temporaire GitHub Pages.

Il ne doit pas servir au déploiement officiel.

Le déploiement officiel doit utiliser Laravel et le dossier `public/`.
