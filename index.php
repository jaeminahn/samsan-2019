<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet" type="text/css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118796998-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118796998-2');
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-barcode.js"></script>

    <script type="text/javascript">
        function setCookie(cookie_name, value, days) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + days);
            // 설정 일수만큼 현재시간에 만료값으로 지정

            var cookie_value = escape(value) + ((days == null) ? '' : ';    expires=' + exdate.toUTCString());
            document.cookie = cookie_name + '=' + cookie_value;
        }

        function getCookie(cookie_name) {
            var x, y;
            var val = document.cookie.split(';');

            for (var i = 0; i < val.length; i++) {
                x = val[i].substr(0, val[i].indexOf('='));
                y = val[i].substr(val[i].indexOf('=') + 1);
                x = x.replace(/^\s+|\s+$/g, ''); // 앞과 뒤의 공백 제거하기
                if (x == cookie_name) {
                    return unescape(y); // unescape로 디코딩 후 값 리턴
                }
            }
        }
    </script>

    <title>삼산고 모바일 학생증</title>
</head>
<body>
    <div style="text-align:center">
            <img src = "logo.png" alt="logo">
            <br>

            <div style="background-color:#6E6E6E">
                <span style="color:white;font-family:Nanum Gothic;"><b> 모바일 학생증 </b></span>
            </div>

        <div style="font-family:Nanum Gothic;"><b>
        <p id="time-result"></p>
        </b></div>
        <li style="font-family:Nanum Gothic; line-height:2.3em; box-sizing: border-box; display: inline-block; text-align: center; background-color: #ffffff; border: 1px solid #dbe3e7; border-radius: 3px; box-shadow: 1px 3px 1px rgba(0, 0, 0, 0.08); margin: auto 0 0; padding: auto; width: 80%">
            <?php
                $countryCode = 'stu.use.go.kr';
                $schulCode = 'H100000562';
                $insttNm = '삼산고등학교';
                $schulCrseScCode = '4';
                $schMmealScCode = '3';

                $_GET["countryCode"] = $countryCode;
                $_GET["schulCode"] = $schulCode;
                $_GET["insttNm"] = $insttNm;
                $_GET["schulCrseScCode"] = $schulCrseScCode;
                $_GET["schMmealScCode"] = $schMmealScCode;

                include 'meal.php'; 
            ?>
        </li>

        <br><br><br>
    </div>


    <div style="position:absolute; bottom:40px; left:50%; transform:translate(-50%, -50%)">
        <div id="bcTarget"></div>
    </div>

    <div style="position:absolute; bottom:20px; left:50%; transform:translate(-50%, -50%)">
        <button class="generate" onClick="generateBarcode()" style="border-radius: 2px; background-color: #2478FF; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12); border: 0; color: #ffffff; font-weight: bold; font-size: 13px; cursor: pointer; width: 110px; height: 32px; border: 0; outline: 0;font-family:Nanum Gothic;">바코드 생성</button>
    </div>

</body>

<script type="text/javascript">
    $("#bcTarget").barcode(getCookie('code'), "code39", {barWidth: "2.5", barHeight: "60"});
    
    function generateBarcode()
    {
        setCookie('code', prompt("학생증 뒷면 바코드 하단의 코드를 입력하세요."), '1095');
        $("#bcTarget").barcode(getCookie('code'), "code39", {barWidth: "2.5", barHeight: "60"});
    }
</script>

<script type="text/javascript">
    var d = new Date();
    var currentDate = d.getFullYear() + "년 " + ( d.getMonth() + 1 ) + "월 " + d.getDate() + "일";
    var result = document.getElementById("time-result");
    result.innerHTML = currentDate;
</script>

</html>