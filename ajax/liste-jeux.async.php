<?php

/*************************************************************/
/*********** Étape 2 de la technique asynchrone **************/
/* récupérer les paramètres et générer et envoyer la réponse */
/*************************************************************/

// Créer un translitérateur 
$translit = Transliterator::create('Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; Lower();');

// A : Récupérer les paramètre de requête
$mc = '';
if (isset($_GET['mc'])) {
    $mc = $translit->transliterate($_GET['mc']);
}

// B : Récupérer tous les jeux dans le fichier de données
$listeJeux = json_decode(file_get_contents('../data/donnees-jeux.json'));

/**
 * @param stdClass $unJeu : l'objet jeu passé par array_filter
 */
function filtrerJeu($unJeu)
{
    global $mc;
    global $translit;
    return str_contains($translit->transliterate($unJeu->titre), $mc) ||
        str_contains($translit->transliterate($unJeu->creatriceOuCreateur), $mc);
}

// C : Filtrer selon le mot-clé dans la variable $mc
$listeJeux = array_values(array_filter($listeJeux, 'filtrerJeu'));

// D : Préparer et générer la réponse
echo json_encode($listeJeux);