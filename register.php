<?php
session_start(); 
if($_SESSION['nama_user'] == ""){
    header("Location: login.php");
}

    include "conf/koneksi.php";

    if (isset($_POST['email'])) {
		$email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password_retype'];
        $nama_user = $_POST['nama_user'];
        $jabatan = $_POST['jabatan'];
        $cost = 10;

        $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);
	
        $query  =   "SELECT email FROM user_redeem WHERE email = '$email' ";
        $exac   = mysqli_query($conn, $query)or die (mysqli_error($conn));

        if ($exac) {
            $email_count = mysqli_num_rows($exac);
            if ($email_count > 0) {
                echo '<script>alert("Email sudah digunakan, silahkan gunakan email lain..");
                window.location = "./register.php";</script>';
                
            }else{
                $query  =   "INSERT INTO user_redeem (email,password,nama_user,jabatan) VALUES('$email','$hash','$nama_user','$jabatan')";
			
                $exec 	= mysqli_query($conn,$query)or die (mysqli_error($conn));
                if ($exec) {
                    echo '<script>alert("Berhasil tambah akun..");
                    window.location = "./register.php";</script>';
                }
            } 
        }else{
            echo mysqli_error($conn);
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
        
        <div class="app-main">
        <?php
                  $page = "register";
                  include "sidebar.php";
                 ?>
            
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php
                    include "dashboard_main.php";
                    ?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Registrasi
                                
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Registrasi User</h5>
                                    <form name="registForm" id="registForm" method="post" enctype="multipart/form-data" action="">
                                    <div class="position-relative form-group"><label for="exampleEmail"
                                               >Email</label><input class="form-control"
                                                name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="position-relative form-group"><label for="exampleNama"
                                              >Nama</label><input class="form-control"
                                                name="nama_user" type="text" class="form-control" required>
                                    </div>
                                       
                                        <div class="position-relative form-group"><label for="examplePassword"
                                               >Password</label><input class="form-control"
                                                name="password" id="password" type="password" class="form-control" required>
                                        </div>
                                        <div class="position-relative form-group"><label for="examplePassword"
                                               >Ulangi Password</label><input class="form-control"
                                                name="password_retype" id="password_retype" type="password" required class="form-control">
                                                <span id='message'></span>
                                        </div>
                                       
                                        <div class="position-relative form-group"><label for="exampleSelect"
                                                >Pilih Jabatan</label><select class="form-control" name="jabatan" required>
									<option value="Promosi">Promosi</option>
									<option value="Sales">Sales</option>
								  	<option value="Admin">Admin</option>
                                </select></div>
                               
                                        <button class="mt-1 btn btn-primary" id="myButton" value="register" >Registrasi</button>
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
