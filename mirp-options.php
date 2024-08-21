<?php

/**
 *
 * MIRP Options
 * @package mirp
 */

defined('ABSPATH') || die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mirp_plugin_options');

/**
 * Register MIRP Options
 */
function mirp_plugin_options()
{
    Container::make('theme_options', 'MIRP Options')
        ->add_fields([

            //Label Related Posts which is default is "Baca Juga".
            Field::make('text', 'mirp_label', 'Label Related Posts')
                ->set_default_value('Baca Juga')
                ->set_help_text('Label for related posts.'),


            //Number related posts.
            Field::make('text', 'mirp_related_posts', 'Number of Related Posts')
                ->set_default_value('3')
                ->set_attribute('type', 'number')
                ->set_attribute('min', '1')
                ->set_attribute('max', '4')
                ->set_help_text('Number of related posts to display. Minimum 1, maximum 4.'),

            //After Paragraph.
            Field::make('text', 'mirp_after_paragraph', 'Insert After Paragraph')
                ->set_default_value('3, 5, 7')
                ->set_help_text('Insert related posts after the paragraph. Sesuaikan dengan jumlah post perpages diatas.'),

            //MIRP Styling.
            Field::make('separator', 'mirpsep', 'Style'),

            //Background Color.
            Field::make('color', 'mirp_bg_color', 'Background Color')
                ->set_default_value('#333')
                ->set_help_text('Background color for related posts.'),

            //Label Color.
            Field::make('color', 'mirp_label_color', 'Label Color')
                ->set_default_value('#f5f5f5')
                ->set_help_text('Label color for related posts.'),

            //Link Color.
            Field::make('color', 'mirp_link_color', 'Link Color')
                ->set_default_value('#99ce2f')
                ->set_help_text('Link color for related posts.'),
        ]);
}
