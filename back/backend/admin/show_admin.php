<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel bodybke">
                <div class="x_title">
                    <h2>Show Admin</h2>
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
                                <th>No.</th>
                                    <th>Firstname-Surname</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    
                        
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $a='1';
                             $sql=" SELECT * from tb_admin";
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
                                            <?=$row['admin_fullname'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_email'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_tel'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_username'];?>
                                        </td>
                                        <td>
                                            <?=$row['admin_password'];?>
                                        </td>
                                        
                                        
                                        
                                        
                                        <td>
                                            <a href="edit_admin.php?id=<?=$row['admin_id'];?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_admin.php?id=<?=$row['admin_id'];?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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
