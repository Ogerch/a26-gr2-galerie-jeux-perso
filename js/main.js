const frmFiltre = document.querySelector("#filtre-jeux");
const saisieMotCle = frmFiltre.querySelector('input');

frmFiltre.addEventListener('submit', gererFrm);
saisieMotCle.addEventListener('input', soumettreRequeteFiltre);

function gererFrm(evt) {
    evt.preventDefault();
}

/*************************************************************/
/*********** Étape 1 de la technique asynchrone **************/
/* récupérer saisie utilisateur et soumettre requête HTTP ****/
/*************************************************************/
async function soumettreRequeteFiltre(evt) {
    // A : récupérer la saisie de l'utilisateur.
    let mc = saisieMotCle.value;

    // B : faire une requête au serveur avec les paramètres de requête correspondants à cette saisie
    // console.log("Saisie : ", mc);
    let reponse = await fetch('ajax/liste-jeux.async.php?mc=' + mc);

    // Début de l'étape 3
    let jeuxJSON = await reponse.json();
    actualiserAffichage(jeuxJSON);
}

/*************************************************************/
/*********** Étape 3 de la technique asynchrone **************/
/* Mettre à jour l'affichage (UI) avec la réponse JSON *******/
/*************************************************************/
function actualiserAffichage(jeux) {
    console.log(jeux);
    // A : vider le UI des jeux qui étaient affichés
    const galerie = document.querySelector('section.galerie');
    galerie.innerHTML = '';

    // A2 : cloner le gabarit HTML qu'il faut reproduire pour l'affichage de 
    // chaque jeu
    let gabaritJeu = document.querySelector("#gabarit-jeu").content;
    let cloneGabaritJeu;

    // B : recontruire la galerie avec le tableau filtré reçu dans le paramètre
    for (let jeu of jeux) {
        // Obtenir une copie du gabarit (clone)
        cloneGabaritJeu = gabaritJeu.cloneNode(true);
        // Modifier la copie avec les valeurs du jeu dans l'itération...
        cloneGabaritJeu.id = jeu.id;
        cloneGabaritJeu.querySelector('.titre').innerHTML = jeu.titre;
        cloneGabaritJeu.querySelector('.creatrice').innerHTML = jeu.creatriceOuCreateur;
        // Injecter cette copie dans la page au bon endroit
        galerie.append(cloneGabaritJeu);
    }
}