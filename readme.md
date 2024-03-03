# Fonts to Uploads

A WordPress plugin to relocate the fonts folder to the uploads directory

This plugin is to allow for sites using external file systems to store uploads to store user uploads to move the
wp-content/fonts directory to wp-content/uploads/wp-fonts instead.

This is to ensure that sites using S3 buckets, file partitions and immutable file systems can make use of the new
Font Library feature without the need to refactor their server or duplicate their offloading capacity.

## Installation

This plugin is currently only available via composer or on GitHub.

```
composer require peterwilsoncc/wp-fonts-to-uploads
```

The package identifies itself as a wordpress-plugin so will follow your composer projects settings for installing to the WordPress plugins folder.
