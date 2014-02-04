function verificationNotes () {
					var notes=document.getElementsByClassName("note");
					for(var i=0; i<notes.length; i++){
						if ((notes[i].value!="abs" && isNaN(notes[i].value)) || (notes[i].value<0 || notes[i].value>20)){
							notes[i].value="!corriger!";
							var erreur=true;
						}
					}
					if(erreur==true) {
						alert('Les notes doivent être comprises entre 0 et 20, indiquez abs pour les absents');
						return false;
					
					} else {
						return true;
					}
				}