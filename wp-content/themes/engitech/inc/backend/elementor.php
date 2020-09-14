<?php

// Load the theme's custom Widgets so that they appear in the Elementor element panel.
add_action( 'elementor/widgets/widgets_registered', 'engitech_register_elementor_widgets' );
function engitech_register_elementor_widgets() {
    // We check if the Elementor plugin has been installed / activated.
    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
        // Include Elementor Widget files here.
        
        // Remove this 2 require_once line below after completed the theme.
        require_once( get_template_directory() . '/inc/backend/elementor-widgets/ot-widget.php' );
    }
}

// Add a custom 'category_engitech' category for to the Elementor element panel so that our theme's widgets have their own category.
add_action( 'elementor/init', function() {
    \Elementor\Plugin::$instance->elements_manager->add_category( 
        'category_engitech',
        [
            'title' => __( 'Engitech', 'engitech' ),
            'icon' => 'fa fa-plug', //default icon
        ],
        1 // position
    );
});

function engitech_add_cpt_support() {
    
    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    //check if option DOESN'T exist in db
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'ot_portfolio', 'ot_service', 'ot_header_builders', 'ot_footer_builders' ]; //create array of our default supported post types
        update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
    }
    
    //if it DOES exist, but portfolio is NOT defined
    else if( ! in_array( array('ot_portfolio', 'ot_service', 'ot_header_builders', 'ot_footer_builders'), $cpt_support ) ) {
        $cpt_support[] = 'ot_portfolio'; //append to array
        $cpt_support[] = 'ot_service'; //append to array
        $cpt_support[] = 'ot_header_builders'; //append to array
        $cpt_support[] = 'ot_footer_builders'; //append to array
        update_option( 'elementor_cpt_support', $cpt_support ); //update database
    }
    
    //otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'after_switch_theme', 'engitech_add_cpt_support' );

// footer post type
add_action( 'init', 'engitech_create_footer_builder' ); 
function engitech_create_footer_builder() {
    register_post_type( 'ot_footer_builders',
        array(
            'labels' => array(
                'name' => 'Footer Builders',
                'singular_name' => 'Footer Builder',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Footer Builder',
                'edit' => 'Edit',
                'edit_item' => 'Edit Footer Builder',
                'new_item' => 'New Footer Builder',
                'view' => 'View',
                'view_item' => 'View Footer Builder',
                'search_items' => 'Search Footer Builders',
                'not_found' => 'No Footer Builders found',
                'not_found_in_trash' => 'No Footer Builders found in Trash',
                'parent' => 'Parent Footer Builder'
            ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'menu_position' => 60,
            'supports' => array( 'title', 'editor' ),
            'menu_icon' => 'dashicons-editor-kitchensink',
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'capability_type' => 'post'
        )
    );
}

/*Fix Elementor Pro*/
function engitech_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_all_core_location();

}
add_action( 'elementor/theme/register_locations', 'engitech_register_elementor_locations' );

/*Add options to main section*/
add_action('elementor/element/section/section_layout/after_section_start', function( $section, $args ) {

    $section->add_control(
        'layout_section',
        [
            'label' => __( 'Display Section', 'engitech' ),
            'type' => Elementor\Controls_Manager::CHOOSE,
            'default' => 'traditional',
            'options' => [
                'layout_block' => [
                    'title' => __( 'Default', 'engitech' ),
                    'icon' => 'eicon-editor-list-ul',
                ],
                'layout_inline' => [
                    'title' => __( 'Inline', 'engitech' ),
                    'icon' => 'eicon-ellipsis-h',
                ],
            ],
            'label_block' => false,
            'prefix_class' => 'ot-',
        ]
    );
    $section->add_responsive_control(
        'content_align',
        [
            'label' => __( 'Alignment', 'engitech' ),
            'type' => Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left'    => [
                    'title' => __( 'Left', 'engitech' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'engitech' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'engitech' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => __( 'Justified', 'engitech' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'prefix_class' => 'ot%s-align-',
            'default' => '',
            'condition' => [
                'layout_section'    => 'layout_inline'
            ],
        ]
    );

}, 10, 3 );