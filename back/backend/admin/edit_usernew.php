<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แก้ไขข้อมูลผู้ใช้งาน</h2>
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
                    $sql = "SELECT * from tb_usernew where user_studentID = '$id' ";
                    $re =$cls_conn->select_base($sql);
                    while($row = mysqli_fetch_array($re)){
                        $id = $row['user_studentID'];
                        $username = $row['user_username'];
                        $password = $row['user_password'];
                        $fullname = $row['user_fullname'];
                        $faculty = $row['user_faculty'];
                        $department = $row['user_department'];
                        $tel = $row['user_tel'];
                        $address = $row['user_address'];
                        $person= $row['user_person'];              
                        $adminid = $row['admin_id'];
                    } 
                    }
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <input type="hidden" id="idcard" name="id" value="<?=$id?>" required="required" class="form-control col-md-7 col-xs-12">

                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="username" value="<?=$username?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    
                    
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="password" value="<?=$password?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อ-นามสกุล<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="fullname" value="<?=$fullname?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">คณะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="faculty" value="<?=$faculty?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ภาควิชา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="department" value="<?=$department?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">เบอร์โทรศัพท์ที่ติดต่อได้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="tel" value="<?=$tel?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ที่อยู่ปัจจุบัน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="address" value="<?=$address?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">บุคคลที่ติดต่อได้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="person" value="<?=$person?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีผู้ดูแล<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="adminid" value="<?=$adminid?>" required="required" class="form-control col-md-7 col-xs-12">
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
                        <a href="show_employee.php" class="btn btn-danger">ยกเลิก</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $faculty = $_POST['faculty'];
                    $department = $_POST['department'];
                    $tel = $_POST['tel'];
                    $address = $_POST['address'];
                    $person= $_POST['person'];             
                    $adminid = $_POST['adminid'];

                    $sql="UPDATE tb_usernew set user_username = '$username', user_password = '$password', user_fullname = '$fullname',
                     user_faculty = '$faculty', user_department = '$department',user_tel = '$tel',user_address = '$address', user_person= '$person' , admin_id = '$adminid' 
                     where user_studentID = '$id' ";

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_usernew.php');
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