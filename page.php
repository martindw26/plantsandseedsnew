
<title><?php echo get_the_title(); ?></title>
<?php get_header(); ?>



<div class="container border border-1 bordder-bs-light-rgb">
  <div class="row">
    <div class="col-lg-8">
    <div class="container mt-2 mb-2 header-ad-slot">  
        <p> advert slot</p>
    </div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="container mb-2"><?php the_title(); ?></h1><hr class="text-secondary object-fit-fill">
        <p class="text-mute">31st January 2024 | By Martin WIlliams</p>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>
    <div class="col-lg-4 mt-2">
      <!-- Sidebar -->
      <div class="container mt-5">
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>
    </div>
  </div>
</div>





<?php get_footer(); ?>