<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel bodybke">
                <div class="x_title">
                    <h2>รายละเอียดข้อมูลโรคระบาด</h2>
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
                                    <th>หัวข้อโรคระบาด</th>
                                    <th>เนื้อหาโรคระบาด</th>
                                    <th>รูปภาพโรคระบาด</th>
                                    <th>วันที่เนื้อหา</th>
                                    <th>สถานะ</th>
                                    <th>ไอดีผู้ดูแล</th>
                                    
                        
                                    <th>เเก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $a='1';
                             $sql=" SELECT * from tb_epidemic";
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
                                            <?=$row['epidemic_topic'];?>
                                        </td>
                                        <td>
                                            <?=$row['epidemic_content'];?>
                                        </td>
                                        <td width="10%" >
                                            <a data-toggle="modal" data-target="#myModal<?= $row['epidemic_id'] ?>"><img src="../epidemic_upload/<?=$row['epidemic_image'];?>"  width="100%"></a>
                                        </td>
                                        <td>
                                            <?=$row['epidemic_date'];?>
                                        </td>
                                        <td>
                                            <?=$row['epidemic_status'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_id'];?>
                                        </td> 
                                        
                                        <td>
                                            <a href="edit_epidemic.php?id=<?=$row['epidemic_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_epidemic.php?id=<?=$row['epidemic_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
                                        </td>
                                    </tr>
                                    
                                    <div class="modal fade" id="myModal<?= $row['epidemic_id'] ?>" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <form method="POST" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">แก้ไขรูป</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <br> <br>
                                                <div class="modal-body">
                                                    <div class="col-sm-12 col-md-10">
                                                        <input class="form-control" type="file" name="pic" placeholder="กรอกจำนวน">
                                                    </div>
                                                </div>
                                                <br> <br> <br>
                                                <div class="modal-footer" align="left">
                                                    <button type="submit" name="submit" value="<?= $row['epidemic_id'] ?>" class="btn btn-default">ยืนยัน</button>
                                                </div>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                               
                                    <?php
                             }
                          ?>
                          <?php if(isset($_POST['submit'])){
                            //   $pic = $_POST['pic'];
                              $id = $_POST['submit'];

                              $sql = "UPDATE tb_epidemic set";
                              if ($_FILES["pic"]["name"] != "") {

                                $datetime = date("dmYHis");
                                $file_name = substr($_FILES['pic']['name'], -4);
                                $pic = $datetime . '_p1' . $file_name;
                                move_uploaded_file($_FILES["pic"]["tmp_name"], "../epidemic_upload/" . $pic);
                                }
                                
                            $sql .=" epidemic_image = '$pic' where epidemic_id = '$id' ";
                            $cls_conn->write_base($sql);
                            // echo $sql;
                            echo $cls_conn->goto_page(1,'show_epidemic.php');


                          } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>


    <?php include('footer.php');?>
