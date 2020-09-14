<?php
if ( ! function_exists( 'engitech_footer_builder' ) ) {
    function engitech_footer_builder (){
        $footer_builder = '';    

        if ( is_page() ) {
            if ( function_exists('rwmb_meta') ) {
                global $wp_query;
                $metabox_fb = rwmb_meta( 'select_footer', 'field_type=select_advanced', $wp_query->get_queried_object_id() ); 
                if ($metabox_fb != '') {
                    $footer_builder = $metabox_fb;
                }else{
                    $footer_builder = engitech_get_option('footer_layout');
                }
            } 
        }else{
            $footer_builder = engitech_get_option('footer_layout');
        }

        if( !$footer_builder ) {
            return;
        }else{
            if ( did_action( 'elementor/loaded' ) ) {               
                echo \Elementor\Plugin::$instance->frontend->get_builder_content( $footer_builder ); 
            }
        }
    }
}