<?php

get_header();

echo '<br/><br/>';

if ( have_posts() ) :
    while ( have_posts() ) : the_post();?>

        <?php 
        $id = get_the_ID();
        
        $url_thumbnail = get_the_post_thumbnail_url($id, "full"); // The featured image
        echo '<img src="'.$url_thumbnail.'" class="img-fluid">';
        ?>

        <br/>
        <br/>
        <br/>

        <h2><?php the_title(); ?></h2>

        <p>
        <?php the_author();?> - <?php echo get_the_date('F j, Y');?>
        </p>

        <br/>

        <?php
        the_content(); 

        // the_category();
        
        ?>
<?php
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;

get_footer();

?>