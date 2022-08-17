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
            </div>
            <?php
            $sessions = get_field('sessions');
            if ($sessions):
                foreach ($sessions as $session): ?>
                    <p><?php echo $session->post_title; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>