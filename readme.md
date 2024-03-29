# Fonts to Uploads

A WordPress plugin to relocate the fonts folder to the uploads directory

WordPress 6.5 introduces a new Font Library feature. By default these new files are stored in the directory `wp-content/fonts`. This plugin relocates the font files to the `wp-content/uploads/fonts` instead.

This is to ensure that sites using S3 buckets, file partitions and immutable file systems can make use of the new Font Library feature without the need to refactor their server or duplicate their offloading capacity.

If you find any bugs or wish to contribute a pull request, please do so via the [plugin's GitHub repository](https://github.com/peterwilsoncc/fonts-to-uploads).

Most sites will not require this plugin as their file system will allow for the new folder to be created and written to. As with most WordPress features, the Font Library will just work! This is for websites with complex and heavily customized hosting environments.

## Installation

This plugin is available in the [WordPress plugin repository](https://wordpress.org/plugins/fonts-to-uploads/) and via the WordPress admin. The simplest way to install it is via the WordPress admin by going to Plugins > Add New Plugin and searching for "Fonts to Uploads"

The plugin is also available via composer:

```
composer require peterwilsoncc/wp-fonts-to-uploads
```

The package identifies itself as a wordpress-plugin so will follow your composer project's settings for installing to the WordPress plugins folder.
