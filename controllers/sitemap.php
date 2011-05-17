<?php

class Sitemap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        /*
         * This example depneds on the existance of a hyperthetical controller
         * which is able to provide a list of your blog posts as an array of objects.
         */

        $this->load->model('posts_model');
        $this->load->library('sitemaps');
    }

    function index()
    {

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

        redirect(site_url($file_name));
    }

}