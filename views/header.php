<!DOCTYPE html>
<html lang="fr">
<!-- Head -->

<head>
    <!-- Encodage -->
    <meta charset="UTF-8" />
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $titlePage ?></title>
    <meta name="description" content="<?= $descriptionPage ?>" />
    <!-- Meta Tags -->
    <meta name="robots" content="<?= $indexPage ?>, <?= $followPage ?>">
    <meta name="keywords" content="<?= $keywordsPage ?>" />
    <meta name="author" content="Recette AI">
    <meta name="application-name" content="Recette AI">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Recette AI" />
    <meta property="og:description" content="<?= $descriptionPage ?>" />
    <meta property="og:image" content="<?= RACINE_SITE ?>public/assets/img/logo.svg" />
    <meta property="og:site_name" content="Recette AI" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= RACINE_SITE ?>" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@webappstore">
    <meta name="twitter:creator" content="@webappstore">
    <meta name="twitter:title" content="Recette AI">
    <meta name="twitter:description" content="<?= $descriptionPage ?>">
    <meta name="twitter:image" content="<?= RACINE_SITE ?>public/assets/img/logo.svg">

    <!-- Styles -->
    <link rel="stylesheet" href="<?= RACINE_SITE ?>public/assets/css/root.css" />
    <link rel="stylesheet" href="<?= RACINE_SITE ?>public/assets/css/style.css" />

    <link rel="image_src" href="<?= RACINE_SITE ?>public/assets/img/logo.svg">
    <link rel="canonical" href="<?= RACINE_SITE ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= RACINE_SITE ?>favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= RACINE_SITE ?>apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= RACINE_SITE ?>apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= RACINE_SITE ?>apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= RACINE_SITE ?>apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= RACINE_SITE ?>apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= RACINE_SITE ?>apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= RACINE_SITE ?>apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= RACINE_SITE ?>apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= RACINE_SITE ?>apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="36x36" href="<?= RACINE_SITE ?>android-icon-36x36.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= RACINE_SITE ?>android-icon-48x48.png">
    <link rel="icon" type="image/png" sizes="72x72" href="<?= RACINE_SITE ?>android-icon-72x72.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= RACINE_SITE ?>android-icon-96x96.png">
    <link rel="icon" type="image/png" sizes="144x144" href="<?= RACINE_SITE ?>android-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= RACINE_SITE ?>android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= RACINE_SITE ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= RACINE_SITE ?>favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= RACINE_SITE ?>favicon-16x16.png">
    <link rel="manifest" href="<?= RACINE_SITE ?>manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= RACINE_SITE ?>ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
<!-- <script src="https://kit.fontawesome.com/d35f779ce5.js" crossorigin="anonymous"></script> -->
<link href="<?= RACINE_SITE ?>public/assets/icons/webfonts/uicons-solid-rounded.css" rel="stylesheet">
</head>
<body>
<header>
    <!-- Menu Application Recettes AI -->
    <nav class="menu">
        <a href="<?= RACINE_SITE ?>index.php" class="imgMenu"><img src="<?= RACINE_SITE ?>/public/assets/img/logo-white.webp" alt=""></a>
        <form action="recettes.php" method="POST">
            <div class="form-input">
                <i class="fi fi-sr-search-heart" id="searchIngredient"></i>
                <input type="text" name="ingredients" placeholder="Entrez vos ingrédients" required>
            </div>
            <button type="submit">Trouver une recette</button>
        </form>
        <div class="linkNav">
            <a href="<?= RACINE_SITE ?>recettes.php"><i class="fi fi-sr-utensils"></i> Recettes</a>
            <a href="<?= RACINE_SITE ?>contact.php"><i class="fi fi-sr-headset"></i> Contact</a>
        </div>
        <div class="ctaButtons">
            <a href="<?= RACINE_SITE ?>inscription.php" class="cta"><i class="fi fi-sr-sign-up"></i> S'inscrire</a>
            <a href="<?= RACINE_SITE ?>connexion.php" class="cta"><i class="fi fi-sr-enter"></i> Se Connecter</a>
            <a href="<?= RACINE_SITE ?>deconnexion.php" class="cta"><i class="fi fi-sr-sign-out-alt"></i> Déconnexion</a>
            <a href="<?= RACINE_SITE ?>profil/monCompte.php" class="cta"><i class="fi fi-sr-user-trust"></i> Mon Compte</a>
        </div>
    </nav>
</header>
<main>