/*lightbox*/
function lightbox(){
let closehere = document.querySelector(".closehere");

closehere.onclick = function() {
      full_window.style.display = "none"; 
      document.querySelector('.window-overlay').removeChild(document.querySelector('.window-overlay').lastChild);
    }

let openlightbox = document.querySelectorAll('.full_screen');
openlightbox.forEach(function(element){
    element.onclick = function(){
        full_window.style.display = "block";
      let elementUrl= element.getAttribute("data-image");
      let img = document.createElement('img');
      img.src = elementUrl;
      document.querySelector('.window-overlay').appendChild(img);
}
})
}
lightbox();