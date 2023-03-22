<footer>

    <hr>
    
    <div class="row">
        <div class="col-md-6">
            <h1><a href="<?php echo get_home_url(); ?>" class=" text-decoration-none text-dark navlogo"><?php echo get_bloginfo("name"); ?></a></h1>
        </div>

        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <ul>
                <?php 
                $menu = wp_get_nav_menu_items('Footer Menu');

                foreach($menu as $menu_item)
                {
                    echo '<li class="text-decoration-none d-flex justify-content-end h4"><a href="'.$menu_item->url.'" class="nav-link navfoot">'.$menu_item->title.'</a></li>'; //$menu_item->url." ".$menu_item->title ."<br>";
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

</div><!-- /container -->

<?php wp_footer(); ?>

</body>
</html>