<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลพื้นที่เสี่ยง</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * from tb_riskarea where riskarea_id = '$id' ";
                    $re =$cls_conn->select_base($sql);
                    while($row = mysqli_fetch_array($re)){
                        $id = $row['riskarea_id'];
                        $riskareaname = $row['riskarea_name'];
                        $riskareagps= $row['riskarea_gps'];                        
                        $riskareadetail = $row['riskarea_detail'];                       
                        $riskareadate= $row['riskarea_date'];
                        $riskareafound= $row['riskarea_found'];                       
                        $riskareastatus = $row['riskarea_status'];                       
                        $adminid = $row['admin_id'];
                    } 
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <input type="hidden" id="idcard" name="id" value="<?=$id?>" required="required" class="form-control col-md-7 col-xs-12">
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อพื้นที่เสี่ยง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="riskareaname" value="<?=$riskareaname?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >พิกัดสถานที่เสี่ยง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="riskareagps" value="<?=$riskareagps?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >รายละเอียดพื้นที่เสี่ยง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="riskareadetail" value="<?=$riskareadetail?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >วันที่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="idcard" name="riskareadate" value="<?=$riskareadate?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >พบพื้นที่เสี่ยง<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="int" id="idcard" name="riskareafound" value="<?=$riskareafound?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >สถานะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="int" id="idcard" name="riskareastatus" value="<?=$riskareastatus?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีผู้ดูแล<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="adminid"  value="<?=$adminid?>" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                               <?php
                                $a='1';
                             $sql=" SELECT * from tb_admin";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                            //  echo $result;
                             {
                                 ?>
                                  <option value="<?=$row['admin_id']?>"><?=$row['admin_fullname']?></option>
                                 <?php } ?>

                                </select>
                            </div>
                        </div>

                        

        
              
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                        <a href="show_riskarea.php" class="btn btn-danger">ยกเลิก</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];         
                    $riskareaname = $_POST['riskareaname'];
                    $riskareagps= $_POST['riskareagps'];                        
                    $riskareadetail = $_POST['riskareadetail'];                       
                    $riskareadate= $_POST['riskareadate'];
                    $riskareafound= $_POST['riskareafound'];                       
                    $riskareastatus = $_POST['riskareastatus'];                       
                    $adminid = $_POST['adminid'];

                    $sql="UPDATE tb_riskarea set riskarea_name = '$riskareaname', riskarea_gps = '$riskareagps',
                     riskarea_detail = '$riskareadetail' , riskarea_date = '$riskareadate' ,riskarea_found = '$riskareafound' ,riskarea_status = '$riskareastatus',admin_id = '$adminid' 
                     where riskarea_id = '$id' ";

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_riskarea.php');
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