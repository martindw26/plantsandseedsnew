<?php get_header(); ?>

<div class="container p-2 mt-2">
<?php 

// Initialize the $ros_ad_header variable
$ros_ad_header = get_field('ros_ad_header', 'option');

if (!is_singular()) {
    $leaderboard_ros_top_header_path = get_field('leaderboard_ros_top_header_path', 'option');
}

if ($ros_ad_header === 'on' && is_single()) { // Check if $ros_ad_header is 'on' and the current post is a single post
    echo '<section class="ros_ad_header">';
    $leaderboard_ros_top_body_script = get_field('leaderboard_ros_top_body_script', 'option');
    $leaderboard_top_body_script_switch = get_field('ros_ad_header', 'option');
  
    if ($leaderboard_top_body_script_switch === 'on') {
        echo '<section class="ad_header_top">';
        echo $leaderboard_ros_top_body_script;
        echo '</section>';
    }
    echo '</section>';
}

?>
</div>

<div class="container text-sm-start p-2 mb-2 text-muted">
Plants & Seeds contains affiliate links to products. We may receive a commission for purchases made through these links. Please also report price issues at Report Price Issues
</div>

<div class="container">

    <div class="row">
    <?php
$sidebartogglesingle = get_field('show_sidebar_single', 'option');
if ($sidebartogglesingle === "yes") {
    
    echo '<div class="col-md-8">';
} else {
    
    echo '<div class="col-lg-12">';
}
?>
                       <?php if (has_post_thumbnail()) : ?>
        <div class="post-image">
            <?php the_post_thumbnail('post-featured-image', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
        </div>
    <?php endif; ?>
                    </figure>
                    <div class="post-title">
                    <h1 class="text-center fs-1 pt-4"><?php the_title(); ?></h1>
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php if (has_post_thumbnail()) : ?>

                    </div>
                <?php else : ?>
                    <!-- Fallback image -->
                    <img src="https://plantsandseeds.co.uk/wp-content/uploads/2024/01/Bell-Peppers-green.png" class="post-image rounded-circle me-3 d-md-none" alt="Fallback Image" style="max-width: 100%; height: auto;">
                <?php endif; ?>

                <div class="text-center">
                <section class="meta-top">
                    <?php
                    $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                    ?>
                    <p class="text-muted">
                        <?php echo get_the_date(); ?> | By <?php echo $author_name; ?> |
                        <?php
                        // Check if the post has categories
                        $categories = get_the_category();
                        if ($categories) {
                            $separator = ' > '; // Define the separator

                            // Loop through each category
                            foreach ($categories as $index => $category) {
                                echo '<a style="color:green; text-decoration:none;" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>'; // Output the category name with a link
                                // Add separator if it's not the last category
                                if ($index < count($categories) - 1) {
                                    echo $separator;
                                }
                            }
                        }
                        ?>
                    </p>
                </section>
              
                    </div>
                    <div class="container">
                <?php the_content(); ?>
                    </div>
                    <div class="container-fluid text-black" style="height:60px; padding-top:8px;">
    <div class="social_share_header">
                <?php
                $on_article = get_field('on_article', 'option');
                if ($on_article === 'yes') {
                    echo do_shortcode('[scriptless]');
                }
                ?>
    </div>
</div> <br> 
            <?php endwhile; endif; ?>
        </div>



        <div class="col-md-4 d-none d-md-block">
        <?php
        $sidebartogglesingle = get_field('show_sidebar_single', 'option');
        if ($sidebartogglesingle === "yes") {;?>
  
            <div class="sidebar">
                
                <h3 class="widget-title">You may also like</h3>
                <?php
                // Reusing $related_posts variable name
                $related_posts = new WP_Query(array(
                    'posts_per_page' => 3, // Number of related posts to display
                    'post__not_in' => array(get_the_ID()), // Exclude current post
                    'orderby' => 'rand' // Order by random
                ));

                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post();
                ?>



<div class="related-post">
    <div class="row related-sidebar p-2">
        <div class="col-12 col-lg-5 mb-2 sidebar-meta">
            <div class="sidebar-image-container">
                <a href="<?php the_permalink(); ?>">
                    <img class="sidebar-image img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="Image">
                </a>
            </div>
        </div>
        <div class="col-12 col-lg-7 mb-2">
            <section class="sidebar-title">
                <h6><strong><a href="<?php the_permalink(); ?>" class="sidebar-title"><?php the_title(); ?></a></strong></h6>
            </section>
            <div class="sidebar-meta">
                <p class="text-muted sidebar-excerpt"><i><?php echo wp_trim_words(get_the_excerpt(), 5); ?></i></p>
                <p class="sidebar-author">
                    <?php echo get_the_date(); ?><br> By <?php echo $author_name; ?>
                </p>
            </div>
        </div>
        <div class="col-12">
            <a class="sidebar-readmore btn btn" href="<?php the_permalink(); ?>" target="_blank">Read More</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="related-horizontal-line"></section>
        </div>
    </div>
</div>





                <?php
                    endwhile;
                    wp_reset_postdata(); // Reset the post data
                endif;
                ?>
            </div>

            <!-- Ad block middle -->
            <div class="sidebar-ad-container-middle mt-4 mb-2">
                <div class="ad-label">
                    <p>Advertisement</p>
                </div>
                <div class="sidebar-mpu-middle">
                <?php 
                $sidebar_mpu_top = get_field('sidebar_mpu_top_body_script', 'option');
                echo $sidebar_mpu_top;
                ?>





                </div>
            </div>
            <!-- End Ad block middle -->

            <!-- Another block of related posts -->
            
            <div class="sidebar">
                <h3 class="widget-title">You may also like</h3>
                <?php
                // Reusing $related_posts variable name
                $related_posts = new WP_Query(array(
                    'posts_per_page' => 3, // Number of related posts to display
                    'post__not_in' => array(get_the_ID()), // Exclude current post
                    'orderby' => 'rand' // Order by random
                ));

                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post();
                ?>
<div class="related-post">
    <div class="row related-sidebar p-2">
        <div class="col-12 col-lg-5 mb-2 sidebar-meta">
            <div class="sidebar-image-container">
                <a href="<?php the_permalink(); ?>">
                    <img class="sidebar-image img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="Image">
                </a>
            </div>
        </div>
        <div class="col-12 col-lg-7 mb-2">
            <section class="sidebar-title">
                <h6><strong><a href="<?php the_permalink(); ?>" class="sidebar-title"><?php the_title(); ?></a></strong></h6>
            </section>
            <div class="sidebar-meta">
                <p class="text-muted sidebar-excerpt"><i><?php echo wp_trim_words(get_the_excerpt(), 5); ?></i></p>
                <p class="sidebar-author">
                    <?php echo get_the_date(); ?><br> By <?php echo $author_name; ?>
                </p>
            </div>
        </div>
        <div class="col-12">
            <a class="sidebar-readmore btn btn" href="<?php the_permalink(); ?>" target="_blank">Read More</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="related-horizontal-line"></section>
        </div>
    </div>
</div>



                <?php
                    endwhile;
                    wp_reset_postdata(); // Reset the post data
                endif;
                ?>
            </div>

            <!-- End Another block of related posts -->

<!-- Ad block middle -->
<div class="sidebar-ad-container-bottom mt-4 mb-2">
    <div class="ad-label">
        <p>Advertisement</p>
    </div>
    <div class="sidebar-mpu-bottom">
   
    <?php 
    $sidebar_mpu_bottom = get_field('sidebar_mpu_bottom_body_script', 'option');
    echo $sidebar_mpu_bottom ;
    ?>

    </div>
</div>
<!-- End Ad block middle -->

<?php  }        ?>

        </div>

    </div>
</div>

<?php get_footer(); ?>
