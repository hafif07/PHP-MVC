<?php 

class Home extends Controller {
	public function index()
	{	
		$data["name_page"]= "Home";
		$this->view("templates/header",$data);
		$this->view("home/index");
		$this->view("templates/footer");
	}
}