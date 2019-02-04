

function loadDoc(){

let inputNom = document.getElementById('fake_cherchenom_Prenom').value;
let inputDate = document.getElementById('cherchenom_Annee').value;
							// let variable = 0;
							// variable = document.getElementById('reponseElevePourVariable').value;
							// console.log(variable);
							var xhttp = new XMLHttpRequest();


							xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200){
									// document.getElementByd('bonneReponseBravo').innerHTML= this.responseText;
								}
							}



							xhttp.open("POST", "check.php", true);
							xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
							xhttp.send('inputNom=' + inputNom+'&inputDate='+inputDate);
								
							}