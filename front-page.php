<?php get_header(); ?>

<div class="row">
    
    <div class="col-md-6">
        <?php    
        /************* Custom Logo **********************/
        if ( function_exists( 'the_custom_logo' ) ) {        
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'large' );
            $logo = $image[0];

            echo '<img src="'.$logo.'" class="img-fluid rounded-circle">';
        }
        ?>
    </div>
</div>

<?php
/*************** Get the categories ********************/
$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC'));

// foreach($categories as $category) {
    $category_link = get_category_link($category);
    $category_name = $category->name;
    
    echo '<h3><a href="'.$category_link.'">'.$category_name.'</a></h3>';

    /*********** Get the posts for this category *************/
    $posts = get_posts(array(
        "numberposts" => 1,
        "orderby"     => 'date',
        "order"       => 'desc',
        "category"    => $category->term_id));

    foreach($posts as $fp) {
        echo '<div class="row">';
        echo '<div class="col-md-6">';
        
        // full, large, medium, thumbnail
        $url_thumbnail = get_the_post_thumbnail_url($fp->ID, "full"); // The featured image
        $excerpt = get_the_excerpt($fp->ID);
        $url_post = get_permalink($fp->ID);
        $title = $fp->post_title;
        $date = get_the_date('F j, Y', $fp->ID);
        $author = get_the_author_meta('display_name', $fp->post_author);
        echo '<img src="'.$url_thumbnail.'" class="img-fluid"><br/>';

        echo '</div><div class="col-md-6">';

        echo '<a href="'.$url_post.'" class="title-main text-dark text-decoration-none">'.$title .'</a><br/><br/>';
        echo '<span class ="fw-light h5">' . $date . '</span><br/>';
        echo '<span class ="fw-light h5">By ' . $author . '<br/><br/>';
        echo  '<span class="h4">' . $excerpt . '</span><br/>';
        echo '</div></div>';
    }

// }
?>

<?php
    echo '<div class="row mt-5">';
/*************** Get the categories ********************/
$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC'));


foreach($categories as $category) {
    $category_link = get_category_link($category);
    $category_name = $category->name;
    echo '<div class="col-md-3">';

    /*********** Get the posts for this category *************/
    $posts = get_posts(array(
        "numberposts" => 3,
        "orderby"     => 'date',
        "order"       => 'desc',
        "category"    => $category->term_id)); //For the main content in the page, pull "tag" here and look up for your tag, example: fature. Try to create a proportion of 2/3 (8 columns to 4 columns on the right)
        echo '<h3><a href="'.$category_link.'" class="text-decoration-none text-dark myLinks">'.$category_name.'</a></h3>';
    $count = 1;    
    foreach($posts as $fp) {
        // full, large, medium, thumbnail
        $url_thumbnail = get_the_post_thumbnail_url($fp->ID, "thumbnail"); // The featured image
        $url_post = get_permalink($fp->ID);
        $title = $fp->post_title;
        if($count==1){
            echo '<div class="row mt-2">';        
            echo '<img src="'.$url_thumbnail.'" class="img-fluid"><br/>';
            echo '<a href="'.$url_post.'" class="title-sub text-decoration-none text-dark fw-bold myLinks h4">'.$title .'</a><br/>';
            echo '</div>';
        } else { 
            echo '<div class="row mt-3">';        
            echo '<a href="'.$url_post.'" class="title-sub text-decoration-none text-dark fw-light myLinks h4">'.$title .'</a><br/>';
            echo '</div>';
        }
        $count++;

    }
    echo '</div>';

}
    echo '</div>';
?>

<?php get_footer(); ?>