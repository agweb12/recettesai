<?php
#### Fonction pour la connexion à la Base de Données

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "recette");

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Création de la base de données
    // function createDatabase($pdo, $dbname) {
    //     $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    //     echo "✅ Base de données '$dbname' créée avec succès !<br>";
    //     $pdo->exec("USE $dbname");
    // }

    // createDatabase($pdo, $dbname);

    // Fonction pour créer une table
    function createTable($pdo, $sql, $tableName) {
        $pdo->exec($sql);
        echo "✅ Table '$tableName' créée avec succès !<br>";
    }

    // Requêtes SQL pour les tables
    $tables = [
        "administrateur" => "CREATE TABLE IF NOT EXISTS administrateur (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL,
            prenom VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            mot_de_passe VARCHAR(255) NOT NULL,
            date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
        )",

        "utilisateur" => "CREATE TABLE IF NOT EXISTS utilisateur (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_admin INT,
            nom VARCHAR(50) NOT NULL,
            prenom VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            mot_de_passe VARCHAR(255) NOT NULL,
            date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE SET NULL
        )",

        "categorie" => "CREATE TABLE IF NOT EXISTS categorie (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_admin INT NOT NULL,
            nom VARCHAR(50) NOT NULL UNIQUE,
            descriptif TEXT,
            date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE
        )",

        "recette" => "CREATE TABLE IF NOT EXISTS recette (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_admin INT NOT NULL,
            nom VARCHAR(100) NOT NULL,
            descriptif TEXT,
            temps_preparation INT NOT NULL CHECK (temps_preparation >= 0),
            temps_cuisson INT NOT NULL CHECK (temps_cuisson >= 0),
            difficulte ENUM('facile', 'moyenne', 'difficile') NOT NULL,
            id_categorie INT NOT NULL,
            date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE,
            FOREIGN KEY (id_categorie) REFERENCES categorie(id) ON DELETE CASCADE
        )",

        "ingredient" => "CREATE TABLE IF NOT EXISTS ingredient (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_admin INT NOT NULL,
            nom VARCHAR(100) NOT NULL UNIQUE,
            unite_mesure VARCHAR(20) NOT NULL,
            date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE
        )",

        "liste_personnelle" => "CREATE TABLE IF NOT EXISTS liste_personnelle (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_utilisateur INT NOT NULL,
            id_admin INT,
            date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE,
            FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE SET NULL
        )",

        "liste_personnelle_ingredients" => "CREATE TABLE IF NOT EXISTS liste_personnelle_ingredients (
            id_liste_personnelle INT NOT NULL,
            id_ingredient INT NOT NULL,
            quantite DECIMAL(10,2) NOT NULL CHECK (quantite > 0),
            PRIMARY KEY (id_liste_personnelle, id_ingredient),
            FOREIGN KEY (id_liste_personnelle) REFERENCES liste_personnelle(id) ON DELETE CASCADE,
            FOREIGN KEY (id_ingredient) REFERENCES ingredient(id) ON DELETE CASCADE
        )",

        "liste_recette_ingredients" => "CREATE TABLE IF NOT EXISTS liste_recette_ingredients (
            id_recette INT NOT NULL,
            id_ingredient INT NOT NULL,
            quantite DECIMAL(10,2) NOT NULL CHECK (quantite > 0),
            PRIMARY KEY (id_recette, id_ingredient),
            FOREIGN KEY (id_recette) REFERENCES recette(id) ON DELETE CASCADE,
            FOREIGN KEY (id_ingredient) REFERENCES ingredient(id) ON DELETE CASCADE
        )",

        "recette_favorite" => "CREATE TABLE IF NOT EXISTS recette_favorite (
            id_utilisateur INT NOT NULL,
            id_recette INT NOT NULL,
            date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id_utilisateur, id_recette),
            FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE,
            FOREIGN KEY (id_recette) REFERENCES recette(id) ON DELETE CASCADE
        )",

        "administrateur_actions" => "CREATE TABLE IF NOT EXISTS administrateur_actions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_admin INT NOT NULL,
            table_modifiee ENUM('utilisateur', 'recette', 'ingredient', 'categorie', 'liste_personnelle', 'recette_favorite') NOT NULL,
            id_element INT NOT NULL, 
            action ENUM('ajout', 'modification', 'suppression') NOT NULL,
            date_action DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE
        )"
    ];

    // Création des tables
    foreach ($tables as $tableName => $sql) {
        createTable($pdo, $sql, $tableName);
    }

    echo "<br>🎉 Installation terminée avec succès !";

} catch (PDOException $e) {
    die("❌ Erreur lors de la création : " . $e->getMessage());
}
?>
