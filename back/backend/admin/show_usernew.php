<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel bodybke">
                <div class="x_title">
                    <h2>รายละเอียดข้อมูลผู้ใช้งาน</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                         
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                <th>รหัสนักศึกษา</th>
                                    <th>ชื่อผู้ใช้งาน</th>
                                    <th>รหัสผ่าน</th>
                                    <th>อีเมล</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>คณะ</th>
                                    <th>ภาควิชา</th>
                                    <th>เบอร์โทรศัพท์ที่ติดต่อได้</th>
                                    <th>ที่อยู่ปัจจุบัน</th>
                                    <th>บุคคลที่ติดต่อได้</th>        
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                            //    $a='0';
                             $sql=" SELECT * from tb_usernew";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                            //  echo $result;
                             {
                                 ?>
                                    <tr>
                                       <td>
                                       <?=$row['user_studentID'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_username'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_password'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_email'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_fullname'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_faculty'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_department'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_tel'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_address'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_person'];?>
                                        </td>
                                        
                                        
                                        
                                        
                                        <td>
                                            <a href="delete_usernew.php?id=<?=$row['user_studentID'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
                                        </td>
                                    </tr>
                                    <?php
                             }
                          ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>


    <?php include('footer.php');?>
