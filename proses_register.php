<?php
session_start();
	include "conf/koneksi.php";

    if (isset($_POST['register'])) {
		$email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $password2 = mysql_real_escape_string($_POST['password_retype']);
        $nama_user = mysql_real_escape_string($_POST['nama_user']);
        $jabatan = mysql_real_escape_string($_POST['jabatan']);
        $cost = 10;
        $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);
	
        $query  =   "SELECT email FROM akun WHERE email='$email'";
        $exac   = mysqli_query($conn, $query);
        echo "ciluk baa";
        if ($exac) {
            $email_count = mysqli_num_rows($exac);
            if ($email_count > 0) {
                $_SESSION['message']	= "2";
                echo '<script>alert("Email sudah digunakan, silahkan gunakan email lain..")</script>';
            }else{
                $query  =   "INSERT INTO user_redeem (email,password,nama_user,jabatan) VALUES('$email','$hash','$nama_user','$jabatan')";
			
                $exec 	= mysqli_query($conn,$query)or die (mysqli_error($conn));;
                if ($exec) {
                //	die('Invalid query: ' . mysqli_error());
                echo '<script type="text/javascript">
                        berhasil();
                      </script>';
                }
            }
        }else{
            echo "ciluk baa";
            echo mysqli_error($conn);
        } 

             
			
	} else {
        echo "ciluk baa";
    }

?>