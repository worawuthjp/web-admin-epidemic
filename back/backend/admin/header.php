<?php session_start();?>
<?php include('../class_conn.php');?>
<?php include('../../../constant.php');?>
<?php $cls_conn=new class_conn;?>

<?php if(isset($_SESSION['admin_id'])){

}else{
    echo $cls_conn->goto_page(0,'../../../index.php');
    echo $cls_conn->show_message('ล๊อกอินก่อน');
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
    <title>ระบบการจัดการโรคระบาด</title>
    <!-- Bootstrap -->
    <link href="../template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../template/build/css/custom.min.css" rel="stylesheet">

    <link href="../css/app.css" rel="stylesheet">
    <script type="text/javascript" src="../js/instascan.min.js"></script>
    <style>
/* .bodybk {
	background-image: url("../image/p4.jpg");
  	background-repeat: no-repeat;
	background-size: cover;
} */
.bodybke {
    background-color: Gainsboro;
}
/*table {
    background-color: Gainsboro;
}
table, td, th {  
  border: 5px solid DimGrey;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}*/
</style>




</head>

<body class="nav-md ">
    <div class="container body">
        <div class="main_container" >
            <div class="col-md-3 left_col ">
                <div class="left_col scroll-view ">
                    <div class="navbar nav_title" style="border: 0;" align="center">
                    <img src="../../images/epidemic.png"
                            width="px" height="100px" /><span></span> </div>
                    <div class="clearfix"></div>
                    <br><br>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix" style="margin-left:20px;">
                        <!-- <div class="profile_pic"> </div> -->

                        <div class="profile_info" style="text-align :center;"> <span>
                                <h2> ยินดีต้อนรับ admin</h2>
                            </span>
                            <h2 style="text-align :center; font-size: 15px;"></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">

                            <ul class="nav side-menu">

                                <li><a href="scan_qrcode.php"><i class="fa fa-qrcode"></i>Scan Qrcode</a>

                                </li>

                                <li><a><i class="fa fa-anchor"></i>Admin<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_admin.php" ><i class="fa fa-plus"></i>Insert</a></li>
                                        <li><a href="show_admin.php" ><i class="fa fa-file-text"></i>Show</a></li>


                                    </ul>
                                </li>

                                <!-- <li><a><i class="fa fa-user"></i>User<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_user.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลผู้ใช้งาน</a></li>
                                        <li><a href="show_user.php" ><i class="fa fa-file-text"></i>Show </a></li>


                                    </ul>
                                </li> -->

                                <li><a><i class="fa fa-user"></i>User<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="insert_usernew.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลผู้ใช้งาน</a></li> -->
                                        <li><a href="show_usernew.php" ><i class="fa fa-file-text"></i>Show </a></li>


                                    </ul>
                                </li>

                                <li><a><i class="fa fa-newspaper-o"></i>News<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_news.php" ><i class="fa fa-plus"></i>Insert</a></li>
                                        <li><a href="show_news.php" ><i class="fa fa-file-text"></i>Show</a></li>


                                    </ul>
                                </li>

                                <li><a><i class="fa fa-eyedropper"></i>Vaccine<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="insert_vaccine.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลวัคซีน</a></li> -->
                                        <li><a href="show_vaccine.php" ><i class="fa fa-file-text"></i>Show</a></li>
                                    </ul>
                                </li>

                                <!-- <li><a><i class="fa fa-file-text"></i>แบบฟอร์มตรวจสอบความเสี่ยง<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_assignment.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลแบบฟอร์มตรวจสอบความเสี่ยง</a></li>
                                        <li><a href="show_assignment.php" ><i class="fa fa-file-text"></i>รายละเอียดแบบฟอร์มตรวจสอบความเสี่ยง</a></li>


                                    </ul>
                                </li> -->

                                <li><a><i class="fa fa-clipboard"></i>Epidemic<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_epidemic.php" ><i class="fa fa-plus"></i>Insert</a></li>
                                        <li><a href="show_epidemic.php" ><i class="fa fa-file-text"></i>Details</a></li>


                                    </ul>
                                </li>

                                <li><a><i class="fa fa-hospital-o"></i>Hospital<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_hospital.php" ><i class="fa fa-plus"></i>Insert</a></li>
                                        <li><a href="show_hospital.php" ><i class="fa fa-file-text"></i>Details</a></li>


                                    </ul>
                                </li>
                              

                                <li><a><i class="fa fa-rss"></i>RFID<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_rfid.php" ><i class="fa fa-plus"></i>เพื่มข้อมูล</a></li>
                                        <li><a href="show_rfid.php" ><i class="fa fa-file-text"></i>รายละเอียดข้อมูล</a></li>


                                    </ul>
                                </li>

                                <li><a><i class="fa fa-child"></i>RFID_User<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_rfiduser.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลผู้ใช้งานRFID</a></li>
                                        <li><a href="show_rfiduser.php" ><i class="fa fa-file-text"></i>รายละเอียดข้อมูลผู้ใช้งานRFID</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-map-marker"></i>Risk_Place<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_riskarea.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลสถานที่เสี่ยง</a></li>
                                        <li><a href="show_riskarea.php" ><i class="fa fa-file-text"></i>รายละเอียดข้อมูลสถานที่เสี่ยง</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-clock-o"></i>Timeline<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="insert_timeline.php" ><i class="fa fa-plus"></i>เพื่มข้อมูลไทม์ไลน์</a></li>
                                        <li><a href="show_timeline.php" ><i class="fa fa-file-text"></i>Details</a></li>
                                    </ul>
                                </li>

                                

                               


                                
                            
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
