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
                 <?php
                    $cats = get_terms('speaker-position');
                    foreach($cats as $cat) {
                     ?>
                        <button  button data-filter=".<?php echo $cat->slug;?>" class=""><?php echo $cat->name;?> </button>
                    <?php
                        }
                     ?>
                  </div>
            <div class="speakers__content grid">
                <div class="speakers__inners">
                    <?php
                        $args =  array(
                            'post_type' => 'speaker',
                            'posts_per_page' => 10
                        );
                        $query = new WP_Query($args);
                        while($query->have_posts()) {
                            $query->the_post();
                        ?>
                        <div class="grid-item 
                        <?php 
                        
                        $port_cat=get_the_terms(get_the_ID(),'speaker-position');
                            foreach($port_cat as $cat){
                                echo $cat->slug.' ';
                            }
                        
                        ?>">
                    
                        <div class="speakers__column">
                            <div class="speakers__column-picture">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <div class="speakers__column-title">
                                <h3><a class="speakers__column-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <div class="speakers__profession">
                                <?php echo $cat->name;?>
                            </div>
                        </div>
                    </div>
                        <?php
                        }
                        wp_reset_postdata();
                    ?>
            </div>
        </div>
    </div>
</section>
 

<?php get_footer(); ?>