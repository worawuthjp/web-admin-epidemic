<?php include('header.php'); ?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>QR Code</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="text-align: center">
                        <br />
                        <h3>โปรดแสกน QR Code เพื่อยืนยันตัวตนก่อนเข้าอาคารเรียน</h3>
                        <div id="qr-reader" style="width: 500px;display: inline-block" ></div>
                        <div id="qr-reader-results" class="result-scan"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.0.3/html5-qrcode.min.js" integrity="sha512-uOj9C1++KO/GY58nW0CjDiUjLKWQG4yB/NJMj3PtJNmFA52Hg56lojRtvBpLgQyVByUD+1M3M/1tKdoGDKUBAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);

                //fetch data api
                var myHeaders = new Headers();
                myHeaders.append("Content-Type", "text/plain; charset=UTF-8");

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow'
                };

                fetch(`<?php echo $HOST?>/getdata/getuserdatabase.php?id=${decodedText}`, requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        console.log(result)
                        let obj = JSON.parse(result)
                        let user = obj !== [] ? obj[0] : {}
                        user.allows.isAllow = false
                        let html_code = `<span>${user.user_fullname} รหัสนักศึกษา ${user.user_studentID}</span><br>${user.allows.isAllow ? '<span class="allow">ยืนยันตัวตนสำเร็จ</span>' : '<span class="not-allow">ยืนยันตัวตนไม่สำเร็จ โปรดติดต่อคณะวิทยาศาสตร์</span>' }`;
                        html_code += `<div class="epidemic">สถานที่เสี่ยงที่เพิ่งเช็คอินช่วง 14-28 วัน : <ul>${user.allows.places.map((item)=>{return `<li>${item.riskarea_name} <br>เสี่ยงโรคติดต่อ : ${item.epidemic_topic}</li>`})}</ul></div>`
                        resultContainer.innerHTML= html_code
                    })
                    .catch(error => console.log('error', error));
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250,aspectRatio: 1.777778 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
<?php include('footer.php'); ?>