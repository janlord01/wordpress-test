<?php
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        echo '<h1>' . get_the_title() . '</h1>';
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
    echo 'No product found.';
endif;

get_footer();
?>
