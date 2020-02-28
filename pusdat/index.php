<?php
$navbar = 'style="display:none"';
include "controller/controller.php";
$main = new controller();
  session_start();
  if(isset($_SESSION['username']))
  {
    $navbar = '';
    if (isset($_POST['logout']))
    {
        session_destroy();
        header('location:index.php');
    }
  }
  else{

  }
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>ADMIN PUSDAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="shortcut icon" href="images/disnaker_logo.png">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/disnaker_logo.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li>
                <center>DINAS KETENAGAKERJAAN KOTA SEMARANG<center>
            </li>
          </ul>
	        <ul class="list-unstyled components mb-5" <?php echo $navbar?>>
	          <li>
	              <a href="index.php"><span class="fa fa-file mr-3"> Semua File</span></a>
	          </li>
	          <li>
              <a href="index.php?i=add"><span class="fa fa-upload mr-3"> Upload File</span></a>
            </li>
            <li>
                <form id="LogOut" action = "" method = "POST">
                <input type = "hidden" name="logout" value = "LOGOUT">
                <a href="#" onclick="document.getElementById('LogOut').submit();">LOGOUT</a>
                </form>
	          </li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5" >

        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
          <div class="container-fluid" >

            <button type="button" id="sidebarCollapse" class="btn btn-primary" <?php echo $navbar?>>
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <font style="font-size:35px;color: darkslategrey;font-weight: bold;font-family:'Comic Sans MS';">ADMIN PUSAT DATA</font> 
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <?php
                
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
              $main->index();
            }
      ?>
        </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>