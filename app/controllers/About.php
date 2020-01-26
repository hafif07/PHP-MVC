<?php 

class About extends Controller{
	// public function index($nama="no name",$pekerjaan="no job")
	// {
	// 	echo "Halo nama saya $nama pekerjaan saya $pekerjaan";
	// }
	public function index($nama="no name",$pekerjaan="no job", $usia=19){
		$data["nama"]=$nama;
		$data["pekerjaan"]=$pekerjaan;
		$data["usia"]= $usia;
		$data["name_page"]= "About";
		$this->view("templates/header",$data);
		$this->view("about/index",$data);
		$this->view("templates/footer");
	}

	public function page()
	{	
		$data["name_page"]= "About";
		$this->view("templates/header",$data);
		$this->view("about/page");
		$this->view('templates/footer');
	}
}