<?php
/**
 * Template Name: Product Catalog Sidebar
 */

get_header();
?>

<aside id="product-catalog-sidebar">
    <!-- Filter Options -->
    <div class="filters">
        <label for="category-filter">Category:</label>
        <select id="category-filter" name="category">
            <option value="">All Categories</option>
            <?php
            $categories = get_terms( array( 'taxonomy' => 'product_category', 'hide_empty' => false ) );
            foreach ( $categories as $category ) :
                ?>
                <option value="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="brand-filter">Brand:</label>
        <select id="brand-filter" name="brand">
            <option value="">All Brands</option>
            <?php
            $brands = get_terms( array( 'taxonomy' => 'brand', 'hide_empty' => false ) );
            foreach ( $brands as $brand ) :
                ?>
                <option value="<?php echo esc_attr( $brand->slug ); ?>"><?php echo esc_html( $brand->name ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Product Grid -->
    <div id="product-grid"></div>
</aside>

<script>
    jQuery(document).ready(function($) {
        // Function to load products based on filter options
        function loadProducts(category, brand) {
            var data = {
                action: 'load_products',
                category: category,
                brand: brand
            };

            // AJAX request to load products
            $.get('<?php echo admin_url('admin-ajax.php'); ?>', data, function(response) {
                $('#product-grid').html(response);
            });
        }

        // Load products when page loads
        loadProducts('', '');

        // Event listener for filter options change
        $('#category-filter, #brand-filter').change(function() {
            var category = $('#category-filter').val();
            var brand = $('#brand-filter').val();
            loadProducts(category, brand);
        });
    });
</script>

<?php get_footer(); ?>
