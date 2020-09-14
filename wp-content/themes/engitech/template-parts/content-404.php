<?php 
$error_builder = engitech_get_option('page_404');

if( !engitech_get_option('custom_404') ) { ?>
<div class="container">
    <div class="error-404 not-found text-center">
		<h2><img class="error-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/404-error.png" alt="404"></h2>
        <h1><?php wp_kses( _e( 'Sorry! Page Not Found!', 'engitech' ), wp_kses_allowed_html('post')  ); ?></h1>
        <div class="content-404">
            <p><?php wp_kses( _e( 'Oops! The page which you are looking for does not exist. Please return to the homepage.', 'engitech' ), wp_kses_allowed_html('post')  ); ?></p>
            <?php get_search_form(); ?>
            <a class="octf-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Take Me Home', 'engitech' ); ?></a>
        </div>
    </div>
</div>
<?php
}else{
	if ( did_action( 'elementor/loaded' ) ) {               
		echo \Elementor\Plugin::$instance->frontend->get_builder_content( $error_builder ); 
	}
}