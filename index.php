<?php
// Lire le fichier JSON de la liste des jeux et le convertir en structure PHP
$listeJeux = json_decode(file_get_contents('data/donnees-jeux.json'));
// Tester
// print_r($listeJeux);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie de jeux</title>
    <style>
        section.galerie {
            display: flex;
            flex-wrap: wrap;
            gap: 0.3rem;

            article {
                width: 300px;
                height: 200px;
                border-radius: 5px;
                border: 2px solid black;
                padding: 0.5rem;
            }
        }

        form {
            margin: 1rem auto;
            display: flex;
            flex-direction: column;

            input {
                width: 80vw;
                font-size: 1.3rem;
                padding: 0.5rem;
                border-radius: 3px;
                border: 1px solid gray;
            }
        }
    </style>
</head>

<body>
    <h1>Galerie de jeux</h1>

    <form action="">
        <input
            type="search"
            name="motscles"
            id="motscles"
            placeholder="Saisir des mots-clés pour filtrer la liste" />
    </form>
    <section class="galerie">

        <!-- Gabarit pour présenter un jeux -->

        <!-- Version impérative avec la boucle for -->
        <!-- 
        <?php for ($i = 0; $i < count($listeJeux); $i++) { ?>
            <article id="<?= $listeJeux[$i]->id; ?>">
                <h3><?= $listeJeux[$i]->titre; ?></h3>
                <p><?= $listeJeux[$i]->creatriceOuCreateur; ?></p>
            </article>
        <?php } ?> 
        -->

        <!-- Version déclarative avec la boucle foreach -->
        <?php foreach ($listeJeux as $jeu) {  ?>
            <article id="<?= $jeu->id; ?>">
                <h3><?= $jeu->titre; ?></h3>
                <p><?= $jeu->creatriceOuCreateur; ?></p>
            </article>
        <?php } ?>

    </section>
</body>

</html>