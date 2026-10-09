<?php
// Afficher le contenu du tableau $_GET
// echo 'Le tableau $_GET : <br>';
// print_r($_GET);

// Afficher le contenu du tableau $_POST
// echo '<p>Le tableau $_POST : <br>';
// print_r($_POST);


// Lire le fichier JSON de la liste des jeux et le convertir en structure PHP
$listeJeux = json_decode(file_get_contents('data/donnees-jeux.json'));
// Tester
// print_r($listeJeux);


// // Recherche (ou filtre) dans la galerie
// /*********** SOLUTION TRADITIONNELLE : requête/réponse gérées par le browser sans JS */
// /**
//  * Filtre un jeu par mot-clé
//  * 
//  * @param object $jeu : Un objet jeu du tableau $listeJeux
//  * 
//  * @return boolean : true si le titre ou le creatriceOuCreateur du jeu contient le mot-clé envoyé par GET en paramètre de requête.
//  */
// function filtrerJeu($jeu)
// {
//     $mc = strtolower($_GET['mc']);
//     return str_contains(strtolower($jeu->titre), $mc) || str_contains(strtolower($jeu->creatriceOuCreateur), $mc);
// }

// if (isset($_GET['mc'])) {
//     // Filtrer le tableau $listeJeux en utilisant 
//     // la valeur de la variable $_GET['mc']
//     $listeJeux = array_filter($listeJeux, 'filtrerJeu');
// }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie de jeux</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <h1><a href="index.php">Galerie de jeux</a></h1>


    <form id="filtre-jeux">
        <input
            type="search"
            name="mc"
            placeholder="Saisir des mots-clés pour filtrer la liste" />
    </form>
    <section class="galerie">

        <!-- Version déclarative avec la boucle foreach -->
        <?php foreach ($listeJeux as $jeu) {  ?>
            <article id="<?= $jeu->id; ?>">
                <h3><?= $jeu->titre; ?></h3>
                <p><?= $jeu->creatriceOuCreateur; ?></p>
            </article>
        <?php } ?>

    </section>


    <template id="gabarit-jeu">
        <article id="id du jeu">
            <h3 class="titre">titre du jeu</h3>
            <p class="creatrice">créatrice du jeu</p>
        </article>
    </template>
</body>

</html>