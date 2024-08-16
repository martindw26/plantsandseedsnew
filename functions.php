<?php

// Load style sheets
function load_css() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap'); 

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('main'); 
}
add_action('wp_enqueue_scripts', 'load_css');

// Load Scripts
function load_js() {
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap'); 
}
add_action('wp_enqueue_scripts', 'load_js');

// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Menus
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu')
        )
    );
}
add_action('init', 'register_my_menus');

// Enqueue Dashicons
function enqueue_dashicons() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'enqueue_dashicons');

/* ------------------------------------------------
   *  Excerpt limit
--------------------------------------------------- */
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

// Advanced Custom Fields Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'      => 'Site Debugging',
        'menu_slug'       => 'debug',
        'menu_title'      => 'Site Debugging',
        'capability'      => 'edit_posts',
        'position'        => 4,
        'parent_slug'     => '',
        'icon_url'        => 'dashicons-admin-tools',
        'redirect'        => true,
        'post_id'         => 'options',
        'autoload'        => false,
        'update_button'   => 'Debugging Updated',
        'updated_message' => 'Debugging option Updated',
        'active'          => true,
    ));
}

// Custom Image Sizes
function custom_image_sizes() {
    add_image_size('post-featured-image', 9999, 9999, true); 
}
add_action('after_setup_theme', 'custom_image_sizes');

// Register Custom Block Category
function custom_register_block_category($categories, $post) {
    return array_merge(
        array(
            array(
                'slug'  => 'custom-blocks',
                'title' => __('Custom Blocks', 'technologie'),
                'icon'  => 'admin-generic',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'custom_register_block_category', 10, 2);

/* Duplicate posts */
function rd_duplicate_post_as_draft() {
    global $wpdb;

    if (! (isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('No post to duplicate has been supplied!');
    }

    // Nonce verification
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__))) {
        return;
    }

    // Get the original post id
    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));

    // Get original post data
    $post = get_post($post_id);
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    if (isset($post) && $post != null) {
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title . ' (Copy)',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );

        // Insert the post by wp_insert_post() function
        $new_post_id = wp_insert_post($args);

        // Get all current post terms and set them to the new post draft
        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        // Duplicate all post meta
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos) != 0) {
            $sql_query_sel = [];
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if ($meta_key == '_wp_old_slug') continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }

        // Redirect to the edit post screen for the new draft
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');

function rd_duplicate_post_link($actions, $post) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

/* Adds post publish status to posts edit page */
// Add custom column to posts list
function add_custom_post_status_column($columns) {
    $columns['post_status'] = __('Status');
    return $columns;
}
add_filter('manage_posts_columns', 'add_custom_post_status_column');

// Populate custom column with post status
function display_custom_post_status_column($column, $post_id) {
    if ($column == 'post_status') {
        $post_status = get_post_status($post_id);
        echo ucfirst($post_status); // Capitalize the first letter for better readability
    }
}
add_action('manage_posts_custom_column', 'display_custom_post_status_column', 10, 2);

// Make the custom post status column sortable
function make_custom_post_status_column_sortable($columns) {
    $columns['post_status'] = 'post_status';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'make_custom_post_status_column_sortable');
