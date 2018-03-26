<?php
if(isset($_POST['send']))
{
    
    $kk=shell_exec("python count1.py");
echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
echo "<script>var k=".$kk.";</script>";
//echo "<script>alert(k);</script>";
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found",k.toString()+" People are detected","success");';
  echo '}, 100);</script>';
        sleep(1);
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Smart Act: Reports Reported
        </title>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                background: url("../images/lake.jpg");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
                       .in
            {
                width: 250px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border:1px solid #000;
            }
            .io
            {
                width:250px;
                height: 34px;
                outline: 0;
                font-family: "Quicksand",sans-serif;
                font-weight: bolder;
                font-size: 14px;
                background: #66b30a;
                border:0px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <form method="post">
            <br><br><br><br><br><br><br><br>
            <center> <button type="submit" name="send" class="io">Click Once</button></center>
        </form>
    </body>
</html>
