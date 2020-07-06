<?php
header('Content-Type: application/json');

require_once('conf/koneksi.php');

$sqlQuery = "SELECT   (@cnt := @cnt + 1) AS rowNumber,
t.id_merchant,
(select count(*) from coupon_waw where id_merchant = t.id_merchant) count
from coupon_waw t  CROSS JOIN (SELECT @cnt := 0) AS dummy GROUP BY id_merchant ORDER BY rowNumber ASC";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>