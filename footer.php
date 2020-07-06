<div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">

                            <div class="app-footer-right">
                                <ul class="nav">

                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">

                                            IT Department 2020
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               

            </div>
          
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
   

    <script type="text/javascript">
	
	$(document).ready(function(){
		$('#coupon_form').submit(function() {
			var no_of_coupons = $('input[name="no_of_coupons"]').val();
			var length = $('input[name="length"]').val();
			var prefix = $('select[name="prefix"]').val();
			

			$('#result').load('dashboard_redeem.php', {
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
				download='datakupon.csv';
			}
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
	        }
        };
    </script>
    
    <script>
        $('#password, #password_retype').on('keyup', function () {
        if ($('#password').val() == $('#password_retype').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
        });

       

        function berhasil() {
            swal({
                title: "BERHASIL",
                text: "Kupon Telah digenerate",
                icon: "success",
                buttons: [false, "OK"],
            }).then(function () {
                window.location.href = "dashboard_redeem.php";
            });
        }

        function load_coupon(){
            $.LoadingOverlay("show");
        }

        function stop_loading(){
            $.LoadingOverlay("hide");
        }
    </script>

<script>
     
        function showGraph()
        {
            {
                $.post("total_redeemjson.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].id_merchant);
                        marks.push(data[i].count);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Coupon Amount ',
                                backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks,
                                borderWidth: 1
                                
                            }
                        ]
                    };

                    var graphTarget = $("#graphCoupon");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>