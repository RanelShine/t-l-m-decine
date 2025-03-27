📖 Description

Cette application Laravel de télémédecine permet aux patients de consulter des médecins à distance, de prendre des rendez-vous en ligne et de gérer leurs dossiers médicaux. L'objectif est de faciliter l'accès aux soins de santé en proposant une plateforme intuitive et sécurisée.

🛠 Technologies Utilisées

Backend : Laravel (PHP)

Frontend : Vue.js / Bootstrap

Base de données : MySQL



🎯 Fonctionnalités

✅ Inscription et connexion des patients et médecins
✅ Prise de rendez-vous en ligne
✅ Consultation vidéo intégrée
✅ Gestion des dossiers médicaux
✅ Notifications par email ou SMS
✅ Tableau de bord administrateur

📌 Installation

Cloner le dépôt :

git clone https://github.com/RanelShine/t-l-m-decine.git
cd votre-repo

Installer les dépendances :

composer install
npm install && npm run dev

Configurer l'environnement :

cp .env.example .env
php artisan key:generate

Modifier le fichier .env avec vos informations de base de données.

Exécuter les migrations :

php artisan migrate --seed

Démarrer le serveur :

php artisan serve

📜 Licence

Ce projet est sous licence MIT.

Dépôt GitHub :(https://github.com/RanelShine/t-l-m-decine.git)

