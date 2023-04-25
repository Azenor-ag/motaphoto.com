<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <header>
      <?php the_custom_logo() ; ?>
      <div class="menu_principal">
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
      </div>
     <div id="mySidenav" class="sidenav burger">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>

<a href="#" id="chgt" class="openBtn"></a>
 </header>


 
 