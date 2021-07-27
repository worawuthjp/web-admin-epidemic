<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>เพิ่มข้อมูลการวัคซีน</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="uservaccine" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >สถานะการยืนยัน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="userstatus" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >รูปภาพการฉีดวัคซีน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="idcard" name="image" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">วันที่อัปเดต<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="name" name="userdate" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีผู้ใช้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="userid" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                               <?php
                                $a='1';
                             $sql=" SELECT * from tb_user";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                            //  echo $result;
                             {
                                 ?>
                                  <option value="<?=$row['user_id']?>"><?=$row['user_id']?></option>
                                 <?php } ?>

                                </select>
                            </div>
                        </div>


        
              
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                        <a href="show_vaccine.php" class="btn btn-danger">ยกเลิก</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $uservaccine = $_POST['uservaccine'];
                    $userstatus = $_POST['userstatus'];
                    $userdate = $_POST['userdate'];
                    $userid = $_POST['userid'];

                    
                    $image = "";
                    if ($_FILES["image"]["name"] != "") {

                        $datetime = date("dmYHis");
                        $file_name = substr($_FILES['image']['name'], -4);
                        $image = $datetime . '_p1' . $file_name;
                        move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $image);
                    }
                    

                    $sql = " insert into tb_vaccine(user_vaccine,user_status,user_image,user_id,user_date)";
                    $sql .= " values ('$uservaccine','$userstatus','$image','$userid','$userdate')";

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_vaccine.php');
                        // echo $sql;
                    } else {
                        echo $cls_conn->show_message('Unsuccess');
                    }
                }
                ?>



            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php'); ?>