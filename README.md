# Sitemaps for CodeIgniter

codeigniter-sitemaps allows you to generate XML sitemaps for your codeigniter based applications quickly and easily. At present it does not feature auto crawling of the site you must provide a controller method to pull in a list of pages you wish to include. An example controller is included.

### System Requirements
This library is only compatible with Codeigniter 2.0+ as it uses syntax incompatible with PHP4. PHP5.3 is required for ISO 8601 date compatibility.

### Installation
Put the contents of this archive in your system/application folder.

An example controller is included in controllers/sitemap.php. It generates the sitemap for a blog using s hyperthetical model to provide a list of the post urls.

### Thanks
This library is based on work by Philipp Dörner 2010
http://signalkraft.com/google-sitemaps-for-codeigniter

