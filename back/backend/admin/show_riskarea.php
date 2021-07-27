<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel bodybke">
                <div class="x_title">
                    <h2>รายละเอียดข้อมูลพื้นที่เสี่ยง</h2>
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
                                    <th>ชื่อสถานที่เสี่ยง</th>
                                    <th>พิกัดสถานที่เสี่ยง</th>
                                    <th>รายละเอียดพื้นที่เสี่ยง</th>
                                    <th>วันที่</th>
                                    <th>พบพื้นที่เสี่ยง</th>
                                    <th>สถานะ</th>
                                    <th>ไอดีผู้ดูแล</th>
                        
                                    <th>เเก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $a='1';
                             $sql=" SELECT * from tb_riskarea";
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
                                            <?=$row['riskarea_name'];?>
                                        </td>
                                        <td>
                                            <?=$row['riskarea_gps'];?>
                                        </td>
                                        <td>
                                            <?=$row['riskarea_detail'];?>
                                        </td>
                                        <td>
                                            <?=$row['riskarea_date'];?>
                                        </td>
                                        <td>
                                            <?=$row['riskarea_found'];?>
                                        </td>
                                        <td>
                                            <?=$row['riskarea_status'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_id'];?>
                                        </td>
                                        
                                        
                                        
                                        <td>
                                            <a href="edit_riskarea.php?id=<?=$row['riskarea_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_riskarea.php?id=<?=$row['riskarea_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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
