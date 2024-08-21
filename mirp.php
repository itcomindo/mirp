<?php

/**
 *
 * Plugin Name: MM Inline Related Post (MIRP)
 * Plugin URI: https://budiharyono.id/
 * Description: Plugin untuk menampilkan related post di dalam konten secara otomatis.
 * Version: 1.0
 * Author: Budi Haryono
 * Author URI: https://budiharyono.id/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * @package mirp
 */

defined('ABSPATH') || die('No script kiddies please!');

/**
 * Check CF Loaded
 */
function mirp_call_carbon_fields()
{
    if (! class_exists('\Carbon_Fields\Carbon_Fields')) {
        require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
        \Carbon_Fields\Carbon_Fields::boot();
    }
}

/**
 * MCS CF Loaded
 */
function mirp_cf_loaded()
{
    if (! function_exists('carbon_fields_boot_plugin')) {
        mirp_call_carbon_fields();
    }
}
add_action('plugins_loaded', 'mirp_cf_loaded');

// Load Necessary Files.
require_once plugin_dir_path(__FILE__) . 'mirp-options.php';

/**
 *  Load mirp.css
 */
function mirp_enqueue_styles()
{
    wp_enqueue_style('mirp', plugin_dir_url(__FILE__) . 'mirp.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'mirp_enqueue_styles');




/**
 * Load Related Posts
 */
function mirp_loader($content)
{
    if (is_single()) {
        global $post;

        // Dapatkan kategori post saat ini
        $categories = wp_get_post_categories($post->ID);
        $post_perpage = carbon_get_theme_option('mirp_related_posts');

        if ($categories) {
            // Query untuk mendapatkan artikel terakhir dari kategori yang sama, tidak termasuk post saat ini.
            $args = array(
                'category__in' => $categories,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $post_perpage,
                'ignore_sticky_posts' => 1
            );
            $related_posts = get_posts($args);

            if ($related_posts) {
                $paragraphs = explode('</p>', $content);
                $total_paragraphs = count($paragraphs);

                // Posisi untuk menyisipkan related posts.
                $insert_positions = explode(',', carbon_get_theme_option('mirp_after_paragraph'));
                $related_post_index = 0;

                foreach ($insert_positions as $position) {
                    if ($related_post_index >= count($related_posts)) break;

                    if ($total_paragraphs >= $position) {
                        $related_post = $related_posts[$related_post_index];
                        $mirp_label = carbon_get_theme_option('mirp_label');
                        if ($mirp_label) {
                            $mirp_label = esc_html($mirp_label);
                        } else {
                            $mirp_label = 'Baca Juga';
                        }
                        $mirp_bg_color = carbon_get_theme_option('mirp_bg_color');
                        $mirp_label_color = carbon_get_theme_option('mirp_label_color');
                        $mirp_link_color = carbon_get_theme_option('mirp_link_color');

                        $related_content = '<p class="inrel-post" style="background-color:' . $mirp_bg_color . '"><span class="inrel-post-label" style="color:' . $mirp_label_color . '">' . $mirp_label . '</span> <a href="' . get_permalink($related_post->ID) . '" title="' . esc_attr($related_post->post_title) . '" style="color:' . $mirp_link_color . '">' . esc_html($related_post->post_title) . '</a> </p>';
                        $paragraphs[$position - 1] .= $related_content;
                        $related_post_index++;
                    }
                }

                // Jika belum semua related post disisipkan, tambahkan ke paragraph terakhir.
                while ($related_post_index < count($related_posts)) {
                    $mirp_bg_color = carbon_get_theme_option('mirp_bg_color');
                    $mirp_label_color = carbon_get_theme_option('mirp_label_color');
                    $mirp_link_color = carbon_get_theme_option('mirp_link_color');

                    $related_post = $related_posts[$related_post_index];
                    $related_content = '<p class="inrel-post" style="background-color:' . $mirp_bg_color . '"><span class="inrel-post-label" style="' . $mirp_label_color . '">' . $mirp_label . '</span> <a href="' . get_permalink($related_post->ID) . '" title="' . esc_attr($related_post->post_title) . '" style="color:' . $mirp_link_color . '">' . esc_html($related_post->post_title) . '</a> </p>';
                    $paragraphs[$total_paragraphs - 1] .= $related_content;
                    $related_post_index++;
                }

                // Gabungkan kembali konten dengan related post yang disisipkan.
                $content = implode('</p>', $paragraphs);
            }
        }
    }

    return $content;
}

add_filter('the_content', 'mirp_loader');
