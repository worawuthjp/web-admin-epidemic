<?php
include("../../../constant.php");
if (isset($_POST['submit'])) {
    $curl = curl_init();
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);
    $startDateServer =  $startDate->format("Y-m-d H:i:s");
    $endDateServer =  $endDate->format("Y-m-d H:i:s");
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $HOST.'/timeline/editRiskArea.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('placeName' => $_POST['placeName'], 'placeID' => $_POST['placeID'], 'lat' => $_POST['lat'], 'long' => $_POST['long'], 'startDate' => $startDateServer, 'endDate' => $endDateServer, 'id' => $_POST['id'], 'statusID' => $_POST['statusID']),
    ));


    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    if ($result->msg == 'success') {
        header('location:./show_riskarea.php');
        // echo $sql;
    }
}
?>
<?php include('header.php'); ?>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font: 16px Arial;
        height: 100%;
    }

    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }


    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>????????????????????????????????????????????????????????????????????????</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <?php
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $HOST."/timeline/getRiskArea.php?id={$_GET['id']}",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                    ));

                    $response = curl_exec($curl);
                    curl_close($curl);
                    $result = json_decode($response);
                    $row = $result->data[0];
                    ?>
                    <form action='./edit_riskarea.php' id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                        <input type="hidden" name="lat" id="lat" value="<?php echo $row->latitude ?>">
                        <input type="hidden" name="long" id="long" value="<?php echo $row->longtitude ?>">
                        <input type="hidden" name="placeID" id="placeId" value="<?php echo $row->placeID ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo $row->riskarea_id ?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">???????????????????????????????????????????????????<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 autocomplete">
                                <input autocomplete="off" value="<?php echo $row->riskarea_name ?>" onkeyup="searchArea(event)" id="myInput" type="text" name="placeName" placeholder="????????????????????????????????????????????????" class="form-control col-md-10 col-xs-12" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">??????????????????????????????????????????????????????????????????<span class="required">:</span> </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="datetime-local" value="<?php $date = new DateTime($row->startDate);
                                                                    echo $date->format('Y-m-d\TH:i')  ?>" id="datePick" name="startDate" required="required" class="form-control col-md-4 col-xs-5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">?????????????????????????????????????????????????????????<span class="required">:</span> </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="datetime-local" value="<?php $date = new DateTime($row->endDate);
                                                                    echo $date->format('Y-m-d\TH:i') ?>" id="datePick" name="endDate" required="required" class="form-control col-md-4 col-xs-5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">??????????????????????????????????????????????????????<span class="required">:</span> </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <?php
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => $HOST.'/timeline/getStatus.php',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'GET',
                                ));

                                $response = curl_exec($curl);

                                curl_close($curl);
                                $status = json_decode($response);
                                ?>
                                <select id="status" name="statusID" class="form-control col-md-4 col-xs-5">
                                    <?php
                                    foreach ($status->data as $list) {
                                    ?>
                                        <option <?= $row->status_id === $list->status_id ? 'selected' : '' ?> value="<?= $list->status_id ?>"><?= $list->status_name  ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <style type="text/css">
                            /* css ?????????????????? div ???????????? google map ??????????????? */
                            /* css ?????????????????????????????????????????? ???????????????????????????????????????????????? */
                            #map_canvas {
                                height: 400px;
                                width: 100%;
                                /*  margin-top:100px;*/
                            }
                        </style>

                        <div class="container">
                            <!-- <h1><a href="index.php">Google Map API 3</a></h1>-->

                            <div class="row mb-5">
                                <div class="col">
                                    <div id="map_canvas"></div>
                                </div>
                            </div>

                        </div>


                        <?php
                        $locations[] = array(1, '???????????????????????????????????????', '13.7278956', '100.52412349999997', 13);
                        ?>
                        <div class="ln_solid"></div>
                        <div class="form-group " style="text-align: center;">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="submit" class="btn btn-success">??????????????????</button>
                                <a href="insert_riskarea.php" class="btn btn-danger">??????????????????</a>
                                <!-- <button type="reset" name="reset" class="btn btn-danger">??????????????????</button> -->
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.inc.php'); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $API_MAP_KEY ?>&callback=initialize&libraries=&v=weekly" async></script>

<script type="text/javascript">
    function initialize(lat = null, long = null) {
        var lat1 = document.getElementById('lat').value;
        var long1 = document.getElementById('long').value;
        // The location of Uluru

        const uluru = {
            lat: lat ? lat : parseFloat(lat1),
            lng: long ? long : parseFloat(long1)
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 15,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });

    };


    function getMapAutoComplete(textSearch, e) {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        fetch(`<?php echo $HOST?>/map/mapApi.php?input=${textSearch}`, requestOptions)
            .then(response => response.text())
            .then(result => {
                autocomplete(document.getElementById("myInput"), JSON.parse(result), e)
            })
            .catch(error => console.log('error', error));
    }

    function searchArea(e) {
        let word = e.target.value;
        getMapAutoComplete(word, e);
    }


    function autocomplete(inp, arr, e) {
        var currentFocus;
        var a, b, i, val = e.target.value;
        console.log(e)
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items form-control col-md-7 col-xs-12");
        /*append the DIV element as a child of the autocomplete container:*/
        e.target.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.predictions.length; i++) {
            const place = arr.predictions[i].description;
            /*check if the item starts with the same letters as the text field value:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = place;
            console.log(place);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' id ='placeName' value='" + arr.predictions[i].description + "'>";
            b.innerHTML += "<input type='hidden' id ='placeId' value='" + arr.predictions[i].place_id + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                const placeId = this.getElementsByTagName("input")[1].value


                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };

                fetch(`<?php echo $HOST?>/map/getPlaceDetail.php?placeID=${placeId}`, requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        const res = JSON.parse(result)
                        initialize(res.result.geometry.location.lat, res.result.geometry.location.lng)
                        document.getElementById("lat").value = res.result.geometry.location.lat
                        document.getElementById("long").value = res.result.geometry.location.lng
                        document.getElementById("placeId").value = res.result.place_id
                    })
                    .catch(error => console.log('error', error));



                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
        }


        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }
</script>
</body>

</html>