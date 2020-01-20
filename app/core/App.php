<?php 


class App {
	// membuat controller method parameter default
	protected $controller = "Home";
	protected $method = "index";
	protected $params = [];


	public function __construct()
	{

		$url = $this->parseURL();
		// echo __FILE__."->";
		// var_dump($url);


		// mengambil controllernya
		if (file_exists("../app/controllers/".$url[0].".php")) {
			$this->controller = $url[0];
			// lalu hapus controllernya agar melanjutkan mengambil method nya
			unset($url[0]);
			// var_dump($url);
		}

		


		//panggil controllernya

		require_once "../app/controllers/".$this->controller.".php";
		$this->controller = new $this->controller;
		// var_dump($this->controller);


		//mengambil method yang ada didalam file controlernya

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				// hapus methodnya untuk menyisakan parameternya
				unset($url[1]);
			}
		}


		// mengambil parameternya

		if (!empty($url)) {
			$this->params = array_values($url);
		}


		// jalankan controller dan method serta kirimkan params jika ada
		call_user_func_array([$this->controller,$this->method], $this->params);


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