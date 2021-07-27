<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>เพิ่มข้อมูลผู้ใช้งาน</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                       
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >รหัสนักศึกษา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="studentID" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="username" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    
                    
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >รหัสผ่าน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ชื่อ-นามสกุล<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="idcard" name="fullname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">คณะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="faculty" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ภาควิชา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="department" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">เบอร์โทรศัพท์ที่ติดต่อได้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="tel" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ที่อยู่ปัจจุบัน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="address" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">บุคคลที่ติดต่อได้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="person" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีผู้ดูแล<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="adminid" required="required" class="form-control col-md-7 col-xs-12">
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
                    
                    $studentID = $_POST['studentID'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $faculty = $_POST['faculty'];
                    $department = $_POST['department'];
                    $tel = $_POST['tel'];
                    $address = $_POST['address'];
                    $person= $_POST['person'];
                    
                    $adminid = $_POST['adminid'];
                    

                    $sql = " insert into tb_usernew(user_studentID,user_username,user_password,user_fullname,user_faculty,user_department,user_tel,user_address,user_person,admin_id)";
                    $sql .= " values ('$studentID','$username','$password','$fullname','$faculty','$department','$tel','$address','$person','$adminid')";

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