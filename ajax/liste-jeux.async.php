<?php

// sleep(5);

/*****************************************************/
/******* Étape 2 de la technique asychrone **********/
/*****************************************************/

/* récupérer les paramètres et de la requête GET */
$mc = '';

if (isset($_GET['mc'])) {
    $mc = strtolower($_GET['mc']);
}


// Recuperer tous les jeux dans le fichier de données
$listeJeux = json_decode(file_get_contents('../data/donnees-jeux.json'));
// $listeJeux = json_decode($listeJeux);

// Filtrer selon le mot-clé dans la variable $mc

/**
 * @param stdClass $unJeu
 */

function filtrerJeu($unJeu)
{
    global $mc;
    return str_contains(strtolower($unJeu->titre), $mc) || str_contains(strtolower($unJeu->creatriceOuCreateur), $mc);
}
// C: filtre selon le mot-clé dans la variable $mc
array_values(array_filter($listeJeux, 'filtrerJeu'));

// D: Préparer la péponse

echo json_encode($listeJeux);
