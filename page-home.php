<?php
/**
 * Template Name: Home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package emk_theme
 */

get_header();
?>


<?php
    $query = new WP_Query(array(
        'post_type' => 'works',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
    ));
    
    
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $eventTitle = get_the_title();
        $isFeatured = get_field('is_featured',$post_id);
        $workType = get_field('work_type',$post_id);
        // $fullDate = get_field("event_date",$post_id);
        // $dateArr = explode(',', $fullDate);
        // $eventTime = get_field("event_time",$post_id);
        // $eventUrl = get_permalink( $post_id );
        // $eventLocation = get_field("event_location",$post_id);
        if($isFeatured){
            echo '<h1>'.$workType.'</h1>';
        }
        
    }
?>


<?php
get_footer();

?>