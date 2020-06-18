<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$q = new WP_Query([
    
    'posts_per_page' => 12,
     get_query_var( 'taxonomy' ) => get_query_var( 'term' ),
    'paged' => $paged,

]);
$temp_query = $wp_query;
$wp_query = null;
$wp_query = $q;


if ( $q->have_posts() ) :
    while ( $q->have_posts() ) : $q->the_post();
        ?>        
        <div ><a href="<?=the_permalink()?>" target="_blank"><?=the_title()?></a></div>
        <?php 
    endwhile;
endif;

// Reset postdata
wp_reset_postdata();

// pagination goes here..

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;

?>

<?php get_footer(); ?>