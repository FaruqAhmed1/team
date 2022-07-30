<?php
/*
Plugin Name: Team
Plugin URI: 
Description: Custom plugin
Version: 1.0
Author:Faruq
Author URI: 
License: GPLv2 or later
Text Domain: team-member
Domain Path: /languages/
*/

function team_load_textdomain() {
	load_plugin_textdomain( 'team', false, dirname( __FILE__ ) . "/languages" );
}

add_action( "plugins_loaded", 'team_load_textdomain' );


// custom post type for Team Member’
function team_custom_post_type() {
	register_post_type('team_member',
		array(
			'labels'	=> array(
				'name'          => esc_html__('Team Member', 'team'),
				'singular_name' => esc_html__('Team Member', 'team'),
				'description'	=> esc_html__( 'This post type is for the team section', 'team' ),


			),
			'public' 		=> true,
			'has_archive' 	=> true,
			'show_in_menu' 	=> true,
			'show_in_rest'	=> true,
			'menu_position' => 5,
			'menu_icon'		=> esc_html__( 'dashicons-table-row-after', 'team' ),
			'supports'		=> array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields'
			),
			'taxonomies'         => array( 'member-type', 'team_cats' ),
		)
	);

	    // categories for this custom post type
	register_taxonomy( 'team_cats', 'team_member', array(
		'label'        => esc_html__( 'Member Type', 'team' ),
		'rewrite'      => array( 'slug' => 'type' ),
		'hierarchical' => true,
		'public'	=> true,
		'show_in_rest' => true
	) );
}
add_action('init', 'team_custom_post_type');


// function team_member_shortcode( $attributes ) {

	// $default = array(
	// 	'type'=>'primary',
	// 	'title'=>__("Button",'philosophy'),
	// 	'url'=>'',
	// );

	// $button_attributes = shortcode_atts($default,$attributes);


	
	//  $args = array(
	// 	'post_type'=> 'team_member',
	// 	'post_status'=>'publish'

	// ) ;
	//  $the_query = new \WP_Query($args) ;
	// if ( $the_query->have_posts() ){
	// 	while ( $the_query->have_posts() ){

	// 		$the_query->the_post(); 
			
	// 		the_content();
	// 		the_post_thumbnail();

	// 	} 

	// }
	// wp_reset_postdata();
		



		

		// return;

    // return sprintf( '<a target="_blank" class="btn btn--%s full-width" href="%s">%s</a>',
    //     $button_attributes['type'],
    //     $button_attributes['url'],
    //     $button_attributes['title']
    // );
	// }

	// add_shortcode( 'team_members', 'team_member_shortcode' );
