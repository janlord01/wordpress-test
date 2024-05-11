<?php
/*
Template Name: Products
*/

get_header();

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);

$products_query = new WP_Query( $args );

if ( $products_query->have_posts() ) :
    while ( $products_query->have_posts() ) : $products_query->the_post();
        echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
        echo '<div>' . get_the_content() . '</div>';
        echo '<p>Price: ' . get_post_meta( get_the_ID(), 'price', true ) . '</p>';
        echo '<p>SKU: ' . get_post_meta( get_the_ID(), 'sku', true ) . '</p>';
        echo '<p>Brand: ' . get_the_term_list( get_the_ID(), 'brand' ) . '</p>';
        echo '<p>Categories: ' . get_the_term_list( get_the_ID(), 'product_category' ) . '</p>';
        if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        }
    endwhile;
else :
    echo 'No products found.';
endif;

get_footer();
?>
