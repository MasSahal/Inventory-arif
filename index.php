<!doctype html>
<html lang="en">
<?php require('koneksi.php');?>
  <head>
  	<title>Inventory Arif</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">

  </head>
  <body>
		<?php $hal = $_GET['page']; ?>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        
          <ul class="list-unstyled components mb-5">
	          <li class="nav-item <?php if($hal == 'dashboard'){echo "active";}?>" >
              <a class="nav-link" href="?page=dashboard">
                Home
              </a>
            </li>
            <li class="nav-item <?php if($hal == 'inventory'){echo "active";}?>">
              <a class="nav-link" href="?page=inventory">
                Inventory
              </a>
            </li>
            <li class="nav-item <?php if($hal == 'list_produk'){echo "active";}?>">
              <a class="nav-link" href="?page=list_produk">
                List Produk
              </a>
            </li>
            <li class="nav-item <?php if($hal == 'about'){echo "active";}?>">
              <a class="nav-link" href="?page=about">
                About
              </a>
            </li>
        </ul>

	        <div class="footer">
	        	<p>
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Arif Afrigis Shobri
            </p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <form>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h3 class="font-weight-bold text-secondary">Selamat Datang Di Inventory Arif</h3>
              </div>
            </form>
            
          </div>
        </nav>
              <section class="content">
          <?php
              //set timezone ke jakarta
              date_default_timezone_set('ASIA/JAKARTA');
              $jam = date('H : i');
              $tanggal =  date(' D, M  Y');

              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }else{
                $page = "dashboard";
              }

              switch (@$page) {
                case 'dashboard':
                  include('page/dashboard.php');
                  break;
                case 'inventory':
                  include('page/inventory.php');
                  break;
                case 'list_produk':
                  include('page/list_produk.php');
                  break;
                case 'hapus':
                  include('page/hapus.php');
                  break;
                case 'edit':
                  include('page/edit.php');
                  break;
                case 'about':
                  include('page/about.php');
                  break;

                default:
                  include('page/dashboard.php');
                  break;
              }
            ?>
        </section>
      </div>
		</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>