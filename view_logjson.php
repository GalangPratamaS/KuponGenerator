<?php
//memasukkan koneksi database
require_once("conf/koneksi.php");
 
//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id']){
	//membuat variabel id berisi post['id']
    $id = $_POST['id'];
    
	//query standart select where id
	$view = ("SELECT ur.*, user_redeem.nama_user FROM `logs_redeem` ur LEFT JOIN user_redeem  ON id_user_redeem = user_redeem.id_user WHERE id_user_redeem = '$id'"); 
    //jika ada datanya
    $exec 	=	mysqli_query($conn, $view);

    if ($exec) {
        $total	= mysqli_num_rows($exec);
        $no = 1;
        if ($total > 0) {
            echo '<p>Berikut ini adalah detail dari data logs generate </p>
            <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th>Merchant</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
            while ($rows = mysqli_fetch_array($exec)) {
                echo '                                        
                                            <tr>
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
                                                                            <div class="widget-subheading opacity-7">'.$rows['date_redeem'].'</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">'.$rows['id_merchant'].'</td>
                                                            <td class="text-center">'.$rows['amount_coupon'].'</td>
                                                           
                                                            
                                                        </tr>
                                                        
        ';
        $no++;
            }
            echo '</tbody>
            </table>
        </div>';
        }
    }

 
}
?>