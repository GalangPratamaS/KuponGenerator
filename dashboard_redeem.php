<?php
    session_start();
    if($_SESSION['nama_user'] == ""){
        header("Location: login.php");
    }

	include "conf/koneksi.php";
	date_default_timezone_set('Asia/Jakarta');

	if (isset($_POST['length'])) {
       
     
		include 'class.coupon.php';
		$no_of_coupons = $_POST['no_of_coupons'];
		$prefix = $_POST['prefix'];
		$coupons = coupon::generate_coupons($no_of_coupons, $prefix);
		
		$date = date("Y-m-d h:i:s");
		$date2 = "0000-00-00 00:00:00";
		echo "Kode ; Merchant: \n";
		foreach ($coupons as list($kupon, $merchant)) {
			$sql	= "INSERT INTO coupon_waw (id_merchant,coupon_code,date_created,status,date_redeem) VALUES('$merchant','$kupon','$date',0,'$date2')";
			
			$exec 	= mysqli_query($conn,$sql)or die (mysqli_error($conn));;
			if (!$exec) {
			
			}
			echo "$kupon; $merchant\n";
        }
             $id_user = $_SESSION['id_user'];
            $logs	= "INSERT INTO logs_redeem (amount_coupon,id_merchant,date_redeem,id_user_redeem) VALUES('$no_of_coupons','$merchant','$date','$id_user')";
			
			$ekse 	= mysqli_query($conn,$logs)or die (mysqli_error($conn));;
			if ($ekse) {
                echo '<script type="text/javascript">
                stop_loading();
               exporttocsv();
               berhasil();
                  </script>'; 
			}

       
		die();
	}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Wonderland Adventure Waterpark</title>
    <link rel="icon" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy-100x100.png" sizes="32x32" />
<link rel="icon" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy.png" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="./main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php
        include "header.php";
       ?>
        <!-- include theme disini -->
        <div class="app-main">
                  <?php
                  $page = "redeem";
                  include "sidebar.php";
                 ?>
            
            <div class="app-main__outer">
                <div class="app-main__inner">
                <?php include "dashboard_main.php"; ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Generate Coupon
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Generate Coupon</h5>
                                    <form action="dashboard_redeem.php" method="post" id="coupon_form">

                                       
                                        <div class="position-relative form-group"><label for="examplePassword"
                                                class="">Jumlah Kupon</label><input class="form-control"
                                                name="no_of_coupons" value="1" min="1" type="number" class="form-control">
                                        </div>
                                        <div class="position-relative form-group"><label for="exampleSelect"
                                                class="">Pilih Merchant</label><select class="form-control" name="prefix">
									<option value="SP">Shopee</option>
									<option value="BI">Blibli.com</option>
								  	<option value="BL">Bukalapak</option>
								  	<option selected value="TP">Tokopedia</option>
                                </select></div>
                                <input class="form-control" type="hidden" name="length" value="6" min="1" />
                                        
                                        <div class="position-relative form-group"><label for="exampleText" class="">Text
                                                Area</label>
                                                
                                                <textarea
                                                class="form-control"  readonly=""placeholder="Result here" id="result" rows="3" ></textarea></div>
                                       
                                                <button type="submit" id="myButton" onClick="load_coupon()" class="btn btn-success">Generate</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>

               <!-- footer and script -->
               <?php
                    include "footer.php"
                ?>
                 <!-- footer and script-->
</body>

</html>
