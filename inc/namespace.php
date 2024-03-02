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
	$upload_dir = wp_get_upload_dir();

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
