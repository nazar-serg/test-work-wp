</div>
    <footer class="footer">
       <div class="footer__container">
        <div class="footer__inners">
            <div class="footer__column-logo">
                <div class="footer__column-img">
                <?php 

                // Require a file called sidebar-main-logo.php
                get_sidebar( 'main-logo' ); 

                ?>
                </div>
            </div>
            <div class="footer__column-menu">
                <nav class="footer__menu">
                <?php
                    wp_nav_menu([
                        'theme_location'  => 'footer_menu',
                        'menu_class'      => 'footer__list',
                        'link_class'      => 'footer__link',
                        'add_li_class'    => 'footer__item',
                        'container'       => 'null'
                        ]);
                    ?>
                </nav>
            </div>
            <div class="footer__column-btn">
            <?php 

            // Require a file called sidebar-btn.php
            get_sidebar( 'btn' ); 

            ?>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__bottom-img">
            <?php 

            // Require a file called sidebar-logo.php
            get_sidebar( 'logo' ); 

            ?>
            </div> 
        </div>
       </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>

</html>