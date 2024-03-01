<?php
/**
 * Test the filter
 *
 * @package PWCC\FontsToUploads\Tests
 */

namespace PWCC\FontsToUploads\Tests;

use WP_UnitTestCase;

/**
 * Test the rewrite rules.
 */
class Test_Fonts_To_Uploads extends WP_UnitTestCase {

	/**
	 * Ensure font directory begins with uploads base path.
	 *
	 * @dataProvider data_font_directory_begins_with_upload_base_path
	 *
	 * @param string       $key         The key to compare.
	 * @param string|false $uploads_key The uploads key to check against.
	 */
	public function test_font_directory_begins_with_upload_base_path( $key, $uploads_key ) {
		$uploads = wp_get_upload_dir();
		$fonts   = wp_get_font_dir();

		$this->assertArrayHasKey( $key, $uploads, "Uploads[{$uploads_key}] is not set." );
		$this->assertArrayHasKey( $key, $fonts, "Fonts[{$key}] is not set." );
		$this->assertStringStartsWith( $uploads[ $uploads_key ], $fonts[ $key ], "Fonts[{$key}] does not begin with uploads[{$uploads_key}]." );
	}

	/**
	 * Data provider for test_font_directory_begins_with_upload_base_path
	 *
	 * @return array[] Data Provider
	 */
	public function data_font_directory_begins_with_upload_base_path() {
		return array(
			array( 'path', 'basedir' ),
			array( 'url', 'baseurl' ),
			array( 'basedir', 'basedir' ),
			array( 'baseurl', 'baseurl' ),
		);
	}
}
