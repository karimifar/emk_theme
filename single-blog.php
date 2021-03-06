<?php
/**
 * Template Post Type: blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package emk_theme
 */
    wp_enqueue_style( 'prism-css', get_template_directory_uri() . "/css/prism.css", array('emk_styles') );
    wp_enqueue_style( 'blog-single', get_template_directory_uri() . "/css/blog-single/blog.css", array('emk_styles') );
    wp_enqueue_script( 'prism-js', get_template_directory_uri() . "/js/prism.js", array('jquery'), null, true );
    wp_enqueue_script( 'work-scripts', get_template_directory_uri() . "/js/work-single/work.js", array('jquery'), null, true );

    get_header();

    create_blog_page();

    function create_blog_page(){

        echo '<div class="full-col column banner-wrap">';
            echo '<img src='.get_the_post_thumbnail_url().'>';
        echo '</div>';
        echo '<div class="col-65 column title-row">';
            echo '<div class="page-title">';
                echo '<h1>'.get_the_title().'</h1>';
                echo '<p>'. get_the_date('Y-m-d') . '</p>';
            echo '</div>';
            // echo '<div class="img-wrap"><img src='.get_the_post_thumbnail_url().'></div>';
        echo '</div>';
        echo '<div class="col-65 column blog-desc">';
            get_work_description();
        echo '</div>';
        echo '<div class="col-50 column blog-content">';
            get_blog_content();
        echo '</div>';

    };


    function get_work_description(){
        the_post();
        echo '<div class="desc-content">';
            the_content();
        echo '</div>';
        
    }

    function get_blog_content(){
        if( have_rows('blog_content') ):

            while ( have_rows('blog_content') ) : the_row();
                $contentType = get_sub_field('content_type');
                // echo '<h1>'. $contentType . '</h1>';
                switch ($contentType) {
                case 1:
                    $image = get_sub_field('image');
                    echo '<img class="content-element" src=' . $image['url'] . ' alt="">';
                    break;
                case 2:
                    $header = get_sub_field('header_text');
                    echo '<h1 class="content-element">'. $header . '</h1>';
                    break;
                case 3:
                    $body_paragraph = get_sub_field('body_text');
                    echo '<p class="content-element">'. $body_paragraph . '</p>';
                    break;
                case 4:
                    $html_code = get_sub_field('code');
                    echo '<div class="content-element">' . $html_code . '</div>';
                    break;
                case 5:
                    $code_block = get_sub_field('code');
                    $code_lang = get_sub_field('code_language');
                    echo '<div class="content-element"><pre><code class="language-' . $code_lang . '">' . $code_block . '</code></pre></div>';
                    break;
                }    
           endwhile;

        endif;


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

