# Gestion des Inscriptions d'Entraînement de Moto-Cross - Cahier des charges

## Présentation

Le club de moto-cross d'Aubirail souhaite mettre en place une plateforme pour simplifier l'inscription de ses pilotes aux entraînements mensuels. L'application vise à faciliter les inscriptions, informer les membres des prochains entraînements, et fournir une interface d'administration pour gérer les sessions et communiquer d'éventuelles annulations.

## User Stories

### Visiteur
- Créer un compte.
- Se connecter.
- Accéder à la liste des entraînements.

### Utilisateur
- Se déconnecter.
- Accéder aux détails d'un entraînement.
- Réserver ou annuler sa participation.
- Accéder à son profil.
- Consulter l'historique de ses participations.
- Modifier ses informations profil.
- Inscrire/désinscrire ses enfants.
- Réserver/annuler un entraînement pour ses enfants.
- Partager une séance d'entraînement sur les réseaux sociaux.

### Administrateur
- Prévenir une annulation.
- Ajouter d'autres administrateurs.
- Accéder à une liste PDF des inscrits à un entraînement.
- Créer/Modifier des séances d'entraînement.
- Ajouter/Supprimer des numéros de licence.

## Spécifications Techniques

- Framework : Laravel
- Base de données : MySQL
- Moteur de template : Blade
- Authentification : Laravel Fortify
- Librairie de style : TailwindCSS

## Dictionnaire de Données

![Motocros-UML](https://github.com/doublet-kevin/motocross-laravel/assets/91097262/068c4229-1ed2-4637-b880-d4fce965d73c)
