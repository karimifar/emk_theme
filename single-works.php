<?php
/**
 * Template Post Type: works
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package emk_theme
 */
wp_enqueue_style( 'work-single', get_template_directory_uri() . "/css/work-single/work.css", array('emk_styles') );
wp_enqueue_script( 'work-scripts', get_template_directory_uri() . "/js/work-single/work.js", array('jquery'), null, true );

get_header();
?>



<?php
    get_footer();
?>

