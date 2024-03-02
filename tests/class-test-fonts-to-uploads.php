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
	 * Ensure `add_filter( 'upload_dir', 'wp_get_font_dir' );` does not trigger an infinite loop.
	 */
	public function test_filter_does_not_cause_infinite_loop() {
		add_filter( 'upload_dir', 'wp_get_font_dir' );

		add_filter(
			'upload_dir',
			function( $upload_dir ) {
				static $count = 0;
				++$count;

				/*
				 * Under normal circumstances the filter will be called twice.
				 *
				 * Once when the upload_dir is initially requested and once when the
				 * font directory filter runs and requests the upload directory without
				 * the filter applied.
				 */
				$this->assertLessThan( 3, $count, 'Filtering uploads directory should not trigger infinite loop.' );
				return $upload_dir;
			},
			5
		);

		$uploads = wp_get_upload_dir();

		// This will never be hit if an infinite loop is triggered.
		$this->assertTrue( true );
	}

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
