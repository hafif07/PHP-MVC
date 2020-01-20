<?php 


class App {

	public function __construct()
	{

		$url = $this->parseURL();
		echo __FILE__."->";
		var_dump($url);

	}

	public function parseURL()
	{
		if(isset($_GET["url"])){
			//menghilangkan tanda slash di akhir url
			$url = rtrim($_GET["url"],"/");
			// bersihkan url dari karakter aneh
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// hilangkan slash nya di tiap page routing hom/about/dsb
			$url = explode("/", $url);
			return $url;
		}

	}
}