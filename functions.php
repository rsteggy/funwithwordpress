<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'SIMPLE_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
	array(
		'primary'	=>	__( 'Primary Menu', 'simple' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu,
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function simple_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'simple-sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Main sidebar', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3>',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar,
		// just change the values of id and name to another word/name
	));
}
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'simple_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function simple_scripts()  {
	// get the theme directory style.css and link to it in the header

	wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Merriweather:400italic,400,900,300italic', false, SIMPLE_VERSION, 'all');

	wp_enqueue_style('formstone-grid', get_template_directory_uri() . '/components/formstone/dist/css/grid.css', false, SIMPLE_VERSION, 'all' );

	wp_enqueue_style( 'simple-main', get_template_directory_uri() . '/css/main.css', false, SIMPLE_VERSION, 'all' );
	// add fitvid
	wp_enqueue_script( 'simple-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), SIMPLE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'simple_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header