=== Fonts to Uploads ===
Contributors: peterwilsoncc
Tags: Font Library, Uploads
Requires at least: 6.4
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.1
License: MIT
License URI: https://github.com/peterwilsoncc/fonts-to-uploads/blob/main/LICENSE

Relocate the WordPress fonts folder to the uploads directory.

== Description ==

WordPress 6.5 introduces a new Font Library feature. By default these new files are stored in the directory `wp-content/fonts`. This plugin relocates the font files to the `wp-content/uploads/fonts` instead.

This is to ensure that sites using S3 buckets, file partitions and immutable file systems can make use of the new Font Library feature without the need to refactor their server or duplicate their offloading capacity.

If you find any bugs or wish to contribute a pull request, please do so via the [plugin's GitHub repository](https://github.com/peterwilsoncc/fonts-to-uploads).

Most sites will not require this plugin as their file system will allow for the new folder to be created and written to. As with most WordPress features, the Font Library will just work! This is for websites with complex and heavily customized hosting environments.

== Frequently Asked Questions ==

= I can't see this plugin's admin menu =

This plugin doesn't include any options to configure so no admin menu is required.

Simply install the plugin and activate.

== Changelog ==

= 1.0.1 =
* Readme update
* Set required version to WordPress 6.4 to allow for sites using the Gutenberg plugin.

= 1.0.0 =
Initial release
