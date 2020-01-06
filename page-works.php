<?php
/**
 * Template Name: Works page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package emk_theme
 */

wp_enqueue_style( 'works-style', get_template_directory_uri() . "/css/works/works.css", array('emk_styles') );
// wp_enqueue_script( 'home-scripts', get_template_directory_uri() . "/js/home/home.js", array('jquery'), null, true );


get_header();

create_works_page();

function create_works_page(){
    get_all_works();
}



function get_all_works(){
    echo '<div id="works-wrap">';
    $query = new WP_Query(array(
        'post_type' => 'works',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
    ));
    
    
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $isFeatured = get_field('is_featured',$post_id);
        
        $thumbnail= get_the_post_thumbnail_url($post_id);
        $workType = get_field('work_type',$post_id);
        $title = get_the_title();
        $worlUrl = get_permalink( $post_id );
        $overlay = get_field('overlay_color', $post_id);
        
        echo '<a href=' . $worlUrl . ' class="work-card">';
            echo '<div class="info">';
                echo '<div class="info-wrap">';
                    echo '<h2>'.$title.'</h2>';
                    echo '<p>' . $workType. '</p>';
                echo '</div>';
            echo '</div>';
            echo '<div class="thumbnail">';
                echo '<img src='. $thumbnail . ' alt="">';
            echo '</div>';
            // echo '<div class="overlay-solid" style="background:' . $overlay. ';"></div>';
            echo '<div class="overlay-grad"></div>';
        echo '</a>';

        wp_reset_query();
    };
    echo '</div>';
};




get_footer();
?>