<?php
  include("./constant.php");
  if(isset($_POST['submit'])){
    $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST.'/reset-password/post.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('id' => $_POST['id'] ,'password' => $_POST['newpassword']),
      ));

  $response = curl_exec($curl);

  curl_close($curl);
  $res = json_decode($response);
  
  if($res->statusCode===400){
    header("location:./reset-password.php"); 
  }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="./back/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./back/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./back/template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./back/template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="./back/template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="./back/template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="./back/template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="./back/template/build/css/custom.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="css-reset-password.css" rel="stylesheet">

</head>
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
<div class="p" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title center">
                    <img src="./back/images/correct_check.png" alt="check" width="250" height="250">

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left center" method="post">

                        <h4>เปลี่ยนรหัสผ่านสำเร็จ</h4>

                <div class="ln_solid"></div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
<!-- /footer content -->
<!--  </div>
</div> -->

<!-- jQuery -->
<script src="./back/template/vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="./back/template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="./back/template/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="./back/template/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="./back/template/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="./back/template/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="./back/template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="./back/template/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="./back/template/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="./back/template/vendors/Flot/jquery.flot.js"></script>
<script src="./back/template/vendors/Flot/jquery.flot.pie.js"></script>
<script src="./back/template/vendors/Flot/jquery.flot.time.js"></script>
<script src="./back/template/vendors/Flot/jquery.flot.stack.js"></script>
<script src="./back/template/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="./back/template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="./back/template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="./back/template/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="./back/template/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="./back/template/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="./back/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="./back/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="./back/template/vendors/moment/min/moment.min.js"></script>
<script src="./back/template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="./back/template/build/js/custom.min.js"></script>

<!-- Datatables -->
<script src="./back/template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./back/template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="./back/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="./back/template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="./back/template/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="./back/template/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="./back/template/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="./back/template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="./back/template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="./back/template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="./back/template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="./back/template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="./back/template/vendors/jszip/dist/jszip.min.js"></script>
<script src="./back/template/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="./back/template/vendors/pdfmake/build/vfs_fonts.js"></script>

<script src="./css-reset-password.css"></script>
</body>
</html>

<script>
var new_password = document.getElementById("new_password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(new_password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

new_password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
