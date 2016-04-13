<?php
/**
 * Contents of the [flashback-vertical] shortcode.
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
if ( $query->have_posts() ) {
?>

<section id="flb-timeline" class="flb-container">

<?php
while ( $query->have_posts() ) : $query->the_post();
	$date = strtotime( get_field( 'date' ) );
?>

	<div class="flb-timeline-block">
		<div class="flb-timeline-img flb-picture">
			<?php the_field( 'icon' ); ?>
		</div>

		<div class="flb-timeline-content">
			<h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
			<a href="<?php the_permalink(); ?>" class="flb-read-more">Read more</a>
			<span class="flb-date"><?php echo date( 'F jS, Y', $date ); ?></span>
		</div>
	</div>

<?php
endwhile; ?>
</section>
<?php
}
