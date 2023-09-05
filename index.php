<?php
session_start();
error_reporting(0);
include"config/config.php";
include"config/waktu.php";
include"config/tgl_indo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Informasi Pengaduan</title>

		<link rel="shortcut icon" href="images/LOGO.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Transporters web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web Designs" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->

<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" /><!-- for testimonials -->

<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->

<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
<?php include"tampilan/menu.php";?>
<!-- Slider -->
<!-- //Slider -->				
<?php 
     if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $file = "$page.php";

                if (!file_exists($file)) {
                    include ("page/home.php");
                }else{
                    include ("$page.php");
                }
            }else{
                include ("page/home.php");
            }
            include "tampilan/footer.php";
      
    ?>

<?php include"tampilan/scripthome.php";?>
</body>
</html>