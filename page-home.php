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
wp_enqueue_style( 'home-style-re', get_template_directory_uri() . "/css/home/home-re.css", array('emk_styles_re') );
wp_enqueue_script( 'home-scripts', get_template_directory_uri() . "/js/home/home.js", array('jquery'), null, true );


get_header();

create_home_page();

function create_home_page(){
    $typeArr= array();
    if( have_rows('type_carousel') ):

        while( have_rows('type_carousel') ) : the_row();
    
            $type = get_sub_field('type');
            array_push($typeArr, $type);
        endwhile;
    else :
    endif;
    $jsonArr = esc_attr(json_encode($typeArr, JSON_UNESCAPED_UNICODE));
    echo '<div id="works-wrap">';
        echo '<div id="intro-type" class="rainbow">';
            
            echo '<div id="typedtext">';
                // echo '<p>Howdy!</p>';
                echo '<h1>I\'m a <span class="txt-rotate" data-period="2000" data-rotate='."'". $jsonArr ."'".'></span></h1>';
            echo '</div>';
        echo '</div>';
        echo '<div id="works-img-wrap">';
            $query = new WP_Query(array(
                'post_type' => 'works',
                'post_status' => 'publish',
                'posts_per_page' => '-1',
            ));
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $thumbnail= get_the_post_thumbnail_url($post_id);
                $workType = get_field('work_type',$post_id);
                $title = get_the_title();
                $worlUrl = get_permalink( $post_id );
                $overlay = get_field('overlay_color', $post_id);

                echo '<div id=img-'.$post_id.' class="work-thumb-wrap nodisplay">';
                    echo '<img src='.$thumbnail.' alt="">';
                echo '</div>';
            }

        echo '</div>';
        echo '<div id="works-nav-wrap">';
            $query = new WP_Query(array(
                'post_type' => 'works',
                'post_status' => 'publish',
                'posts_per_page' => '-1',
            ));
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $thumbnail= get_the_post_thumbnail_url($post_id);
                $workType = get_field('work_type',$post_id);
                $title = get_the_title();
                $workUrl = get_permalink( $post_id );
                $overlay = get_field('overlay_color', $post_id);

                echo '<div class="work-nav" data-target=img-'.$post_id.'>';
                    echo '<a href='.$workUrl.'>';
                        echo '<h2>'.$title.'</h2>';
                        echo '<div class="work-nav-line rainbow-border"></div>';
                    echo '</a>';
                echo '</div>';
            }
        echo '</div>';
    echo '</div> <!--#works-wrap-->';


    echo '<div id="blog">';
        echo '<p class="sec-title"> Blog posts</p>';
        echo '<div id="blog-wrap">';
            get_blog_posts();
        echo '</div>';
        echo '<a href="./blog"><p class="readmore">Read More ></p></a>';
    echo '</div> <!--#blog-->';
    
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
        $isExternal = get_field('external', $post_id);
        $source = null;
        if($isExternal){
            $postUrl = get_field('external_url', $post_id);
            $source = get_field('source', $post_id);
            $tooltip_icon = get_template_directory_uri(). '/img/external_icon.svg';
        }else{
            $postUrl = get_permalink( $post_id );
        }
        $title = get_the_title();
        $date = get_the_date();
        $blurb = get_field('blurb',$post_id);
        
        $blurb_small = substr($blurb, 0, 120);
        echo '<div class="'.(($source)? 'blog-card tooltip" data-source="'.$source. '" data-icon="'. $tooltip_icon : 'blog-card') .'">';

            echo '<a target="_blank" href=' .$postUrl . '>';
            echo '<div class="blog-card-line rainbow-border"></div>';

            // echo '<div class="blog-card">';
            echo '<h3 class="rainbow-text">' . $title . (($source)? '<span class="source"> from '.$source.'</span>':"") .'<span class="date"><br>'.$date .'</span></h3>';
            echo '</a>';
        echo '</div>';
    }
}


get_footer();

?>