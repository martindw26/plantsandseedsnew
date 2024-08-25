<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$header_scripts = get_field('header_scripts', 'option');
echo $header_scripts;
?>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_the_title(); ?></title>    
    <?php wp_head();?>

<!-- Adtech -->

<?php  
// Get the AdTech header script from ACF options
$adtech_header_script = get_field('adtech_header_script', 'option');

// Get the ACF fields for ad slot paths
$incontent_mpu_header_path = get_field('incontent_mpu_header_path', 'option');
$sidebar_mpu_top_header_path = get_field('sidebar_mpu_top_header_path', 'option');
$sidebar_mpu_middle_header_path = get_field('sidebar_mpu_middle_header_path', 'option');
$sidebar_mpu_bottom_header_path = get_field('sidebar_mpu_bottom_header_path', 'option');
$leaderboard_ros_top_header_path = get_field('leaderboard_ros_top_header_path', 'option');
$leaderboard_hp_top_header_path = get_field('leaderboard_hp_top_header_path', 'option');
$leaderboard_hp_middle_header_path = get_field('leaderboard_hp_middle_header_path', 'option');
$leaderboard_hp_bottom_header_path = get_field('leaderboard_hp_bottom_header_path', 'option');

// Echo the AdTech header script
echo $adtech_header_script;
?>

<script>
window.googletag = window.googletag || {cmd: []};
googletag.cmd.push(function() {
    // Define ad slots using PHP variables
    googletag.defineSlot('<?php echo esc_js($incontent_mpu_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($sidebar_mpu_top_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($sidebar_mpu_middle_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($sidebar_mpu_bottom_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($leaderboard_ros_top_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($leaderboard_hp_top_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($leaderboard_hp_middle_header_path); ?>').addService(googletag.pubads());
    googletag.defineSlot('<?php echo esc_js($leaderboard_hp_bottom_header_path); ?>').addService(googletag.pubads());

    // Enable single request mode for faster ad loading
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
});
</script>










<?php
//Affilaites
$affiliate_scripts = get_field('affiliate_scripts', 'option');
echo $affiliate_scripts;
?>

</head>

<div class="container-fluid text-white" style="height:60px; padding-top:8px; background-color:black;">
    <div class="social_share_header">
                <?php
                $headersocialshare = get_field('headersocialshare', 'option');
                if ($headersocialshare === 'yes') {
                    echo do_shortcode('[scriptless]');
                }
                ?>
    </div>
</div>  

<header>

    <nav class="navbar navbar-expand-lg fs-4" style="background-color: white;">
        <div class="container">

            <?php 
            $site_logo = get_field('site_logo', 'option'); 
            $site_logo_url = get_field('site_logo_url', 'option'); 
            
            if ($site_logo) {
                echo '<a href="' . $site_logo_url . '"><div class="site-title"><img src="' . $site_logo . '"></div></a>';
            } else { 
                echo '<h1 class="site-title">Plants &amp; Seeds</h1>';
            }
            ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '%3$s',
                        'depth' => 2,
                        'walker' => new WP_Bootstrap_Navwalker()
                    ));
                    ?>
                </ul>
            </div>

            

        </div>
    </nav>
    
</header>


<?php 
if (is_page_template('front-page.php')) {
  $leaderboard_top_body_script = get_field('leaderboard_hp_top_header_script', 'option');
  $leaderboard_top_body_script_switch = get_field('leaderboard_top_body_script_switch', 'option');

  if ($leaderboard_top_body_script_switch === 'on') {
      echo '<section class="ad_header_top">';
      echo $leaderboard_top_body_script;
      echo '</section>';
  }
}
?>


<script>
    jQuery(document).ready(function($) {
        $('.dropdown-toggle').click(function(e) {
            e.preventDefault();
            $(this).parent().toggleClass('open');
            $(this).next('.dropdown-menu').toggleClass('show');
        });
    });
</script>




<div class="container">


<body>

