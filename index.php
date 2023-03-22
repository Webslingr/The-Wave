<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();?>
        <br/>
        <br/>
        <h2><?php the_title(); ?></h2>
        <br/>
        <?php the_content(); ?>
<?php
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;

get_footer();

?>