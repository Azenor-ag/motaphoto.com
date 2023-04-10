(function($) {
    'use strict';
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

/*single.php*/
/*bouton contact*/
$('#lienmodale').on('click', function() {
    modal.style.display = "block";
    $(document).ready(function(){
        $(".refer .wpcf7-text").val($('#ref-photo').text());
      });
});

/* pagination infinie*/
let currentPage = 1;
$('#load-more').on('click', function() {
  currentPage++; // Do currentPage + 1, because we want to load the next page
  $.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'weichie_load_more',
      paged: currentPage,
    },
    success: function (res) {
      $('.indexphoto').append(res);
    }
  });
});

})(jQuery);