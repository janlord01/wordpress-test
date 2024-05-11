<?php
/**
 * Template Name: Product Catalog
 */

get_header();

// Query products
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
);
$products_query = new WP_Query( $args );

// Check if there are products
if ( $products_query->have_posts() ) :
    ?>

    <div class="product-catalog">

        <!-- Filter Options -->
        <div class="filters">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                <select name="product_category">
                    <option value="">All Categories</option>
                    <?php
                    $categories = get_terms( array( 'taxonomy' => 'product_category', 'hide_empty' => false ) );
                    foreach ( $categories as $category ) :
                        ?>
                        <option value="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="brand">
                    <option value="">All Brands</option>
                    <?php
                    $brands = get_terms( array( 'taxonomy' => 'brand', 'hide_empty' => false ) );
                    foreach ( $brands as $brand ) :
                        ?>
                        <option value="<?php echo esc_attr( $brand->slug ); ?>"><?php echo esc_html( $brand->name ); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Filter">
            </form>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            <?php while ( $products_query->have_posts() ) : $products_query->the_post(); ?>
                <div class="product">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo get_post_meta( get_the_ID(), 'price', true ); ?></p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

    </div><!-- .product-catalog -->

    <?php
    // Reset post data
    wp_reset_postdata();
else :
    // If no products found
    echo 'No products found.';
endif;

get_footer();
?>