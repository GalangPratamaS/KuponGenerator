<?php
	
	if (isset($_POST['length'])) {
		include 'class.coupon.php';
		$no_of_coupons = $_POST['no_of_coupons'];
		$prefix = $_POST['prefix'];
		$coupons = coupon::generate_coupons($no_of_coupons, $prefix);
		foreach ($coupons as $key => $value) {
			echo $value."\n ";
		}
		die();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP - Coupon Code Generator</title>
	 <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>PHP - Coupon Code Generator</h2>
				<form action="index.php" method="post" id="coupon_form">
					<table class="table table-striped">
						<tr>
							<th>Parameter</th>
							<th>Type</th>
							<th>Default</th>
							<th>Custom value</th>
						</tr>
						<tr>
							<th>Number of coupons</th>
							<td>number</td>
							<td>1</td>
							<td><input class="form-control" type="number" name="no_of_coupons" value="1" min="1"/></td>
						</tr>
						<tr>
							<th>Length</th>
							<td>number</td>
							<td>6</td>
							<td><input class="form-control" type="number" name="length" value="6" min="1" /></td>
						</tr>
						<tr>
							<th>Merchant</th>
							<td>string</td>
							<td></td>
							<td>
							<select class="form-control" name="prefix">
									<option value="SP">Shopee</option>
									<option value="BI">Blibli.com</option>
								  	<option value="BL">Bukalapak</option>
								  	<option selected value="TP">Tokopedia</option>
								</select>
							</td>
						</tr>
					
						
					</table>
					<div class="col-md-offset-8 col-md-4">
						<button type="submit" class="btn btn-success pull-right">Generate</button>
						<br/><br/>
					</div>
					<hr />
						<textarea class="form-control" placeholder="Result here" id="result" rows="3" readonly=""></textarea>
					<hr />
					<div class="col-md-offset-8 col-md-4">
						<button type="button" onclick="exporttoxls()" class="btn btn-success pull-right">Export Codes to Excel</button>
					</div>
					<div class="col-md-offset-8 col-md-4">
						<button type="button" onclick="exporttocsv()" class="btn btn-success pull-right">Export Codes to Csv</button>
					</div>
					<br/><br/><br/><br/><br/>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
	
	$(document).ready(function(){
		$('#coupon_form').submit(function() {
			var no_of_coupons = $('input[name="no_of_coupons"]').val();
			var length = $('input[name="length"]').val();
			var prefix = $('select[name="prefix"]').val();
			

			$('#result').load('index.php', {
				no_of_coupons: no_of_coupons,
				length: length,
				prefix: prefix
			});
			return false;
		});
	});

	function exporttocsv() {
		if ($('#result').val()) {
			var a = document.createElement('a');
			with (a) {
				href='data:text/csv;base64,' + btoa($('#result').val());
				download='csvfile.csv';
			}
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
	        }
        };
	</script>
</body>
</html>
