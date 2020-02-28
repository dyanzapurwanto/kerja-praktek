<?php
	//include class controller
	include "controller/controller.php";
	
	//variabel main merupakan objek baru yang dibuat dari class controller
	$main = new controller();
	
	//kondisi untuk menampilkan halaman web yang diminta
	if(isset($_GET['e'])){ //kondisi untuk mengakses halaman edit
		$id = $_GET['e'];
		$main->viewEdit($id);
	}else if(isset($_GET['d'])){ //kondisi untuk menghapus data (mengakses fungsi delete)
		$id = $_GET['d'];
		$main->delete($id);
	}else if(isset($_GET['i'])){
		$main->viewInsert(); //kondisi untuk mengakses halaman add
	}else if(isset($_GET['download'])){
		$id = $_GET['download'];
		$main->download($id);
	}else{
		$main->index(); //kondisi awal (menampilkan seluruh data)
	}
?>