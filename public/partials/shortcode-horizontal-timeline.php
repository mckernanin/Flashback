<?php
/**
 * Contents of the [flashback-horizontal] shortcode.
 *
 * @package Flashback
 */

	$atts = shortcode_atts( array(
		'type' 		=> 'flb_timeline_item',
		'order' 	=> 'DESC',
		'orderby' 	=> 'meta_value',
		'posts' 	=> 25,
	), $atts);

	$options = array(
		'post_type'      => $atts['type'],
		'order'          => $atts['order'],
		'orderby'        => $atts['orderby'],
		'posts_per_page' => $atts['posts'],
		'meta_key'       => 'date',
	);

	$query = new WP_Query( $options );

	echo '<pre>';
	var_dump( $query );
	echo '</pre>';
