<?php
/**
 * Template Name: Speakers template
 */

get_header(); 
?>
<section class="speakers">
    <div class="speakers__container">
        <div class="speakers__row">
            <div class="speakers__aside">
                <h3 class="speakers__aside-title">Category</h3>
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                <?php
                    if( $terms = get_terms( array( 'taxonomy' => 'speaker-position', 'orderby' => 'name' ) ) ) : 
                        echo '<select class="speakers__select-name" name="speaker-position"><option value="">Select category...</option>';
                        foreach ( $terms as $term ) :
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                        endforeach;
                        echo '</select>';
                    endif;

                    if( $terms = get_terms( array( 'taxonomy' => 'speaker-countries', 'orderby' => 'name' ) ) ) : 
                        //var_dump($terms);
                        echo '<select class="speakers__select-name" name="speaker-countries"><option value="">Select category...</option>';
                        foreach ( $terms as $term ) :
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                        endforeach;
                        echo '</select>';
                    endif;
                ?>
                <button class="speakers__btn-aside">Apply filter</button>
                <input type="hidden" name="action" value="myfilter">
                </form>
            </div>
            <div class="speakers__content">
                <h2><?php _e( 'Speakers', 'test-work'); ?></h2>
                <div id="response"></div>
            </div>
        </div>
    </div>
</section>
 

<?php get_footer(); ?>