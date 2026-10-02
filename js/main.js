const frmFiltre = document.querySelector("#filtre-jeux");
const saisieMotCle = frmFiltre.querySelector('input');

frmFiltre.addEventListener('submit' , gererFrm);
saisieMotCle.addEventListener('input', soumettreRequeteFiltre);

function gererFrm(evt) {
    evt.preventDefault();

}

/*****************************************************/
/******* Étape 2 de la technique asychrone **********/
/*****************************************************/ 

/* récupérer lsaisie utilisateur et soumettre requête HTTP */


async function soumettreRequeteFiltre(evt) {

    // console.log("Le Formulaire est SOUMIt :", evt);
    // Étape 1 : recuperer l'interactvité de l'utilisateur.
    // A: Récuperer la saisie de l'utilisateur
    let mc = saisieMotCle.value;

    // B: faire une requete au serveur avec les parametre de requete correspondant a cette interactivité
    // Étape 2 : faire une requete au serveur avec les parametres de requete correspondant a cette interactivité
    console.log("Saisie :", mc);
    let reponse = await fetch('ajax/liste-jeux.async.php?mc=' + mc);
    let jeuxJSON = await reponse.json(); 
    actualiserAffichage(jeuxJSON);

}

/*****************************************************/
/******* Étape 3 de la technique asychrone **********/
/*Mettre a jour l'affichage avec la réponse JSON */ 
/*****************************************************/ 

function actualiserAffichage(jeux) {
    console.log(jeux);
    // A: vider le UI des jeux qui étaient affichés
    const galerie = document.querySelector('section.galerie');
    galerie.innerHTML = '';

    // B: reconstruire la galaerie avec le tableau filtré recu dans le parmetre jeux
    for(let jeu of jeux) {
        galerie.innerHTML += "<p>" + jeu.titre + "</p>";
    }

}