<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel bodybke">
                <div class="x_title">
                    <h2>รายละเอียดข้อมูลพนักงาน</h2>
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
                                <th>ลำดับที่</th>
                                    <th>อาเจียน</th>
                                    <th>ไอ</th>
                                    <th>เจ็บคอ</th>
                                    <th>มีไข้สูง37องศาขึ้นไป</th>
                                    <th>ไม่มีอาการใดๆ</th>
                                    <th>วันที่</th>
                                    <th>ไอดีผู้ใช้</th>
                        
                                    <th>เเก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $a='1';
                             $sql=" SELECT * from tb_assignment";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                            //  echo $result;
                             {
                                 ?>
                                    <tr>
                                       <td>
                                           <?=$a++;?>
                                        </td>
                                        <td>
                                            <?=$row['assignment_vomit'];?>
                                        </td>
                                        <td>
                                            <?=$row['assignment_cough'];?>
                                        </td>
                                        <td>
                                            <?=$row['assignment_sore_throat'];?>
                                        </td>
                                        <td>
                                            <?=$row['assignment_temp37'];?>
                                        </td>
                                        <td>
                                            <?=$row['assignment_no_symptoms'];?>
                                        </td>
                                        <td>
                                            <?=$row['assignment_date'];?>
                                        </td>
                                        <td>
                                            <?=$row['user_id'];?>
                                        </td>
                                        
                                        
                                        
                                        
                                        <td>
                                            <a href="edit_assignment.php?id=<?=$row['assignment_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_assignment.php?id=<?=$row['assignment_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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
