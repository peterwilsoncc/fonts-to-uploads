<?php
/**
 * Fonts to Uploads
 *
 * @package           FontsToUploads
 * @author            Peter Wilson
 * @copyright         2023 Peter Wilson
 * @license           MIT
 */

namespace PWCC\FontsToUploads;

/**
 * Bootstrap the plugin.
 */
function bootstrap() {
	add_filter( 'font_dir', __NAMESPACE__ . '\\filter_default_font_directory' );
	// Prime the cache.
	add_action( 'init', __NAMESPACE__ . '\\cached_wp_get_upload_dir' );
}

/**
 * Store the uploads directory in a static variable.
 *
 * This is the prevent the potential for infinite loops in the event
 * an extender includes `add_filter( 'upload_dir', 'wp_get_font_dir' );`
 * in their code base.
 *
 * Without a primed cache, `wp_get_upload_dir()` would trigger the a call
 * to `wp_get_font_dir()` which would trigger a call to `wp_get_upload_dir()`.
 *
 * @return array Result of wp_get_upload_dir().
 */
function cached_wp_get_upload_dir() {
	static $cached = null;

	if ( null === $cached ) {
		$cached = wp_get_upload_dir();
	}

	return $cached;
}

/**
 * Filter the WordPress default font directory to use the uploads folder.
 *
 * Relocated files uploaded by the Font Library from `wp-content/fonts/` to a
 * sub-directory of the uploads folder.
 *
 * @param array $font_directory The default in which to store fonts.
 * @return array The modified fonts directory.
 */
function filter_default_font_directory( $font_directory ) {
	$upload_dir = cached_wp_get_upload_dir();

	$font_directory = array(
		'path'    => untrailingslashit( $upload_dir['basedir'] ) . '/wp-fonts',
		'url'     => untrailingslashit( $upload_dir['baseurl'] ) . '/wp-fonts',
		'subdir'  => '',
		'basedir' => untrailingslashit( $upload_dir['basedir'] ) . '/wp-fonts',
		'baseurl' => untrailingslashit( $upload_dir['baseurl'] ) . '/wp-fonts',
		'error'   => false,
	);

	return $font_directory;
}
