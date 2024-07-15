<?php
/*
 * Plugin Name:       React Post Table
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Noman
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       react-post-table
 */

if (!defined('ABSPATH'))
    exit;


class React_Post_Table
{
    public function __construct()
    {
        add_action('init', [$this, 'init']);
    }

    public function init()
    {
        add_action('admin_menu', [$this, 'add_menu_page']);
        add_action( 'admin_enqueue_scripts', [ $this, 'react_post_assets'] );

    }
    public function add_menu_page()
    {
        add_menu_page(
            __('React Post', 'textdomain'),
            'React Post',
            'manage_options',
            'react-post',
            [$this, 'react_post_callback'],
            'dashicons-post-status',
            6
        );
    }
    public function react_post_callback(){
        ?>
            <h1>WordPress With React</h1>
            <div id="post-data"></div>
        <?php
    }

    /**
     * Enqueue scripts and styles.
     *
     * @return void
     */
    function react_post_assets( $admin_page ) {

        if ( 'toplevel_page_react-post' !== $admin_page ) {
            return;
        }

        $asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

        if ( ! file_exists( $asset_file ) ) {
            return;
        }

        $asset = include $asset_file;
// wp_enqueue_style( 'wp-components' );

        wp_enqueue_style( 'reactpost-style', plugin_dir_url( __FILE__ ) . 'build/index.css' );
        wp_enqueue_script( 'reactpost-script', plugin_dir_url( __FILE__ ) . 'build/index.js', $asset['dependencies'], '1.0.0', true );
    }
}
new React_Post_Table();
