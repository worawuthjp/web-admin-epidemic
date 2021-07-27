<?php include('header.php'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แบบฟอร์มตรวจสอบความเสี่ยง</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >อาเจียน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="idcard" name="vomit" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value=""></option>
                                    <option value="เป็น">เป็น</option>
                                    <option value="ไม่เป็น">ไม่เป็น</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >ไอ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="idcard" name="cough" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                                    <option value="เป็น">เป็น</option>
                                    <option value="ไม่เป็น">ไม่เป็น</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >เจ็บคอ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="idcard" name="sorethroat" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                                    <option value="เป็น">เป็น</option>
                                    <option value="ไม่เป็น">ไม่เป็น</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">มีไข้สูง37องศาขึ้นไป<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="temp37" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                                    <option value="เป็น">เป็น</option>
                                    <option value="ไม่เป็น">ไม่เป็น</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไม่มีอาการใดๆ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="nosymptoms" required="required" class="form-control col-md-7 col-xs-12">
                                <option value=""></option>
                                    <option value="เป็น">เป็น</option>
                                    <option value="ไม่เป็น">ไม่เป็น</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">วันที่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="name" name="date" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ไอดีผู้ใช้<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="name" name="userid" required="required" class="form-control col-md-7 col-xs-12">
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
                        <a href="show_assignment.php" class="btn btn-danger">ยกเลิก</a>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button> -->
                    </div>
                </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $vomit = $_POST['vomit'];
                    $cough = $_POST['cough'];
                    $sorethroat = $_POST['sorethroat'];
                    $temp37 = $_POST['temp37'];
                    $nosymptoms = $_POST['nosymptoms'];
                    $date = $_POST['date'];
                    $userid = $_POST['userid'];

                    $sql = " insert into tb_assignment(assignment_vomit,assignment_cough,assignment_sore_throat,assignment_temp37,assignment_no_symptoms,assignment_date,user_id)";
                    $sql .= " values ('$vomit','$cough','$sorethroat','$temp37','$nosymptoms','$date','$userid')";

                    if ($cls_conn->write_base($sql) == true) {
                        echo $cls_conn->show_message('Success');
                        echo $cls_conn->goto_page(1, 'show_assignment.php');
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