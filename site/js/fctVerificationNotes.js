/*
	fonction qui ne prend pas d'arguments et qui permet de vérifier si les notes
	(inputs avec name="note") sont valides.
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