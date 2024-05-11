<?php
/*
Plugin Name: Theme Layout Control
Description: Control the layout width and background color of your theme.
*/
// Add settings page to admin panel
// Add settings page to admin panel
function theme_layout_control_settings_page() {
    ?>
    <div class="wrap">
        <h2>Theme Layout Control</h2>
        <div class="collapsible">
            <h3>Theme Settings</h3>
            <div class="content">
                <form method="post" action="options.php">
                    <?php settings_fields( 'theme-layout-control-settings' ); ?>
                    <?php do_settings_sections( 'theme-layout-control-settings' ); ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Layout Width</th>
                            <td>
                                <input type="range" min="500" max="1600" value="<?php echo esc_attr( get_option('layout_width', '1000') ); ?>" name="layout_width" id="layout-width">
                                <br>
                                <label for="layout-width">500</label> <label for="layout-width">1600</label>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Background Color</th>
                            <td>
                                <label><input type="radio" name="background_color" value="White" <?php checked( get_option('background_color'), 'White' ); ?>> White </label><br>
                                <label><input type="radio" name="background_color" value="Light Grey" <?php checked( get_option('background_color'), 'Light Grey' ); ?>> Light Grey</label><br>
                                <label><input type="radio" name="background_color" value="Grey" <?php checked( get_option('background_color'), 'Grey' ); ?>> Grey</label><br>
                                <label><input type="radio" name="background_color" value="Light Blue" <?php checked( get_option('background_color'), 'Light Blue' ); ?>> Light Blue</label><br>
                                <label><input type="radio" name="background_color" value="Lemon Yellow" <?php checked( get_option('background_color'), 'Lemon Yellow' ); ?>> Lemon Yellow</label><br>
                                <label><input type="radio" name="background_color" value="Lime Green" <?php checked( get_option('background_color'), 'Lime Green' ); ?>> Lime Green</label><br>
                                <!-- Repeat for other colors -->
                            </td>
                        </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
    <?php
}

// Register and sanitize settings
function theme_layout_control_settings() {
    register_setting( 'theme-layout-control-settings', 'layout_width', array( 'sanitize_callback' => 'absint' ) );
    register_setting( 'theme-layout-control-settings', 'background_color' );
}
add_action( 'admin_init', 'theme_layout_control_settings' );

// Apply chosen layout width and background color to theme layout
function apply_theme_layout_settings() {
    $layout_width = get_option('layout_width', '1000');
    $background_color = get_option('background_color', '#ffffff');
    
    // Apply layout width
    echo '<style>';
    echo '.boxed-container { max-width: ' . esc_attr($layout_width) . 'px; margin: 0 auto; }';
    echo '</style>';
    
    // Apply background color
    echo '<style>';
    echo 'body { background-color: ' . esc_attr($background_color) . '; }';
    echo '</style>';
}
add_action('wp_head', 'apply_theme_layout_settings');

// Enqueue JavaScript for collapsible functionality
function theme_layout_control_collapsible_script() {
    wp_enqueue_script( 'theme-layout-control-script', plugins_url( '/theme-layout-control.js', __FILE__ ), array('jquery'), '', true );
}
add_action('admin_enqueue_scripts', 'theme_layout_control_collapsible_script');

// Add settings page to admin menu
function theme_layout_control_menu() {
    add_options_page( 'Theme Layout Control', 'Theme Layout Control', 'manage_options', 'theme-layout-control', 'theme_layout_control_settings_page' );
}
add_action( 'admin_menu', 'theme_layout_control_menu' );

// Enqueue jQuery
function theme_layout_control_enqueue_scripts_and_styles() {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'theme-layout-control-script', plugins_url( '/theme-layout-control.js', __FILE__ ), array('jquery'), '', true );
}
add_action('admin_enqueue_scripts', 'theme_layout_control_enqueue_scripts_and_styles');
