/**
	*champsVides vérifie qu'un utilisateur a bien rempli les champs de connexion
	*
	*@return mixed La fonction renvoie true si les champs sont bien remplis, sinon elle renvoie un message d'erreur
*/
function champsVides() {
	/* Récupération des inputs utiles en tant qu'objets */
	var id=document.getElementById('id');
	var mp=document.getElementById('mp');
	
	/* On vérifie que les champs value sont renseignés */
	if (id.value=='' || mp.value==''){ //si un champ est vide
		alert('Merci de remplir les champs identifiant et mot de passe'); //renvoie un pop-up
		return false; //Pour stopper l'envoie du formulaire
	} else { //sinon c'est bon
		return true; //Envoie le formulaire
	}
}

/**
	*fonction qui ne prend pas d'arguments et qui permet de vérifier si les notes (inputs avec name="note") sont valides, affiche un pop-up en cas d'erreur
	*
	*@return boolean
*/
function verificationNotes () {
					var notes=document.getElementsByClassName("note"); //renvoie toutes les notes dans un tableau
					for(var i=0; i<notes.length; i++){
						if ((notes[i].value!="abs" && isNaN(notes[i].value)) || (notes[i].value<0 || notes[i].value>20)){
							notes[i].value="!corriger!"; //envoie un message dans la cellule fausse
							var erreur=true; //vrai si une erreur de saisie est levée
						}
					}
					if(erreur==true) {
						alert('Les notes doivent être comprises entre 0 et 20, indiquez abs pour les absents');
						return false;
					
					} else {
						return true;
					}
				}