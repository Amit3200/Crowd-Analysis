<?php
include 'db.php';
session_start();
$rope=0;
$eid=0;
ini_set('max_execution_time', 0);
if(!$_SESSION['user'])
{
    header('location: Login.php');
}
else
{

    $k=$_SESSION['user'];
    $sql="select * from user where email='$k'";
    $val=$db->query($sql);
    if(isset($_POST['send']))
    {
        $loc=$_POST['location'];
        $date=$_POST['date'];
        $sql2="INSERT INTO requestsf(name,date, location) VALUES ('$k','$date','$loc');";
        //echo $sql2;
        $valu=$db->query($sql2);
        if($loc=='Rose Garden')
        {
            $kr=shell_exec("python count4.py");
        }
        else
        {
        $kr=shell_exec("python count3.py");
        }
        echo "<script>alert($kr.toString()+' People are there in that place');</script>";
        $sql4="select * from requestsf order by rid desc limit 1";
        $roex=$db->query($sql4);
        $eid=0;
         while($rowk1 = mysqli_fetch_array($roex))
        {
            $eid=$rowk1['rid'];
        }
        $sql3="update requestsf set people ='$kr' where rid='$eid'";
            $sql1="select * from admin where id=1";
            $valu1=$db->query($sql1);
        $pop1=0;
    while($rowk = mysqli_fetch_array($valu1))
    {
    $pop1=$rowk['population'];
    }
            if($kr>=$pop1)
    {
    echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found","Current Slot is full Please Visit this place after some time","warning");';
  echo '}, 100);</script>';
        sleep(1);
                $sqlp="update requestsf set Status='Crowded' where rid='$eid'";
                $valt=$db->query($sqlp);
    }
        if($kr<$pop1)
    {
  echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
  //echo '<script>alert('.$dd.');</script>';
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found","Current Time Slot is Best to Go\nPlace is Vacant and Cool You may visit now.\n"+k.toString()+" People are Detected.","success");';
  echo '}, 100);</script>';
        sleep(1);
                            $sqlp="update requestsf set Status='Vacant' where rid='$eid'";
                $valt=$db->query($sqlp);
    }
        $valu1=$db->query($sql3);
        if($valu==true)
        {
echo '<script>var k='.$kr.'</script>';
echo  '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>';
echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found",k.toString()+" People are there(approx)"'.',"success");';
  echo '}, 100);</script>';
        sleep(1);
        $rope=1;
        } 
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>
            Smart Act:Report
        </title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function kpo1()
            {
                window.location.assign("Home.php");
            }
        </script>
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

            .in {
                width: 150px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border: 2px solid #000;
            }
            .in2{
                width: 150px;
                height: 34px;
                padding: 3px;
                outline-offset: 0;
                outline: 0;
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                border: 2px solid #000;
            }
            .in3
            {
                width: 114px;
                height: 34px;
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

            .in:focus {
                border-color: #3498db;
            }

            .subdivision {
                margin-top: 40px;
                background: rgba(0, 0, 0, 0.7);
                width: 400px;
                height: 530px;
                
            }

            .pics {
                margin-top: -40px;
                margin-left: -480px;
            }

            @media screen and (max-width: 769px) {
                .subdivision {
                    width: auto;
                }
                .in .io {
                    width: auto;
                }
                .inside {
                    background: #f1c40f;
                    width: 200px;
                    height: 30px;
                    opacity: 0.7;

                }
                .content {
                    font-family: "Quicksand", sans-serif;
                    font-weight: bolder;
                    font-size: 14px;
                    margin-top: -10px;
                    border: 1px solid white;
                }
                .content:hover {
                    font-family: "Quicksand", sans-serif;
                    font-weight: bolder;
                    font-size: 14px;
                    margin-top: -10px;
                    border: 1px solid #3498db;
                }
                .serv {
                    text-decoration: none;
                    color: black;
                    cursor: pointer;
                    border: 1px solid black;
                }
                .serv:hover {
                    text-decoration: none;
                    color: white;
                }
                .cold {
                    font-family: "Quicksand", sans-serif;
                    font-weight: bolder;
                    font-size: 14px;
                    margin-top: -10px;
                    line-height: 2;
                    color: white;
                }
            }

            .content {
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border: 1px solid white;
            }

            .content:hover {
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                border: 1px solid #3498db;
            }

            .serv {
                text-decoration: none;
                color: black;
                cursor: pointer;
                border: 1px solid black;
            }

            .serv:hover {
                text-decoration: none;
                color: white;
            }

            .cold {
                font-family: "Quicksand", sans-serif;
                font-weight: bolder;
                font-size: 14px;
                margin-top: -10px;
                line-height: 2;
                color: white;
            }

            .inside {
                background: #f1c40f;
                width: 200px;
                height: 30px;
                opacity: 0.7;

            }

            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            input[type=date]::-webkit-inner-spin-button,
            input[type=date]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            .io:hover
            {
                color:white;
            }
                  @media screen and (min-width: 769px) {
            .res
            {
                width:auto;
            }
            }
            .res:focus
            {
                border:1px solid #3498db;
            }
                        
        </style>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <form method="post">
                <center>
                    <div class="subdivision"><br>
                        <div style="margin-right:-100px;"> <img src="../images/avatar1.png" width="120px" class="pics" ></div>
                        <center><h2 style="font-family:'Quicksand',sans-serif; font-size:22px;font-weight: bolder;color:white;margin-top:-60px;">Smart Found</h2></center>
                        <center><h3 style="font-family: 'Quicksand', sans-serif;color:white;font-size: 18px;font-weight: bolder;">Report Here</h3></center>
                        <br>
                        <div>
                            <table class="cold">
                        <?php while($row = mysqli_fetch_array($val)):?>
                                <tr>
                                    <th colspan="3"></th>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['firstname']?>&nbsp;<?php echo $row['lastname']?></td>
                                </tr>
                                <tr>
                                    <td>Phone No.</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['phone']?></td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                        <br>
                        <input type="text" class="in2 res" style="width: 300px;" placeholder='Location' name="location">&nbsp;<br><br>
                        <input type="date" class="in2 res" style="width: 300px;" name="date" value="2018-03-25">&nbsp;<br><br>
                        <br>
                        <button type="submit" class="io res" name="send">Submit Now</button><br><br>
                        <a href="Reportsf.php" class="io res" name="kpo" style="padding:10px 22px 10px 22px">Reports</a><br><br><br>
                         <a href="Home.php" class="io res" style="padding:10px 23px 10px 23px">Home</a>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>