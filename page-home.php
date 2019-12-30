<?php
/**
 * Template Name: Home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package emk_theme
 */
wp_enqueue_style( 'home-style', get_template_directory_uri() . "/css/home/home.css", array('emk_styles') );
wp_enqueue_script( 'home-scripts', get_template_directory_uri() . "/js/home/home.js", array('jquery'), null, true );


get_header();

create_home_page();

function create_home_page(){
    echo '<div class="full-col"><div id="typedtext"></div></div>';
    echo '<div class="left-col column">';
        echo '<div class="col-title posts-title"><h3>Recent blog posts</h3></div>';
        get_blog_posts();
    echo '</div>';
    echo '<div class="right-col column" id="works-row">';
    echo '<div class="col-title works-title"><h3>featured projects</h3></div>';
        get_featured_works();
    echo '</div>';
}




function get_featured_works(){
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
        
        if($isFeatured){
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
                echo '<div class="overlay-solid" style="background:' . $overlay. ';"></div>';
                echo '<div class="overlay-grad"></div>';
			echo '</a>';

        };
        wp_reset_query();
    }
    echo '</div>';
}



function get_blog_posts(){
    $query = new WP_Query(array(
        'post_type' => 'blog',
        'post_status' => 'publish',
        'posts_per_page' => '5',
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $date = get_the_date();
        $postUrl = get_permalink( $post_id );
        $blurb = get_field('blurb',$post_id);
        echo '<a href=' .$postUrl . ' class="blog-card">';
        // echo '<div class="blog-card">';
        echo '<h2>' . $title . ' |<span> ' .$date .'</span></h2>';
        echo '<p>' . $blurb . '</p>';
        echo '</a>';
    }
}


get_footer();

?>