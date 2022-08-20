<?php get_header(); ?>
<div class="content">
    <div class="content__container">
        <div class="content__inners">
            <div class="content__column">
                <div class="content__column-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="content__column-description">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="content__column">
                <div class="content__column-picture">
                    <img class="content__column-img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div>
            </div>
        </div>   
    </div>
    <div class="sessions">
        <div class="sessions__container">
            <div class="sessions__title">
                <h2>Sessions</h2>
                <?php
                $featured_posts = get_field('session');
                if( $featured_posts ): ?>
                    <ul class="sessions__list">
                    <?php foreach( $featured_posts as $featured_post ): 
                        $title = get_the_title( $featured_post->ID );
                        ?>
                        <li>
                            <?php echo esc_html( $title ); ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>