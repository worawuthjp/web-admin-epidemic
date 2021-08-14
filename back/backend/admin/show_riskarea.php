<?php include('header.php'); ?>
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
                            <th>วันที่เริ่มเข้าพื้นที่</th>
                            <th>วันที่ออกจากพื้นที่</th>
                            <th>สถานะของพื้นที่</th>
                            <th>ผู้ดูแล</th>

                            <th>เเก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://lotto.myminesite.com/timeline/getRiskArea.php',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                        ));

                        echo $curl;
                        $response = curl_exec($curl);

                        curl_close($curl);
                        $a = 1;
                        $res = json_decode($response);
                        ?>
                        <?php
                        foreach ($res->data as $index => $row) {
                        ?>
                            <tr>
                                <td>
                                    <?= $a++ ?>
                                </td>
                                <td>
                                    <?= $row->riskarea_name  ?>
                                </td>
                                <td>
                                    <?= $row->latitude . "," . $row->longtitude ?>
                                </td>
                                <td>
                                    <?php
                                    $date = new DateTime($row->startDate);
                                    echo $date->format('d-m-Y H:i')
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $date = new DateTime($row->endDate);
                                    echo $date->format('d-m-Y H:i');
                                    ?>
                                </td>
                                <td>
                                    <?= $row->status_name  ?>
                                </td>
                                <td>
                                    <?= $row->admin_fullname ?>
                                </td>

                                <td style="text-align:center">
                                    <a href="edit_riskarea.php?id=<?= $row->riskarea_id ?>" onclick="return confirm('Do you want to edit?')"><img src="../image/edit.png" /></a>
                                </td>
                                <td style="text-align:center">
                                    <a href="delete_riskarea.php?id=<?= $row->riskarea_id ?>" onclick="return confirm('Do you want to delete?')"><img src="../image/delete.png" /></a>
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

<?php include('footer.inc.php'); ?>
<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
</body>

</html>