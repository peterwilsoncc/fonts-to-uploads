=== Fonts to Uploads ===
Contributors: peterwilsoncc
Tags: font-library, uploads
Requires at least: 6.4
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.0
License: MIT
License URI: https://github.com/peterwilsoncc/fonts-to-uploads/blob/main/LICENSE

Relocate the WordPress fonts folder to the uploads directory.

== Description ==
This plugin is to allow for sites using external file systems to store uploads to store user uploads to move the
wp-content/fonts directory to wp-content/uploads/fonts instead.

This is to ensure that sites using S3 buckets, file partitions and immutable file systems can make use of the new
Font Library feature without the need to refactor their server or duplicate their offloading capacity.

If you find any bugs or wish to contribute a pull request, please do so via the [plugin's GitHub repository](https://github.com/peterwilsoncc/fonts-to-uploads).

== Frequently Asked Questions ==

= I can't see this plugins admin menu =

This plugin doesn't include any options to configure so no admin menu is required.

Simply install the plugin and activate.

== Changelog ==

= 1.0.0 =
Initial release
