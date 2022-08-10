<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
<div class="wrapper">
    <header class="header">
        <div class="header__container-big">
            <div class="header__body">
                <div class="header__logo">
                    <?php echo the_custom_logo(); ?>
                </div>
                <div class="header__burger">
                        <span></span>
                </div>
                <nav class="header__menu">
                    <?php
                        wp_nav_menu([
                            'theme_location'  => 'my_main_menu',
                            'menu_class'      => 'header__list',
                            'link_class'      => 'header__link',
                            'add_li_class'    => 'header__item',
                            'container'       => 'null'
                        ]);
                    ?>
                </nav>
                <div class="header__register">
                    <button class="header__register-btn">Register</button>
                </div>
                <div class="header__languages">
                    <ul class="header__languages-list">
                        <li class="header__languages-item">
                            <a class="header__languages-link"href="#">EN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="main">


            
        