<?php
/**
 * @Packge     : Fitness
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

// enqueue css
function sierra_common_custom_css() {
    wp_enqueue_style( 'sierra-common', get_template_directory_uri() . '/assets/css/overrides.css' );

    $accent_color    = esc_attr( sierra_opt( 'epsilon_accent_color', '#6ebdfe' ) );
    $accent_color2   = esc_attr( sierra_opt( 'epsilon_accent_color_second', '9b8aff' ) );

    $title_color     = esc_attr( sierra_opt( 'epsilon_title_color', '#1a171c' ) );
    $textColor       = esc_attr( sierra_opt( 'epsilon_text_color', '#777777' ) );
    $widgettitle     = esc_attr( sierra_opt( 'epsilon_widgettitle_color', '#0b1033' ) );
    $linkColor       = esc_attr( sierra_opt( 'epsilon_link_color', '#0385d0' ) );
    $linkHoverColor  = esc_attr( sierra_opt( 'epsilon_link_hover_color', '#a1083a' ) );
    $headerBgColor   = esc_attr( sierra_opt( 'epsilon_header_background', '#fff' ) );
    $dropdownMenuBg  = esc_attr( sierra_opt( 'epsilon_dropdown_menu_background', '#a1083a' ) );
    $dropMenuHoverC  = esc_attr( sierra_opt( 'epsilon_dropdown_menu_hover_color', '#97ccfe' ) );
    $menuItemColor   = esc_attr( sierra_opt( 'epsilon_menu_item_color', '#fff' ) );
    $menuHoverColor  = esc_attr( sierra_opt( 'epsilon_menu_item_hover_color', '#0b1033' ) );
    $menuActiveColor = esc_attr( sierra_opt( 'epsilon_menu_item_active_color', '#0385d0' ) );
    $footerBg        = esc_attr( sierra_opt( 'epsilon_footer_background', '#192229' ) );
    $footerTitleColor= esc_attr( sierra_opt( 'epsilon_footer_title_color', '#ffffff' ) );
    $footerTextColor = esc_attr( sierra_opt( 'epsilon_footer_text_color', '#a9afb1' ) );
    $footerLinkColor = esc_attr( sierra_opt( 'epsilon_footer_link_color', '#007bff' ) );
    $footerLinkHover = esc_attr( sierra_opt( 'epsilon_footer_link_hover_color', '#0056b3' ) );



    
    $customcss ="
        h1, h2, h3, h4, h5, h6,
        .c_title h2,
        .slider_text_box p,
        .feature_item h4,
        .l_title h2,
        .l_title h2,
        .banner_inner_text h2,
        .blog_text a h4{
            color: {$title_color};
        }
        
        .widget-title{
            color: {$widgettitle};
        }
        .banner_area{
            background-color: {$headerBgColor}
        }
        
        p,
        .feature_item p,
        .text_3d p,
        .team_people_text p,
        .touch_details p,
        .challange_text_inner p,
        .testimonials_slider .owl-item.center p,
        .left_company_text p,
        .blog_text p,
        .s_solution_item p{
            color: {$textColor};
        }
        
        .more_btn{
            color: {$linkColor};
        }
        
        .more_btn:hover{
            color: {$linkHoverColor};
        }
        .main_menu_area .navbar .navbar-nav li a{
            color: {$menuItemColor}
        }
        .main_menu_area .navbar .navbar-nav li:hover a{
            color: {$menuHoverColor}
        }
        .main_menu_area .navbar .navbar-nav li.active a{
            color: {$menuActiveColor}
        }
        
        .main_menu_area .navbar .navbar-nav li.submenu .dropdown-menu{
            background: {$dropdownMenuBg}
        }
        .main_menu_area .navbar .navbar-nav li.submenu .dropdown-menu li:hover a{
            color: {$dropMenuHoverC}
        }
        .f_title h3{
            color: {$footerTitleColor}
        }
        .f_about_widget p{
            color: {$footerTextColor}
        }
        .footer_copyright a{
            color: {$footerLinkColor}
        }
        .footer_copyright a:hover{
            color: {$footerLinkHover}
        }
        
        .service_feature .feature_inner .feature_item .more_btn{
            background-image: -webkit-gradient(linear, left top, right top, from({$accent_color}), to({$accent_color2}));
            background-image: -webkit-linear-gradient(left, {$accent_color}, {$accent_color2});
            background-image: -o-linear-gradient(left, {$accent_color}, {$accent_color2});
            background-image: linear-gradient(left, {$accent_color}, {$accent_color2});
        }
        .our_skill_inner .single_skill .progress .progress-bar,
        .contact_us_form .form-group input:focus,
        .wpcf7-form .wpcf7-form-control-wrap input:focus,
        .contact_us_form .form-group textarea:focus,
        .wpcf7-form .wpcf7-form-control-wrap textarea:focus {
            background-image: -moz-linear-gradient(0deg, {$accent_color} 0%, {$accent_color2} 100%);
            background-image: -webkit-linear-gradient(0deg, {$accent_color} 0%, {$accent_color2} 100%);
            background-image: -ms-linear-gradient(0deg, {$accent_color} 0%, {$accent_color2} 100%);
        }
        .our_skill_inner .single_skill .progress .progress-bar .progress_parcent,
        .talk_area,
        .tag_widget ul li:hover a, .tagcloud a:hover {
            background-image: -moz-linear-gradient(10deg, {$accent_color} 0%, {$accent_color2} 100%);
            background-image: -webkit-linear-gradient(10deg, {$accent_color} 0%, {$accent_color2} 100%);
            background-image: -ms-linear-gradient(10deg, {$accent_color} 0%, {$accent_color2} 100%);
        }
        .widget_search .input-group input{
            border-image: -moz-linear-gradient(180deg, {$accent_color2} 0%, {$accent_color} 100%);
            -webkit-border-image: -webkit-linear-gradient(180deg, {$accent_color2} 0%, {$accent_color} 100%);
            border-image: -webkit-linear-gradient(180deg, {$accent_color2} 0%, {$accent_color} 100%);
            border-image: -ms-linear-gradient(180deg, {$accent_color2} 0%, {$accent_color} 100%);
        }
        .bd-callout{
            
        }
        .more_btn {
            background-image: -webkit-gradient(linear, left top, right top, from({$accent_color}), color-stop(51%, {$accent_color2}), to({$accent_color}));
            background-image: -webkit-linear-gradient(left, {$accent_color} 0%, {$accent_color2} 51%, {$accent_color} 100%);
            background-image: -o-linear-gradient(left, {$accent_color} 0%, {$accent_color2} 51%, {$accent_color} 100%);
            background-image: linear-gradient(to right, {$accent_color} 0%, {$accent_color2} 51%, {$accent_color} 100%);
        }
        
        .blog_img .blog_date {
            background: -moz-linear-gradient(left, {$accent_color} 0%, {$accent_color2} 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(left, {$accent_color} 0%, {$accent_color2} 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: -webkit-gradient(linear, left top, right top, from({$accent_color}), to({$accent_color2}));
            background: -o-linear-gradient(left, {$accent_color} 0%, {$accent_color2} 100%);
            background: linear-gradient(to right, {$accent_color} 0%, {$accent_color2} 100%);
        }
        
        .solid_btn {
            background: {$accent_color}
        }
        .widget ul li:hover a{
            color: {$accent_color}
        }
        
        .footer_copyright{
            background: {$footerBg}
        }
        
    ";

    wp_add_inline_style( 'sierra-common', $customcss );

}
add_action( 'wp_enqueue_scripts', 'sierra_common_custom_css', 50 );