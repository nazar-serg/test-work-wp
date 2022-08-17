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
                 <?php
                    if ($positions = get_terms(array('taxonomy' => 'speaker-position', 'orderby' => 'name' ))){
                        
                    echo "<div class='speakers__dropdown'>";
                    echo "<div class='speakers__name-category'>Positions</div>";
                    echo "<div class='speakers__dropdown-content'>";
                    foreach($positions as $position) {
                     ?> 
                        <button  button data-filter=".<?php echo $position->slug;?>" class=""><?php echo $position->name;?> </button>
                    <?php
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                     ?>

                    <?php
                    if ($countries = get_terms(array('taxonomy' => 'speaker-countries', 'orderby' => 'name' ))) {
                        
                    echo "<div class='speakers__dropdown'>";
                    echo "<div class='speakers__name-category'>Country</div>";
                    echo "<div class='speakers__dropdown-content'>";
                    foreach($countries as $country) {
                     ?> 
                        <button  button data-filter=".<?php echo $country->slug;?>" class=""><?php echo $country->name;?> </button>
                    <?php
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                     ?>
                  </div>
            <div class="speakers__content grid">
                <div class="speakers__inners">
                    <?php
                        $args =  array(
                            'post_type' => 'speaker',
                            'posts_per_page' => 20
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
                        ?>

                        <?php 
                        
                        $example_cat=get_the_terms(get_the_ID(),'speaker-countries');
                            foreach($example_cat as $elem){
                                echo $elem->slug.' ';
                            }
                        ?>
                        
                        ">
                    
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
                                <?php echo $cat->name; ?>
                            </div>
                            <div class="speakers__сountry">
                                <?php echo $elem->name; ?>
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