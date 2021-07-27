<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลไทม์ไลน์</h2>
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
                    $sql = "SELECT * from tb_timeline where timeline_id = '$id' ";
                    $re =$cls_conn->select_base($sql);
                    while($row = mysqli_fetch_array($re)){
                        $id = $row['timeline_id'];
                        $timelinename = $row['timeline_name'];
                        $timelinegps = $row['timeline_gps'];
                        $timelinedate = $row['timeline_date'];
                        $time = $row['timeline_time'];
                        $userid = $row['user_id'];
                        
                    } 
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <input type="hidden" id="idcard" name="id" value="<?=$id?>" required="required" class="form-control col-md-7 col-xs-12">
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อไทม์ไลน์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="timelinename" value = "<?=$timelinename?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >พิกัดไทม์ไลน์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="timelinegps" value = "<?=$timelinegps?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >วันที่ไทม์ไลน์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="idcard" name="timelinedate" value = "<?=$timelinedate?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">เวลาไทม์ไลน์<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="name" name="time" value = "<?=$time?>" required="required" class="form-control col-md-7 col-xs-12">
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
                                  <option value="<?=$row['user_id']?>"><?=$row['user_id']?></option>
                                 <?php } ?>

                                </select>
                            </div>
                        </div>

                        

        
              
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                        <a href="show_employee.php" class="btn btn-danger">ยกเลิก</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $timelinename = $_POST['timelinename'];
                    $timelinegps = $_POST['timelinegps'];
                    $timelinedate = $_POST['timelinedate'];
                    $time = $_POST['time'];
                    $userid = $_POST['userid'];
                    

                    $sql="UPDATE tb_timeline set timeline_name = '$timelinename', timeline_gps = '$timelinegps', timeline_date = '$timelinedate',
                     timeline_time = '$time', user_id = '$userid'
                     where timeline_id = '$id' ";

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_timeline.php');
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