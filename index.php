<?php  
session_start();
include 'conf/koneksi.php';
if($_SESSION['nama_user'] == ""){
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Wonderland Adventure Waterpark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy-100x100.png" sizes="32x32" />
<link rel="icon" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://wonderlandwaterpark.com/wp-content/uploads/2020/01/LOGO-BARU-WAW-1024x710-copy.png" />
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
<link href="./main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php
        $page = "Home";
            include "header.php";
           
        ?>          
        <div class="app-main">
                <?php
                 include "sidebar.php";
                ?>

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <?php include "dashboard_main.php"; ?>           
                        <div class="row">
                        <?php  
				    		$query 	= "select t.id_merchant,
                            (select count(*) from coupon_waw where id_merchant = t.id_merchant) count
                          from coupon_waw t GROUP BY id_merchant ASC";

                          $exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {

                                        if($rows['id_merchant'] == "TP") {
                                            echo '<div class="col-md-8 col-xl-6">
                                            <div class="card mb-3 widget-content bg-success">
                                                <div class="widget-content-wrapper text-white">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Tokopedia Coupon</div>
                                                        <div class="widget-subheading">Last month out</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-white"><span>'.$rows['count'].'</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        } else if($rows['id_merchant'] == "BL"){
                                            echo '<div class="col-md-8 col-xl-6">
                                            <div class="card mb-3 widget-content bg-danger">
                                                <div class="widget-content-wrapper text-white">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Bukalapak Coupon</div>
                                                        <div class="widget-subheading">Last month out</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-white"><span>'.$rows['count'].'</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        } else if($rows['id_merchant'] == "BI"){
                                            echo '<div class="col-md-8 col-xl-6">
                                            <div class="card mb-3 widget-content bg-happy-itmeo">
                                                <div class="widget-content-wrapper text-white">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Blibli Coupon</div>
                                                        <div class="widget-subheading">Last month out</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-white"><span>'.$rows['count'].'</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        } else if($rows['id_merchant'] == "SP"){
                                            echo '<div class="col-md-8 col-xl-6">
                                            <div class="card mb-3 widget-content bg-sunny-morning">
                                                <div class="widget-content-wrapper text-white">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Shopee Coupon</div>
                                                        <div class="widget-subheading">Last month out</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-white"><span>'.$rows['count'].'</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        } else {
                                            echo '<div class="col-md-8 col-xl-6">
                                            <div class="card mb-3 widget-content bg-sunny-morning">
                                                <div class="widget-content-wrapper text-white">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Tiket Lain</div>
                                                        <div class="widget-subheading">Last month out</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-white"><span>'.$rows['count'].'</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    }
                                }
                            }
                          ?>
                            
                            
                            
                            
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            Generate Coupon Report
                                        </div>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                                    <div class="widget-chat-wrapper-outer">
                                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                            <canvas id="graphCoupon" class="graphCoupon"></canvas>
                                                        </div>
                                                    </div>
                                                </div>


                                                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Last User Redeem</h6>
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                        <?php  
				    		$query 	= "SELECT logs_redeem.amount_coupon,logs_redeem.id_merchant,logs_redeem.date_redeem, user_redeem.nama_user 
                                        FROM logs_redeem LEFT JOIN user_redeem ON logs_redeem.id_user_redeem = user_redeem.id_user 
                                        ORDER BY id_log DESC LIMIT 10";

                          $exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
                                $total	= mysqli_num_rows($exec);
                                $logo = "other.png";
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
                                        //looping
                                        $amount = $rows['amount_coupon'];
                                        echo ' <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="42" class="rounded-circle" src="assets/images/avatars/9.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">'.$rows['nama_user'].'</div>
                                                    <div class="widget-subheading">'.$rows['date_redeem'].'</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="font-size-md text-muted">
                                                    '; if($rows['id_merchant']=="BL"){
                                                        $logo = "assets/images/BL.jpeg";
                                                    } else if($rows['id_merchant']=="SP"){
                                                        $logo = "assets/images/SP.png";
                                                    }else if($rows['id_merchant']=="TP"){
                                                        $logo = "assets/images/TP.png";
                                                    }else if($rows['id_merchant']=="BI"){
                                                        $logo = "assets/images/BI.jpg";
                                                    } else {
                                                        $logo = "assets/images/other.png";
                                                    }
                                                    echo "
                                                   
                                                    <i class='pe-7s-ticket'></i>
                                                        <span>$amount</span>
                                                        
                                                        <img width='20' class='rounded-circle' src='$logo' alt=''>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>";
                                    }
                                }
                            }?>
                                                        <!-- looping last user redeem -->
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">User Most Generate
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="disabled btn btn-focus">Last Week</button>
                                                <button class=" btn btn-focus">All Month</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th class="text-center">Amount Generate</th>
                                                
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $jumlahRedemSQL = "SELECT SUM(logs_redeem.amount_coupon) AS jumlah_generate, user_redeem.nama_user, user_redeem.jabatan, user_redeem.id_user AS id_user 
                                                FROM `logs_redeem` LEFT JOIN user_redeem ON logs_redeem.id_user_redeem = user_redeem.id_user GROUP BY id_user_redeem ORDER BY jumlah_generate DESC";
                                                $exec2 	=	mysqli_query($conn, $jumlahRedemSQL);

                                                if ($exec2) {
                                                    $total	= mysqli_num_rows($exec2);
                                                    $no = 1;
                                                    if ($total > 0) {
                                                        while ($rows = mysqli_fetch_array($exec2)) {
                                                            
                                                            echo '<tr>
                                                            <td class="text-center text-muted">'.$no.'</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">'.$rows['nama_user'].'</div>
                                                                            <div class="widget-subheading opacity-7">'.$rows['jabatan'].'</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">'.$rows['jumlah_generate'].'</td>
                                                           
                                                            <td class="text-center">
                                                            <button type="button" data-toggle="modal" data-target="#modalLogs" class="view_data btn btn-primary" id="'.$rows['id_user'].'">Details</button>
                                                            </td>
                                                        </tr>';
                                                        $no++;
                                                        }
                                                    }
                                                }
                                            ?>
                                            
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

                    <script>
                            $(document).ready(function () {
                                showGraph();
 
                            });
                     </script>

                    <script>
                            $(document).ready(function () {
                               // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
                               $('.view_data').click(function(){
                                    // membuat variabel id, nilainya dari attribut id pada button
                                    // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
                                    var id = $(this).attr("id");
                                    
                                    // memulai ajax
                                    $.ajax({
                                        url: 'view_logjson.php',	// set url -> ini file yang menyimpan query tampil detail data log
                                        method: 'post',		// method -> metodenya pakai post. 
                                        data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                                        success:function(data){		// kode dibawah ini jalan kalau sukses
                                            $('#data_log').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_log">
                                            $('#modalLogs').modal("show");	// menampilkan dialog modal nya
                                        }
                                    });
                                });
                            });
 
                          
                     </script>
               
                 <!-- footer and script-->
                       <!-- Modal -->
                       <div class="modal fade" id="modalLogs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Logs History Generating Copun</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="data_log">
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            <!-- end modal -->
                            
</body>
</html>
