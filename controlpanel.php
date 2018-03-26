<?php
include 'db.php';
if(isset($_POST['send']))
{
$place=$_POST['place'];
$area=$_POST['area'];
$crowd=$_POST['pop'];
$show=($area/0.8);
$sql="insert into admin(place,area,population,calculated) values('$place','$area','$crowd','$show')";
$val=$db->query($sql);
if($val==True)
{
echo "<script>alert('Data added successfully');</script>";
}
}
if(isset($_POST['key']))
{
    $cam=1;
    $kk=shell_exec("python count3.py");
    echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
    
echo "<script>var k=".$kk.";</script>";
//echo "<script>alert(k);</script>";
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found",k.toString()+" People are detected","success");';
  echo '}, 100);</script>';
        sleep(1);
    $sql1="select * from admin where id=$cam";
    $valu1=$db->query($sql1);
    $pop1=0;
    date_default_timezone_set('Asia/Kolkata');
    while($rowk = mysqli_fetch_array($valu1))
    {
    $pop1=$rowk['population'];
    }
    //echo $pop1;
    if($kk>=$pop1)
    {
    echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found","Current Slot is full Please Visit this place after some time","warning");';
  echo '}, 100);</script>';
        sleep(1);
    }
        if($kk<$pop1)
    {
  echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
  //echo '<script>alert('.$dd.');</script>';
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found","Current Time Slot is Best to Go\nPlace is Vacant and Cool You may visit now.\n"+k.toString()+" People are Detected.","success");';
  echo '}, 100);</script>';
        sleep(1);
    }
}
if(isset($_POST['key1']))
{
    header("location: blank.php");
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Crowd Analysis:Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
        </script>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
            }

            .row.content {
                height: 550px
            }

            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            .in {
                width: 250px;

                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border: 2px solid #000;
            }

            .io {
                width: 250px;
                height: 34px;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                background: #66b30a;
                border: 0px;
            }

            .io:hover {
                color: white;
            }

            @media screen and (max-width: 767px) {
                .row.content {
                    height: auto;
                }

            }

            @media screen and (min-width: 767px) {
                .in {
                    width: auto;
                }
                .io {
                    width: auto;
                }
            }

            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse visible-xs">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
                    <a class="navbar-brand" href="#">Code Hackers</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar" style="overflow: hidden;">
                    <ul class="nav navbar-nav">
                        <li><a href="admin.php">Dashboard</a></li>
                        <li><a href="userlist.php">User List</a></li>
                        <li class="active"><a href="controlpanel.php">Control Panel</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav hidden-xs">
                    <h2>Code Hackers</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="admin.php">Dashboard</a></li>
                        <li><a href="userlist.php">User List</a></li>
                        <li class="active"><a href="controlpanel.php">Control Panel</a></li>
                    </ul><br>
                </div>
                <br>

                <div class="col-sm-9">
                    <div class="well">
                        <h4><b>Crowd Analyser</b></h4>
                        <p>System is designed to analyse the crowd using the cctv footage and live coverage of an area. The system ensures that the place doesnot get crowded and will manage the upcoming visitors. Usage of basic Data Visualization Techniques and basic Machine Learning algorithms have allowed to make this application.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="well">
                                <h4>Camera 1</h4>
                                <p><video src="..\videos\Crowd.mp4" controls width="400px" autoplay loop muted></video></p>
                                <form method="post">
                                    <button onclick="submit" class="io" style="width: 120px;" name="key">Scan</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="well" style="padding-bottom:20px;">
                                <h4>Camera 2</h4><br>
                                <center><video autoplay="true" id="videoElement" width="260px"></video></center><br>
                                <form method="post">
                                    <button type="submit" class="io" style="width: 120px;" name="key1">Detect Here</
                                button>
                            </form>
                        </div>
                         <script>
    var video = document.querySelector("#videoElement");

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

if (navigator.getUserMedia) {       
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}

function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
}

function videoError(e) {
    alert("error");
}
</script>
                    </div>
                    <div class="col-sm-12">
                        <form method="post">
                        <div class="well" style="padding-bottom:45px;">
                            <h4>Add Location</h4>
                            <input type="text" placeholder="Place Name" class="in" style="width:230px;" name="place" required><br>
                            <h4>Add Area</h4>
                            <input type="number" placeholder="Add Area(in m2)" class="in" style="width:230px;" name="area" required><br>
                            <h4>Add Assumed Overcrowded Population</h4>
                            <input type="number" placeholder="Add Population(in numbers)" class="in" style="width:230px;" name="pop" required><br><br>
                            <button type="submit" class="io" style="width: 120px;" name="send">Add Here</button>
                            </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="well">
                                    <p>Details</p>
                                    <p>WonderLand</p>
                                    <p>Data 1</p>
                                    <p>Data 2</p>
                                    <p>Data 3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>