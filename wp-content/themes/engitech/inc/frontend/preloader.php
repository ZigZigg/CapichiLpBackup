<?php

if( engitech_get_option('preload') != false ){

    function engitech_body_classes( $classes ) {

    	$classes[] = 'royal_preloader';

    	return $classes;        
    }
    add_filter( 'body_class', 'engitech_body_classes' );

    if( !function_exists('engitech_custom_frontend_scripts') ){
        function engitech_custom_frontend_scripts(){ ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";
            	//Preloader
    			Royal_Preloader.config({
    				mode           : 'logo',
    				logo           : '<?php echo engitech_get_option('preload_logo'); ?>',
    				logo_size      : [<?php echo engitech_get_option('preload_logo_width'); ?>, <?php echo engitech_get_option('preload_logo_height'); ?>],
    				showProgress   : true,
    				showPercentage : true,
    		        text_colour: '<?php echo engitech_get_option('preload_text_color'); ?>',
                    background:  '<?php echo engitech_get_option('preload_bgcolor'); ?>'
    			});
            })(jQuery);
        </script>  
    <?php        
        }
    }
    add_action('wp_footer', 'engitech_custom_frontend_scripts');

    function engitech_preload_scripts() {
    	wp_enqueue_style('engitech-preload', get_template_directory_uri().'/css/royal-preload.css');
    	wp_enqueue_script('engitech-royal-preloader', get_template_directory_uri()."/js/royal_preloader.min.js",array('jquery'), '1.0', false); 
    }
    add_action( 'wp_enqueue_scripts', 'engitech_preload_scripts' );

}