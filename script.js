(function($) {
    'use strict';
/*Modale*/
let modal = document.getElementById('myModal');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";}}

/*ouvrir modale*/
let openmodal = document.querySelectorAll('.openmodal');
openmodal.forEach(function(element){
  element.onclick = function(){
  modal.style.display = "block";
}
});

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
$('#load-more').on('click', function() {;
  currentPage++; // Do currentPage + 1, because we want to load the next page
  $.ajax({
    type: 'POST',
    url: 'wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filtre',/* changer de fonction*/
      paged: currentPage,
      category : $('#cat-select').val(),
      post_format : $('#form-select').val(),
      post_ordre : $('#tri-select').val(),
    },
    success: function (res) {
      $('.indexphoto').append(res);/*html pour filtre*/
      lightbox();
    }
  });
});

$('#cat-select').on('change',function(){/* remplacer par valiable selected*/
    $.ajax({
        type: 'POST',
        url: 'wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'filtre',
          category : $('#cat-select').val(),
          post_format : $('#form-select').val(),
          post_ordre : $('#tri-select').val(),
        },
        success: function (res) {
          $('.indexphoto').html(res);
          lightbox();
        }
    });
})

$('#form-select').on('change',function(){
    $.ajax({
        type: 'POST',
        url: 'wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'filtre',
          post_format : $('#form-select').val(),
          category : $('#cat-select').val(),
          post_ordre : $('#tri-select').val(),
        },
        success: function (res) {
          $('.indexphoto').html(res);
          lightbox();
        }
    });
})

$('#tri-select').on('change',function(){
    $.ajax({
        type: 'POST',
        url: 'wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'filtre',
          post_ordre : $('#tri-select').val(),
          category : $('#cat-select').val(),
          post_format : $('#form-select').val(),
        },
        success: function (res) {
          $('.indexphoto').html(res);
          lightbox();
        }
    });
})

/*menu toggle*/
let sidenav = document.getElementById("mySidenav");
let openBtn = document.querySelector(".openBtn");
let closeBtn = document.querySelector(".closeBtn");
let  chgt = document.getElementById('chgt');
let open = false;/*menu fermé au début*/

  chgt.onclick = openCloseNav;
 
function openCloseNav(){
if (open){
  sidenav.classList.remove("active");
  chgt.classList.add("openBtn");
  chgt.classList.remove("closeBtn");
  open = false;
}
else{
  sidenav.classList.add("active");
  chgt.classList.remove("openBtn");
  chgt.classList.add("closeBtn");
  open = true;
}
}

let move = document.querySelectorAll(".menu-item");
move.forEach(function(element) {
  element.addEventListener('click', closeNav);
});

function closeNav(){
  sidenav.classList.remove("active");
  chgt.classList.add("openBtn");
  chgt.classList.remove("closeBtn");
  open = false;
}
})(jQuery);