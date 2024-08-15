<?php get_header(); 

/*
Template Name: Sidebar
*/

?>



    <div class="col-md-8">


    <!-- SEO text-->
    
    <h3 class="featured-block-title">Featured</h3>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="">
                <?php 
                $column1_query = new WP_Query(array(
                    'posts_per_page' => 1,
                    'post__in' => array(1296,1283),
                    'orderby' => 'rand' // Order by random
                ));
                if ($column1_query->have_posts()) :
                    while ($column1_query->have_posts()) : $column1_query->the_post();
                ?>
<div class="archive-post-container">
    <div class="row archive">
        

    <div class="col">
      <div class="position-relative">
      <?php if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>"><img class="featured-post-image" src="<?php the_post_thumbnail_url(); ?>" alt="Image"></a>
            <?php endif; ?>
        <div class="featured-post-overlay">
          <h4><a href="<?php the_permalink(); ?>" class="text-white mt-2"><?php the_title(); ?></a></h4>
        </div>
      </div>
    </div>

    </div>
</div>

                <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata();?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>




    <h3 class="featured-block-title mt-2">Seasonal</h3>
        <!-- SEO text-->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="">
                <?php 
                $column1_query = new WP_Query(array(
                    'posts_per_page' => 2 // Number of posts to display
                ));
                if ($column1_query->have_posts()) :
                    while ($column1_query->have_posts()) : $column1_query->the_post();
                ?>
                <div class="archive-post-container">
                <div class="row archive">
                    <div class="col-lg-6 mb-2 mt-2">
                        <div class="archive-image-container">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>"><img class="archive-image-roll" src="<?php the_post_thumbnail_url(); ?>" alt="Image"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2 mt-2">
                        <h4 class="archive-title"><a href="<?php the_permalink(); ?>" class="archive-title mt-2"><?php the_title(); ?></a></h4>
                        <div class="archive-meta">
                            <p><i>
                            <?php echo excerpt(15);?>
                            </i>
                                <a style="text-decoration: none; color:darkcyan" href="<?php the_permalink(); ?>" class="read-more">...[Read more...]</a></p>
                            <?php
                            $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                            ?>
                            <p class="text-muted"><?php echo get_the_date(); ?> | By <?php echo $author_name; ?></p>
                            
                        </div>
                    </div>
                </div>

            </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata();?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>



        <h3 class="featured-block-title mt-2">Pests</h3>
        <!-- SEO text-->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="">
                <?php 
                $column1_query = new WP_Query(array(
                    'posts_per_page' => 2 // Number of posts to display
                ));
                if ($column1_query->have_posts()) :
                    while ($column1_query->have_posts()) : $column1_query->the_post();
                ?>
                <div class="archive-post-container">
                <div class="row archive">
                    <div class="col-lg-6 mb-2 mt-2">
                        <div class="archive-image-container">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>"><img class="archive-image-roll" src="<?php the_post_thumbnail_url(); ?>" alt="Image"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2 mt-2">
                        <h4 class="archive-title"><a href="<?php the_permalink(); ?>" class="archive-title mt-2"><?php the_title(); ?></a></h4>
                        <div class="archive-meta">
                            <p><i>
                            <?php echo excerpt(15);?>
                            </i>
                                <a style="text-decoration: none; color:darkcyan" href="<?php the_permalink(); ?>" class="read-more">...[Read more...]</a></p>
                            <?php
                            $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                            ?>
                            <p class="text-muted"><?php echo get_the_date(); ?> | By <?php echo $author_name; ?></p>
                            
                        </div>
                    </div>
                </div>

            </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata();?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>


        <h3 class="featured-block-title mt-2">Seeds</h3>
        <!-- SEO text-->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="">
                <?php 
                $column1_query = new WP_Query(array(
                    'posts_per_page' => 2 // Number of posts to display
                ));
                if ($column1_query->have_posts()) :
                    while ($column1_query->have_posts()) : $column1_query->the_post();
                ?>
                <div class="archive-post-container">
                <div class="row archive">
                    <div class="col-lg-6 mb-2 mt-2">
                        <div class="archive-image-container">
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>"><img class="archive-image-roll" src="<?php the_post_thumbnail_url(); ?>" alt="Image"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2 mt-2">
                        <h4 class="archive-title"><a href="<?php the_permalink(); ?>" class="archive-title mt-2"><?php the_title(); ?></a></h4>
                        <div class="archive-meta">
                            <p><i>
                            <?php echo excerpt(15);?>
                            </i>
                                <a style="text-decoration: none; color:darkcyan" href="<?php the_permalink(); ?>" class="read-more">...[Read more...]</a></p>
                            <?php
                            $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                            ?>
                            <p class="text-muted"><?php echo get_the_date(); ?> | By <?php echo $author_name; ?></p>
                            
                        </div>
                    </div>
                </div>
                <section class="archive-horizontal-line"></section>
            </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata();?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>




    </div>
    
          


    <div class="col-md-4 d-none d-md-block">
        <div class="sidebar">
            <h3 class="widget-title">You may also like</h3>
            <?php
           
            $related_posts = new WP_Query(array(
                'posts_per_page' => 3, // Number of related posts to display
                'post__not_in' => array(get_the_ID()), // Exclude current post
                'orderby' => 'rand' // Order by random
            ));

            if ($related_posts->have_posts()) :
                while ($related_posts->have_posts()) : $related_posts->the_post();
            ?>
                    <div class="related-post">
                        <div class="row related-sidebar">
                            <div class="col-lg-6 mb-2 sidebar-meta">
                                <div class="sidebar-image-container">
                                    <a href="<?php the_permalink(); ?>"><img class="archive-image-sidebar" src="<?php the_post_thumbnail_url(); ?>" alt="Image"></a>
                                </div>
                            </div>
                            <div class="col-lg mb-2">
                            <h6><a href="<?php the_permalink(); ?>" class="read-more-sidebar-title"><?php the_title(); ?></a></h6>
                                <div class="sidebar-meta">
                                <p class="text-muted sidebar-excerpt"><i><?php echo excerpt(10);?></i>
                                <a style="text-decoration: none; color:darkcyan" href="<?php the_permalink(); ?>" class="read-more">Read more</a></p>
                                <p class="sidebar-author"><?php
                                    $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                                    ?></p>
                                    <p class="text-muted"><?php echo get_the_date(); ?><br> By <?php echo $author_name; ?></p>
                                </div>
                            </div>
                        </div>
                        <section class="related-horizontal-line"></section>
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
                <!-- Your advertisement code goes here -->
            </div>
        </div>
        <!-- End Ad block middle -->

        <!-- Another block of related posts -->
        <div class="sidebar">
            <h3 class="widget-title">You may also like</h3>
            <?php
           
            $related_posts = new WP_Query(array(
                'posts_per_page' => 3, // Number of related posts to display
                'post__not_in' => array(get_the_ID()), // Exclude current post
                'orderby' => 'rand' // Order by random
            ));

            if ($related_posts->have_posts()) :
                while ($related_posts->have_posts()) : $related_posts->the_post();
            ?>
                  <div class="related-post">
                        <div class="row related-sidebar">
                            <div class="col-lg-6 mb-2 sidebar-meta">
                                <div class="sidebar-image-container">
                                    <a href="<?php the_permalink(); ?>"><img class="archive-image-sidebar" src="<?php the_post_thumbnail_url(); ?>" alt="Image"></a>
                                </div>
                            </div>
                            <div class="col-lg mb-2">
                            <h6><a href="<?php the_permalink(); ?>" class="read-more-sidebar-title"><?php the_title(); ?></a></h6>
                                <div class="sidebar-meta">
                                <p class="text-muted sidebar-excerpt"><i><?php echo excerpt(10);?></i>
                                <a style="text-decoration: none; color:darkcyan" href="<?php the_permalink(); ?>" class="read-more">Read more</a></p>
                                <p class="sidebar-author"><?php
                                    $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                                    ?></p>
                                    <p class="text-muted"><?php echo get_the_date(); ?><br> By <?php echo $author_name; ?></p>
                                </div>
                            </div>
                        </div>
                        <section class="related-horizontal-line"></section>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata(); // Reset the post data
            endif;
            ?>
        </div>
        <!-- End Another block of related posts -->

         <!-- Ad block bottom-->    
         <div class="sidebar-ad-container-bottom mt-4 mb-2">
            <div class="ad-label">
                <p>Advertisement</p>
            </div>
            <div class="sidebar-mpu-bottom">
                <!-- Your advertisement code goes here -->
            </div>
        </div>
        <!-- End Ad block bottom -->

    </div>


<?php get_footer(); ?>
