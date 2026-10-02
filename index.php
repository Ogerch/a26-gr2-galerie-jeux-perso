<?php
// Lire le fichier JSON de la liste des jeux et le convertir en structure PHP

// Afficher le contenu du tableau $_GET
// echo "Le tableau $_GET : <br>";
// print_r($_GET);

// Afficher le contenu du tablieau $_POST
// echo "<p>Le tableau $_POST : <br>";
// print_r($_POST);

$listeJeux = json_decode(file_get_contents('data/donnees-jeux.json'));
// Tester
// print_r($listeJeux);

// Rechercher out filtre dans la galerie


// ************SOLUTION TRADITIONELLE : requête/réponse gerees par e browser sans JS

// function filterJeu($jeu)

    // Filtre un jeu par mot-clé

    // @param {object} $jeu : Un objet jeu du tableau $listeJeux
    // @return {boolean} : true si le creatriceOuCreateur du jeu contient le mot-clé envoye par GET en parametre de requete.

    
    function filtrerJeu($jeu)
    {
    // print_r($jeu);
    $mc = strtolower($_GET['mc']);
    return (str_contains(strtolower($jeu->titre), $mc) || str_contains(strtolower($jeu->creatriceOuCreateur), $mc));
    
    // if(str_contains(strtolower($jeu->titre), $mc) || str_contains(strtolower($jeu->creatriceOuCreateur), $mc))
    // {
    //     return true;
    // } else {
    //     return false;
    // }
}

if(isset($_GET['mc'])) 
    {
        // Filtrer le tableau listeJeux en utilisant la valeur de la variable $_GET['mc']
        $listeJeux = array_filter($listeJeux, 'filtrerJeu');

        
        
    }

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

            button {
                width: 50px;
                height: 50px;
                background-color: #11ff00;
                border: 1px solid #ffffff;
                cursor: pointer;
            }
        }
    </style>

</head>

<body>
    <h1>Galerie de jeux</h1>

    <form>
        <input
            type="search"
            name="mc"
            id="motscles"
            placeholder="Saisir des mots-clés pour filtrer la liste" />
        <!-- <input type="color" name="ma-couleur" />
        <input type="date" name="date-naissance" />
        <input type="password" name="mdp" /> -->
        <button type="submit"></button>
    
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