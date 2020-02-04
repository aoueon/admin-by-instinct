<?php
/**
 * Plugin Name: Admin by instinct
 * -Plugin URI: https://aniomalia.com/plugins/admin-by-instinct/
 * Author: Aniomalia
 * Author URI: https://aniomalia.com/
 * Description: Information and tools that can improve your WordPress site administration.
 * Version: 1.0
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


/* Enqueue necessary assets */
function aniomalia_admin_assets() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'aniomalia-admin-style',  $plugin_url . 'css/style.css');
    wp_enqueue_script( 'aniomalia-admin-script',  $plugin_url . 'js/script.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'aniomalia_admin_assets' );


// Create settings page
function aniomalia_admin_settings_page_output() {
    ?>

    <div class="wrap">
        <h1>Admin by instinct</h1>
    </div>

    <?php
}
add_action('admin_menu', 'aniomalia_admin_settings_page');
function aniomalia_admin_settings_page(){
    add_menu_page( 'Admin by instinct', 'Admin by instinct', 'manage_options', 'admin-by-instinct', 'aniomalia_admin_settings_page_output' );
}


/* Find out which template is being used */
function aniomalia_admin_template() {
    global $wp_admin_bar;
    global $template;

    $template_slug = array_pop(explode('/', $template));

    $wp_admin_bar->add_menu( array(
        'id' => 'aniomalia-identify-template-rendered',
        'parent' => 'top-secondary',
        'title' => '<p>Template: <code>' . $template_slug . '</code></p>'
    ) );
}
add_action( 'admin_bar_menu', 'aniomalia_admin_template' );