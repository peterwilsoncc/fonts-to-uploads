=== Fonts to Uploads ===
Contributors: peterwilsoncc
Tags: fonts-to-uploads
Requires at least: 6.5
Tested up to: 6.5
Stable tag: 1.0.0
Requires PHP: 7.4
License: MIT

Relocate the fonts folder to the uploads directory.

This plugin is to allow for sites using external file systems to store uploads to store user uploads to move the
wp-content/fonts directory to wp-content/uploads/wp-fonts instead.

This is to ensure that sites using S3 buckets, file partitions and immutable file systems can make use of the new
Font Library feature without the need to refactor their server or duplicate their offloading capacity.
