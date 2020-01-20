<?php 

class About {
	public function index($nama="no name",$pekerjaan="no job")
	{
		echo "Halo nama saya $nama pekerjaan saya $pekerjaan";
	}

	public function page()
	{
		echo "ini controller About method page";
	}
}