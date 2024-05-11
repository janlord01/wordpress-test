jQuery(document).ready(function($) {
    // Function to load products based on filter options
    function loadProducts(category, brand) {
        var data = {
            action: 'load_products',
            category: category,
            brand: brand
        };

        // AJAX request to load products
        $.get(ajaxurl, data, function(response) {
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
