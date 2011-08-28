# Sitemaps for CodeIgniter

codeigniter-sitemaps allows you to generate XML sitemaps for your codeigniter based applications quickly and easily. An example controller is included.

Basic autodetection of pages is included using auto_detect() which assumes method == page and adds urls to the sitemap accordingly, this can be restricted using the exclude parameter.

The directory you're writing the sitemap to must be writable.

## System Requirements

* Codeigniter 2.0+
* PHP5.3 is required for ISO 8601 date compatibility.

## Installation
Put the contents of this archive in your system/application folder.

Or use sparks: 

    php tools/spark install codeigniter-sitemaps

## Example Usage

    //if you're using sparks
    $this->load->spark('codeigniter-sitemaps/0.0.1')

    $this->load->library('sitemaps');

    //assuming a hypothetical posts_model
    $posts = $this->posts_model->get_posts();

        foreach ($posts AS $post)
        {
            $item = array(
                "loc" => site_url("blog/" . $post->slug),
                "lastmod" => date("c", strtotime($post->last_modified)),
                "changefreq" => "hourly",
                "priority" => "0.8"
            );

            $this->sitemaps->add_item($item);
        }

    // file name may change due to compression
    $file_name = $this->sitemaps->build("sitemap_blog.xml");

    $reponses = $this->sitemaps->ping(site_url($file_name));

There is also autodetect functionality see code & comments for more details

### Thanks
This library is based on work by Philipp Dörner 2010
http://signalkraft.com/google-sitemaps-for-codeigniter

