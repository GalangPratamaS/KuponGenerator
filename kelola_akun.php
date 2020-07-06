<?php
    include "conf/koneksi.php";

   
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Wonderland Adventure Waterpark</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <link rel="icon" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy-100x100.png" sizes="32x32" />
<link rel="icon" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy.png" />
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
                  $page = "kelola_akun";
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
                                    <div class="card-header">Manage User
                                        <div class="btn-actions-pane-right">
                                        
                                        <a class="btn btn-primary metismenu-icon pe-7s-users" href="register.php" role="button"> Registrasi</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th class="text-center">Position</th>
                                                
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 $query  =   "SELECT * FROM user_redeem LIMIT 10 ";
                                                 $exec   = mysqli_query($conn, $query)or die (mysqli_error($conn));
                                                 $no = 1;
                                                 while($row = mysqli_fetch_array($exec)){ 
                                            ?>
                                            <tr>
                                                <td class="text-center text-muted">#<?php echo $no++; ?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $row['nama_user']; ?></div>
                                                                <div class="widget-subheading opacity-7"><?php echo $row['jabatan']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $row['email']; ?></td>
                                               
                                                <td class="text-center">
                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                </td>
                                            </tr>
                                                 <?php } ?>
                                            
                                            </tbody>
                                        </table>
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
