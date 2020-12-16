<!DOCTYPE html>
<html>
<head>
   <title>Student</title>
    <link type="image/ico" href="assets/image/favicon.ico" rel="icon">
<script src="include/mfs100-9.0.2.6.js"></script>
<script src="include/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script language="javascript" type="text/javascript">
        

        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

       function Capture() {
            try {
                <?php $rno=$_GET['id'];?>
                var rno = "<?php echo $rno; ?> ";
                document.getElementById('txtStatus').value = "";
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
                document.getElementById('txtIsoTemplate').value = "";
                var res = CaptureFinger(quality, timeout);

                if (res.httpStaus) {

                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                    if (res.data.ErrorCode == "0") {
                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                        res.data.IsoTemplate=encodeURIComponent(res.data.IsoTemplate);
                        window.location.href="store.php?tmp="+res.data.IsoTemplate+"&rid="+rno;
                        
                    }
                }
                else {
                    alert(res.err);
                     }
            }
            catch (e) {
                alert(e);
            }
            return false;
        }

    </script>

    <link rel="stylesheet" type="text/css" href="sty.css">
</head>
<body>
     <div  class="img" style="margin-left: 25%;">
        <img id="imgFinger" style="" alt="Finger Image" />
        <input type="text" value="" id="txtStatus" style="display: none;" />
        <textarea id="txtIsoTemplate" style="display: none;" ></textarea>
        <br><br><br>
        <input type="submit" NAME="register" id="buttonreg" value="Capture" onclick="return Capture()" />
    </div>

</body>
</html>