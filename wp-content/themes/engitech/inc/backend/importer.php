<?php
/**
 * Hooks for importer
 *
 * @package Engitech
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function engitech_importer() {
	return array(
		array(
			'name'       => 'Home 1',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home1.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'sliders'    => get_template_directory_uri().'/inc/backend/data/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 1',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 2',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home2.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'sliders'    => get_template_directory_uri().'/inc/backend/data/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 2',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 3',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home3.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'sliders'    => get_template_directory_uri().'/inc/backend/data/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 3',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 4',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home4.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'sliders'    => get_template_directory_uri().'/inc/backend/data/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 4',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 5',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home5.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/widgets.wie',
			'sliders'    => get_template_directory_uri().'/inc/backend/data/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 5',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
	);
}

add_filter( 'soo_demo_packages', 'engitech_importer', 30 );