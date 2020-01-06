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

    create_work_page();

    function create_work_page(){
        
        echo '<div class="full-col column title-row">';
            echo '<h1 class="page-title">'.get_the_title().'</h1>';
        echo '</div>';
        echo '<div class="col-35 column work-desc">';
            get_work_description();
        echo '</div>';
        echo '<div class="col-65 column work-content">';
            get_work_content();
        echo '</div>';

    };


    function get_work_description(){
        the_post();
        echo '<div class="desc-content">';
            the_content();
        echo '</div>';
        
    }

    function get_work_content(){
        // if( have_rows('project_images') ):

        //    while ( have_rows('project_images') ) : the_row();
       
        //        $imageCaption = get_sub_field('image_caption');
        //        $imageUrl = get_sub_field('image_url');

        //        echo '<img src="' . $imageUrl .'" alt="">';
        //        echo $imageCaption;
       
        //    endwhile;

        // endif;


        $imageGallery = get_field("image_gallery");
        if ($imageGallery){
            foreach($imageGallery as $imageArr){
                echo '<div class="work-wrap">';
                echo '<img src="' . $imageArr['url'] .'" alt="">';
                echo '<div class="img-caption"><p>' . $imageArr['caption'] .'</p></div>';
                echo '</div>';
            }
            
        }

    }



    get_footer();
?>

