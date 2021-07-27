<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลผู้ใช้RFID</h2>
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
                    $sql = "SELECT * from tb_rfiduser where rfiduser_id = '$id' ";
                    $re =$cls_conn->select_base($sql);
                    while($row = mysqli_fetch_array($re)){
                        $id = $row['rfiduser_id'];
                        $status = $row['rfiduser_status'];
                        $rfid_id = $row['rfid_id'];                        
                        $userid = $row['user_id'];                                            
                    } 
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <input type="hidden" id="idcard" name="id" value="<?=$id?>" required="required" class="form-control col-md-7 col-xs-12">
                    
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >สถานะผู้ใช้RFID<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="status" value = "<?=$status?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีRFID<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="rfid_id" value = "<?=$rfid_id?>" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                               <?php
                                $a='1';
                             $sql=" SELECT * from tb_rfid";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                            //  echo $result;
                             {
                                 ?>
                                  <option value="<?=$row['rfid_id']?>"><?=$row['rfid_id']?></option>
                                 <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีผู้ใช้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="userid" value = "<?=$userid?>" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                               <?php
                                $a='1';
                             $sql=" SELECT * from tb_user";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                            //  echo $result;
                             {
                                 ?>
                                  <option value="<?=$row['user_id']?>"><?=$row['user_fullname']?></option>
                                 <?php } ?>

                                </select>
                            </div>
                        </div>


        
              
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                        <a href="show_rfid.php" class="btn btn-danger">ยกเลิก</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];         
                    $status = $_POST['status'];
                    $rfid_id = $_POST['rfid_id'];
                    $userid = $_POST['userid'];

                    $sql="UPDATE tb_rfiduser set rfiduser_status = '$status',rfid_id = '$rfid_id',user_id = '$userid'
                     where rfiduser_id = '$id' ";

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_rfiduser.php');
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