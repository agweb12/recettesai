<?php
// require_once('../inc/functions.php');
$titlePage = "Recettes AI";
$descriptionPage = "Recettes AI est un site qui vous permet de trouver des recettes de cuisine en fonction des ingrédients que vous avez chez vous.";
$indexPage = "index";
$followPage = "follow";
$keywordsPage = "Recettes AI, recette, ai, intelligence artificielle, cuisine, ingrédients, recettes, trouver une recette";
require_once('config/config.php');
require_once('views/header.php');
?>
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
    <section >
        <h1>Bienvenue sur Recettes AI</h1>
        <p>Recettes AI est un site qui vous permet de trouver des recettes de cuisine en fonction des ingrédients que vous avez chez vous. Il vous suffit de saisir les ingrédients que vous avez et nous vous proposerons des recettes adaptées.</p>
        
    </section>
    <section>
        <h2>Nos recettes</h2>
        <p>Voici quelques-unes de nos recettes les plus populaires :</p>
        <ul>
            <li><a href="recette1.php">Recette 1</a></li>
            <li><a href="recette2.php">Recette 2</a></li>
            <li><a href="recette3.php">Recette 3</a></li>
            <li><a href="recette4.php">Recette 4</a></li>
            <li><a href="recette5.php">Recette 5</a></li>
            <li><a href="recette6.php">Recette 6</a></li>
        </ul>
        <p>Vous pouvez également consulter notre <a href="blog.php">blog</a> pour des conseils et astuces de cuisine.</p>
    </section>
    <section>
        <h2>Contactez-nous</h2>
        <p>Si vous avez des questions ou des suggestions, n'hésitez pas à nous contacter via notre <a href="contact.php">formulaire de contact</a>.</p>
        <p>Vous pouvez également nous suivre sur nos réseaux sociaux :</p>
        <ul>
            <li><a href="https://www.facebook.com/RecettesAI" target="_blank">Facebook</a></li>
            <li><a href="https://www.twitter.com/RecettesAI" target="_blank">Twitter</a></li>
            <li><a href="https://www.instagram.com/RecettesAI" target="_blank">Instagram</a></li>
            <li><a href="https://www.linkedin.com/company/RecettesAI" target="_blank">LinkedIn</a></li>
            <li><a href="https://www.pinterest.com/RecettesAI" target="_blank">Pinterest</a></li>
            <li><a href="https://www.tiktok.com/@RecettesAI" target="_blank">TikTok</a></li>
            <li><a href="https://www.youtube.com/RecettesAI" target="_blank">YouTube</a></li>
            <li><a href="https://www.snapchat.com/add/RecettesAI" target="_blank">Snapchat</a></li>
            <li><a href="https://www.reddit.com/user/RecettesAI" target="_blank">Reddit</a></li>
            <li><a href="https://www.tumblr.com/RecettesAI" target="_blank">Tumblr</a></li>
            <li><a href="https://www.quora.com/profile/RecettesAI" target="_blank">Quora</a></li>
            <li><a href="https://www.discord.com/invite/RecettesAI" target="_blank">Discord</a></li>
        </ul>
        <p>Nous sommes également disponibles sur WhatsApp et Telegram pour répondre à vos questions.</p>
        <p>Pour toute demande de partenariat ou de collaboration, veuillez nous contacter à l'adresse suivante : <a href="mailto:slmqsl@gmail.com"></a></p>
        <p>Nous sommes impatients de vous aider à trouver la recette parfaite !</p>
    </section>
    <section>
        <h2>À propos de nous</h2>
        <p>Recettes AI est une équipe de passionnés de cuisine et de technologie. Nous avons créé ce site pour aider les gens à trouver des recettes facilement et rapidement.</p>
        <p>Nous croyons que la cuisine doit être accessible à tous, c'est pourquoi nous avons développé cet outil pour vous aider à cuisiner avec ce que vous avez chez vous.</p>
        <p>Nous espérons que vous apprécierez notre site et que vous trouverez des recettes délicieuses à essayer !</p>
        <p>Merci de votre visite et à bientôt sur Recettes AI !</p>
    </section>
    <section>
        <h2>Mentions légales</h2>
        <p>Recettes AI est un site de démonstration et n'est pas responsable des recettes proposées. Les recettes sont fournies à titre d'exemple et peuvent ne pas convenir à tous les régimes alimentaires.</p>
        <p>Pour plus d'informations, veuillez consulter notre <a href="mentions-legales.php">page de mentions légales</a>.</p>

</section>
    <section>
        <h2>Politique de confidentialité</h2>
        <p>Nous respectons votre vie privée et nous nous engageons à protéger vos données personnelles. Pour plus d'informations, veuillez consulter notre <a href="politique-confidentialite.php">politique de confidentialité</a>.</p>
    </section>
    <section>
        <h2>Conditions d'utilisation</h2>
        <p>En utilisant notre site, vous acceptez nos <a href="conditions-utilisation.php">conditions d'utilisation</a>.</p>
    </section>
    <section>
        <h2>Accessibilité</h2>
        <p>Nous nous engageons à rendre notre site accessible à tous. Si vous rencontrez des difficultés pour accéder à notre site, veuillez nous contacter.</p>
    </section>
    <section>
        <h2>Plan du site</h2>
        <p>Vous pouvez consulter notre <a href="sitemap.php">plan du site</a> pour naviguer facilement sur notre site.</p>
    </section>
    <section>
        <h2>FAQ</h2>
        <p>Vous avez des questions ? Consultez notre <a href="faq.php">FAQ</a> pour trouver des réponses aux questions les plus fréquentes.</p>
    </section>


<?php
require_once('views/footer.php');
?>