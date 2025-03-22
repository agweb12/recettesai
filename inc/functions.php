<?php
require_once('../config/config.php');
#### Condition pour se déconnecter
if (isset($_GET['action']) && $_GET['action'] === "deconnexion") {

    unset($_SESSION['user']);
    header("location:" . RACINE_SITE . "index.php");
}

#### Création d'une fonction alerte
function alert(string $message, string $type = "danger"): string
{
    return "<div class='alert alert-$type alert-dismissible fade show text-center w-50 m-auto mb-5' role='alert'>
    $message
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}

#### Fonction pour debuger
function debug($var): void
{
    echo "<pre class='border border-dark bg-light text-danger fw-bold w-50 p-5 mt-5'>";
    var_dump($var);
    echo "</pre>";
}

// Vérifier si un utilisateur est connecté
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Rediriger un utilisateur non connecté vers la page de connexion
function redirectIfNotLoggedIn()
{
    if (!isLoggedIn()) {
        header("Location: " . RACINE_SITE . "public/connexion.php");
        exit();
    }
}

// Échapper les caractères dangereux pour éviter les attaques XSS
function sanitize($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Générer une URL complète à partir d’un chemin
function url($path)
{
    return RACINE_SITE . $path;
}
