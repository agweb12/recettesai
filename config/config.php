<?php
header("Access-Control-Allow-Origin: *"); // Autoriser toutes les origines pour les requêtes CORS
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Autoriser les méthodes GET, POST et OPTIONS pour les requêtes CORS
header("Access-Control-Allow-Headers: Content-Type"); // Autoriser l'en-tête Content-Type pour les requêtes CORS
// header("Access-Control-Allow-Credentials: true"); // Autoriser les cookies pour les requêtes CORS
// header("Access-Control-Allow-Origin: http://localhost:3000"); // Autoriser l'origine spécifique pour les requêtes CORS

// À Quoi ça sert CORS et pourquoi faire ces header() ?
// CORS (Cross-Origin Resource Sharing) est un mécanisme de sécurité qui permet aux ressources d'une page web d'être partagées entre différentes origines (domaines, protocoles ou ports). Par défaut, les navigateurs bloquent les requêtes cross-origin pour des raisons de sécurité. En ajoutant ces en-têtes (headers), vous permettez à votre serveur de répondre aux requêtes provenant d'autres origines, ce qui est essentiel pour les applications web modernes qui interagissent avec des API externes ou des ressources hébergées sur d'autres domaines.



// Ce fichier de configuration est utilisé pour initialiser les paramètres de l'application, y compris la connexion à la base de données, la gestion des sessions et d'autres configurations essentielles.
// Il est inclus dans chaque page de l'application pour garantir que toutes les pages partagent les mêmes paramètres de configuration.
// Ce fichier doit être inclus au début de chaque page PHP pour s'assurer que la configuration est chargée avant tout autre code.
// Il est important de garder ce fichier sécurisé et de ne pas l'exposer publiquement, car il contient des informations sensibles telles que les détails de connexion à la base de données.

// Démarrage des sessions
session_start();
// Vérification de l'environnement
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// Vérification de la version de PHP
if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    die("La version de PHP doit être supérieure ou égale à 8.0.0");
}
// Vérification de l'extension PDO
if (!extension_loaded('pdo')) {
    die("L'extension PDO doit être activée");
}
// Vérification de l'extension PDO MySQL
if (!extension_loaded('pdo_mysql')) {
    die("L'extension PDO MySQL doit être activée");
}
// Activation des erreurs en mode développement
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Définition du fuseau horaire
date_default_timezone_set("Europe/Paris");

#### Constante pour définir le chemin du site
define("RACINE_SITE", "http://localhost/recettesai/");
// Connexion à la base de données (inclus `database_recettesai.php`)
// require_once __DIR__ . "/database_recettesai.php";
require_once __DIR__ . "/databaseRecettesai.php";