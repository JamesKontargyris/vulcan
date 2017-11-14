<?php

// Functions that query the database

function get_all_team_members() {

    global $post;

    $args = [
        'post_type' => 'teammember',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ];

    $team_members = get_posts($args);

    return $team_members;
}


function get_homepage_blocks() {

    global $post;

    $args = [
        'post_type' => 'homeblock',
        'post_status' => 'publish',
        'posts_per_page' => -1,
//        'meta_key' => 'last_name',
//        'orderby' => 'meta_value',
//        'order' => 'ASC',
    ];

    $blocks = new WP_Query($args);
    wp_reset_postdata();

    return $blocks;
}

function get_homepage_slides() {

    global $post;

    $args = [
        'post_type' => 'homeslide',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ];

    $slides = new WP_Query($args);
    wp_reset_postdata();

    return $slides;
}


function get_articles($articles_per_page) {

	global $post;
	//Protect against arbitrary paged values
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$args = [
		'post_type' => 'news',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $articles_per_page,
		'paged' => $paged,
	];

	$articles = new WP_Query($args);
	wp_reset_postdata();

	return $articles;
}

function get_articles_by_category($cat_id, $articles_per_page, $exclude_ids = [])
{
	global $post;
	//Protect against arbitrary paged values
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$args = [
		'post_type' => 'news',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $articles_per_page,
		'post__not_in' => $exclude_ids,
		'cat' => $cat_id,
		'paged' => $paged,
	];

	$articles = new WP_Query($args);
	wp_reset_postdata();

	return $articles;
}

function get_articles_by_tag($tag_id, $articles_per_page, $exclude_ids = [])
{
	global $post;
	//Protect against arbitrary paged values
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$args = [
		'post_type' => 'news',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $articles_per_page,
		'post__not_in' => $exclude_ids,
		'tag_id' => $tag_id,
		'paged' => $paged,
	];

	$articles = new WP_Query($args);
	wp_reset_postdata();

	return $articles;
}

function get_popular_articles($articles_per_page, $exclude_ids = [])
{
	global $post;

	$args = [
		'post_type' => 'news',
		'post_status' => 'publish',
		'orderby' => 'meta_value_num',
		'meta_key' => 'post_views_count',
		'order' => 'DESC',
		'posts_per_page' => $articles_per_page,
		'post__not_in' => $exclude_ids,
	];

	$articles = new WP_Query($args);
	wp_reset_postdata();

	return $articles;
}

function get_recent_articles_for_widget($count = 5)
{
	global $post;

	$args = [
		'post_type' => 'news',
		'post_status' => 'publish',
		'posts_per_page' => $count,
		'orderby' => 'date'
	];

	$articles = new WP_Query($args);
	wp_reset_postdata();

	return $articles;
}

function get_popular_articles_for_widget($count = 5)
{
	global $post;

	$args = [
		'post_type' => 'news',
		'post_status' => 'publish',
		'posts_per_page' => $count,
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num'
	];

	$articles = new WP_Query($args);
	wp_reset_postdata();

	return $articles;
}

function get_all_services() {

	global $post;

	$args = [
		'post_type' => 'service',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	];

	$services = new WP_Query($args);
	wp_reset_postdata();

	return $services;
}

function article_pagination($articles)
{
	global $wp_query;

	$orig_query = $wp_query; // fix for pagination to work
	$wp_query = $articles;

	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $articles->max_num_pages
	) );

	$wp_query = $orig_query; // fix for pagination to work
	wp_reset_postdata(); // reset the query

	return true;
}

/**
 * Allows Wordpress to sort by two meta values.
 * Add +0 to meta_value for numeric comparison.
 *
 * http://dotnordic.se/sorting-wordpress-posts-by-several-numeric-custom-fields/
 *
 * @param $orderby
 * @return string
 */
function orderby_two_meta_values($orderby) {
    return 'mt1.meta_value+0 DESC, mt2.meta_value ASC';
}