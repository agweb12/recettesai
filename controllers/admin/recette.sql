CREATE DATABASE IF NOT EXISTS recette;
USE recette;

-- Table Administrateur (Super Admin)
CREATE TABLE IF NOT EXISTS administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table Utilisateur
CREATE TABLE IF NOT EXISTS utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT,  -- Ajout pour suivi par admin
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE SET NULL
);

-- Table Catégorie (Ajoutée par l’Admin)
CREATE TABLE IF NOT EXISTS categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    nom VARCHAR(50) NOT NULL UNIQUE,
    descriptif TEXT,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    couleur VARCHAR(7) NOT NULL, -- Couleur en hexadécimal (ex: #FF5733)
    image_url VARCHAR(255),
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE
);

-- Table Étiquette (Sous-Catégorie)
CREATE TABLE IF NOT EXISTS etiquette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    nom VARCHAR(100) NOT NULL UNIQUE,
    descriptif TEXT,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE
);

-- Table de relation Catégorie <-> Étiquette (Relation N:N)
CREATE TABLE IF NOT EXISTS categorie_etiquette (
    id_categorie INT NOT NULL,
    id_etiquette INT NOT NULL,
    PRIMARY KEY (id_categorie, id_etiquette),
    FOREIGN KEY (id_categorie) REFERENCES categorie(id) ON DELETE CASCADE,
    FOREIGN KEY (id_etiquette) REFERENCES etiquette(id) ON DELETE CASCADE
);

-- Table Recette
CREATE TABLE IF NOT EXISTS recette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    nom VARCHAR(100) NOT NULL,
    descriptif TEXT,
    instructions TEXT,
    image_url VARCHAR(255),
    temps_preparation INT NOT NULL CHECK (temps_preparation >= 0),
    temps_cuisson INT NOT NULL CHECK (temps_cuisson >= 0),
    difficulte ENUM('facile', 'moyenne', 'difficile') NOT NULL,
    id_categorie INT NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id) ON DELETE CASCADE,
);

-- Table de relation Recette <-> Étiquette (Relation N:N)
CREATE TABLE IF NOT EXISTS recette_etiquette (
    id_recette INT NOT NULL,
    id_etiquette INT NOT NULL,
    PRIMARY KEY (id_recette, id_etiquette),
    FOREIGN KEY (id_recette) REFERENCES recette(id) ON DELETE CASCADE,
    FOREIGN KEY (id_etiquette) REFERENCES etiquette(id) ON DELETE CASCADE
);

-- Table Ingrédient (Ajouté par l’Admin)
CREATE TABLE IF NOT EXISTS ingredient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT,
    id_utilisateur INT,
    nom VARCHAR(100) NOT NULL UNIQUE,
    unite_mesure VARCHAR(20) NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE SET NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE SET NULL
);

-- Table Liste_Personnelle (créée par l’utilisateur)
CREATE TABLE IF NOT EXISTS liste_personnelle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_admin INT,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE,
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE SET NULL
);

-- Table Liste_Personnelle_Ingredients (association Liste_Personnelle → Ingredient)
CREATE TABLE IF NOT EXISTS liste_personnelle_ingredients (
    id_liste_personnelle INT NOT NULL,
    id_ingredient INT NOT NULL,
    quantite DECIMAL(10,2) NOT NULL CHECK (quantite > 0),
    PRIMARY KEY (id_liste_personnelle, id_ingredient),
    FOREIGN KEY (id_liste_personnelle) REFERENCES liste_personnelle(id) ON DELETE CASCADE,
    FOREIGN KEY (id_ingredient) REFERENCES ingredient(id) ON DELETE CASCADE
);

-- Table Liste_Recette_Ingredients (association Recette → Ingredient)
CREATE TABLE IF NOT EXISTS liste_recette_ingredients (
    id_recette INT NOT NULL,
    id_ingredient INT NOT NULL,
    quantite DECIMAL(10,2) NOT NULL CHECK (quantite > 0),
    PRIMARY KEY (id_recette, id_ingredient),
    FOREIGN KEY (id_recette) REFERENCES recette(id) ON DELETE CASCADE,
    FOREIGN KEY (id_ingredient) REFERENCES ingredient(id) ON DELETE CASCADE
);

-- Table Recette_Favorite (association Utilisateur → Recette)
CREATE TABLE IF NOT EXISTS recette_favorite (
    id_utilisateur INT NOT NULL,
    id_recette INT NOT NULL,
    date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_utilisateur, id_recette),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE,
    FOREIGN KEY (id_recette) REFERENCES recette(id) ON DELETE CASCADE
);

-- Table Administrateur_Actions (Journal des modifications de l’Admin)
CREATE TABLE IF NOT EXISTS administrateur_actions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    table_modifiee ENUM('utilisateur', 'recette', 'ingredient', 'categorie', 'liste_personnelle', 'recette_favorite') NOT NULL,
    id_element INT NOT NULL, 
    action ENUM('ajout', 'modification', 'suppression') NOT NULL,
    date_action DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_admin) REFERENCES administrateur(id) ON DELETE CASCADE
);
