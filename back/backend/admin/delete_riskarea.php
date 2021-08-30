   <?php
   include '../../../constant.php';
   if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $HOST.'/timeline/deleteRiskArea.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id' => $id),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response);
        if ($res->msg === 'success') {
            header('location:./show_riskarea.php');
        }
    }
    ?>
