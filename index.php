<?php get_header(); ?>
    <div class="container">
        <div class="spacer" style="height:100px;"></div>
        <div class="header">
            <h1><?php the_title(); ?></h1>
        </div>
        <p><?php the_content(); ?></p>
        <div class="spacer" style="height:100px;"></div>
    </div>
<?php get_footer(); ?>