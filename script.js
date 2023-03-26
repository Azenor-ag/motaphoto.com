/*Modale*/
let modal = document.getElementById('myModal');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";}}

/*ouvrir modale*/
let openmodal = document.getElementsByClassName('openmodal')[0];
openmodal.onclick = function(){
    modal.style.display = "block";
}