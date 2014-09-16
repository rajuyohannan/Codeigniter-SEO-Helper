<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SEO Helper
 *
 * Generates Meta tags for search engines optimizations, facebook, twitter and Google+
 *
 * @author		Elson Tan (elsodev.com, Twitter: @elsodev)
 */

/**
 * SEO General Meta Tags
 *
 * Generates general meta tags for description, twitter, facebook and google+
 * Using title, description and image link from config file as default
 *
 * @access  public
 * @param   array   enable/disable different meta by setting true/false
 * @param   string  Title
 * @param   string  Description (155 characters)
 * @param   string  Image URL
 * @param   string  Page URL
 */

if(! function_exists('meta_tags')){
    function meta_tags($enable = array('general' => true, 'og'=> true, 'twitter'=> true, 'robot'=> true), $title = '', $desc = '', $imgurl ='', $url = ''){
        $output = '';

        //uses default set in seo_config.php
        if($title == ''){
            $title = config_item('seo_title', 'seo_config');
        }
        if($desc == ''){
            $desc = config_item('seo_desc', 'seo_config');
        }
        if($imgurl == ''){
            $imgurl = config_item('seo_imgurl', 'seo_config');
        }
        if($url == ''){
            $url = base_url();
        }


        if($enable['general']){
            $output .= '<meta name="description" content="'.$desc.'" />';
        }
        if($enable['robot']){
            $output .= '<meta name="robots" content="index,follow"/>';

        } else {
            $output .= '<meta name="robots" content="index,noindex"/>';
        }


        //open graph
        if($enable['og']){
            $output .= '<meta property="og:title" content="'.$title.'"/>'
                .'<meta property="og:type" content="'.$desc.'"/>'
                .'<meta property="og:image" content="'.$imgurl.'"/>'
                .'<meta property="og:url" content="'.$url.'"/>';
        }

        //twitter card
        if($enable['twitter']){
            $output .= '<meta name="twitter:card" content="summary"/>'
                .'<meta name="twitter:title" content="'.$title.'"/>'
                .'<meta name="twitter:url" content="'.$url.'"/>'
                .'<meta name="twitter:description" content="'.$desc.'"/>'
                .'<meta name="twitter:image" content="'.$imgurl.'"/>';
        }

        echo $output;


    }
}