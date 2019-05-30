<?php 

/**
 * Set up a WP-Admin page for managing turning on and off theme features.
 */
function rarelyneeded_add_options_page() {
	add_menu_page(
		'Theme Options',
		'Theme Options',
		'manage_options',
		'rarelyneeded-options',
		'rarelyneeded_options_page'
	);

	// Call register settings function
	add_action( 'admin_init', 'rarelyneeded_options' );
}
add_action( 'admin_menu', 'rarelyneeded_add_options_page' );


/**
 * Register settings for the WP-Admin page.
 */
function rarelyneeded_options() {
	register_setting( 'rarelyneeded-options', 'rarelyneeded-dark-mode' );
}


/**
 * Build the WP-Admin settings page.
 */
function rarelyneeded_options_page() { ?>
	<div class="wrap">
	<h1><?php _e('Gutenberg Starter Theme Options', 'rarelyneeded'); ?></h1>

	<form method="post" action="options.php">
		<?php settings_fields( 'rarelyneeded-options' ); ?>
		<?php do_settings_sections( 'rarelyneeded-options' ); ?>

			<table class="form-table">
				<tr valign="top">
					<td>
						<label>
							<input name="rarelyneeded-dark-mode" type="checkbox" value="1" <?php checked( '1', get_option( 'rarelyneeded-dark-mode' ) ); ?> />
							<?php _e( 'Enable a dark theme style for the editor.', 'rarelyneeded' ); ?>
							(<a href="https://developer.wordpress.org/block-editor/developers/themes/theme-support/#dark-backgrounds"><code>dark-editor-style</code></a>)
						</label>
					</td>
				</tr>
			</table>

		<?php submit_button(); ?>
	</form>
	</div>
<?php }


/**
 * Enable dark mode if rarelyneeded-dark-mode setting is active.
 */
function rarelyneeded_enable_dark_mode() {
	if ( get_option( 'rarelyneeded-dark-mode' ) == 1 ) {
		
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor-dark.css' );
		
		// Add support for dark styles.
		add_theme_support( 'dark-editor-style' );
	}
}
add_action( 'after_setup_theme', 'rarelyneeded_enable_dark_mode' );
