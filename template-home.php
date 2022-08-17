<?php
/**
 * Template Name: Home template
 */

get_header(); 
?>
<div class="content-area">
    <main>
        <section class="banner-home">
            <div class="banner-home__container-big">
                <div class="banner-home__picture">
                    <div class="banner-home__body">
                        <div class="banner-home__sub-text">
                            <p><?php the_field( 'banner_sub_text' ); ?> <span><?php the_field( 'banner_sub_text_data' ); ?></span></p>
                        </div>
                        <div class="banner-home__title">
                            <h1><?php the_field( 'banner_tittle' ); ?></h1>
                        </div>
                        <div class="banner-home__description">
                            <?php the_field( 'banner_description' ); ?>
                        </div>
                        <div class="banner-home__btn">
                        <?php
                            $link = get_field( 'banner_btn' );
                            if ( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                            ?>
                            <a class="banner-home__btn-link" href="<?php echo esc_url( $link_url ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="address-of-welcome">
            <div class="address-of-welcome__container-big">
                <div class="address-of-welcome__inners">
                    <div class="address-of-welcome__column address-of-welcome__column-picture">
                    <?php 
                        $image = get_field( 'address_of_welcome_image' );
                        $size = 'full';
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                    ?>
                    </div>
                    <div class="address-of-welcome__column address-of-welcome__column-description">
                        <div class="address-of-welcome__column-title">
                            <h2><?php the_field( 'address_of_welcome_title' ); ?></h2>
                        </div>
                        <div class="address-of-welcome__column-description">
                            <?php the_field( 'address_of_welcome_description' ); ?>
                        </div>
                        <div class="address-of-welcome__column-btn">
                            <div class="address-of-welcome__column-btn-inners">
                                <div class="address-of-welcome__column-btn-icon">
                                <?php 
                                    $image = get_field( 'address_of_welcome_btn_icon' );
                                    $size = 'full';
                                    if( $image ) {
                                        echo wp_get_attachment_image( $image, $size );
                                    }
                                ?>
                                </div>
                                <div class="address-of-welcome__column-btn-lear-more">
                                <?php
                                $link = get_field( 'address_of_welcome_btn' );
                                if ( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                ?>
                                <a class="address-of-welcome__column-btn-link" href="<?php echo esc_url( $link_url ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                </a>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>