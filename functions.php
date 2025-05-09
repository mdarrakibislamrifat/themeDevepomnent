<?php 
/*
* My Theme functions and definitions
*/

// Theme Title
add_theme_support('title-tag');

//  Theme CSS and jQuery File calling
function rifat_css_js_file_calling(){
    wp_enqueue_style('rifat-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri() . './css/bootstrap.css', array(), 'v1.0', 'all');
    wp_register_style('custom', get_template_directory_uri() . './css/custom.css', array(), 'v1.0', 'all');
    wp_enqueue_style("bootstrap");
    wp_enqueue_style("custom");

    // jQuery

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap' ,get_template_directory_uri(  ).'/js/bootstrap.js',array(),'true');
    wp_enqueue_script( 'main' ,get_template_directory_uri(  ).'/js/main.js',array(),'true');
    
}

add_action('wp_enqueue_scripts', 'rifat_css_js_file_calling' );




// Theme function
function rifat_customization_register($wp_customize){
    $wp_customize->add_section('rifat_header_area',array(
        'title'=>__('Header Area','wordpresslearning'),
        'description'=>'If you interested to update your header area you can do it here'
    )); 


    $wp_customize->add_setting('rifat_logo',array(
        'default'=>get_bloginfo('template_directory' ).'/img/images.jpg'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,'rifat_logo',array(
            'label'=>'Logo Uplad',
            'description'=>'If you interested to update your header area you can do it here',
            'setting'=> 'rifat_logo',
            'section'=>'rifat_header_area'
        )
    ));


}

add_action('customize_register','rifat_customization_register');