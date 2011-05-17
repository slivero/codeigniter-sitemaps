<?php

class Sitemap extends CI_Controller
{
	function Sitemap()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->model('posts_model');
		$this->load->library('sitemaps');
		
		$posts = $this->posts_model->get_posts();
		
		foreach($posts AS $post)
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
		
		// Debug by printing out the requests and status code responses
		// print_r($reponses);

		redirect(site_url($file_name));
	}
}
