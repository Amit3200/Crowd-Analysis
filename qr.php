<?php
include 'db.php';
include('phpqrcode/qrlib.php'); 
session_start();
$rope=0;
if(!$_SESSION['user'])
{
    header('location: Login.php');
}
else
{
    
    $k=$_SESSION['user'];
    $sql="select * from user where email='$k'";
    $folder="../images/";
    $val=$db->query($sql);
    if(isset($_POST['send']))
    {
        $loc=$_POST['bal'];
        $total=$_POST['card'];
        $date=$_POST['cvv'];
        $text1='';
        $folder="../images/";
        $sql1="insert into pays(email,place,people,date) values('$k','$loc','$total','$date')";
        $val=$db->query($sql1);
    $sql5="select * from pays ORDER BY id desc";
    $go=$db->query($sql5);
    $unique=0;
    while($rowk = mysqli_fetch_array($go))
    {
    $unique=$rowk['id'];
    break;
    }
    $file_name=$unique.".png";
    $text=(string)$unique."\n";
    $text.=(string)$loc."\n";
    $file_name=$folder.$file_name;
    QRcode::png($text,$file_name);
    shell_exec("python msg1.py");    
    header("location: Show.php?name='$loc'&go='$unique'");
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Crowd Analysis
        </title>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                font-family: "Quicksand", sans-serif;
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
                margin-top: 100px;
                background: rgba(0, 0, 0, 0.7);
                width: 400px;
                height: 450px;
            }

            .pics {
                margin-top: -100px;
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
                        <img src="../images/avatar1.png" width="120px" class="pics" align="left">
                        <h2 style="font-family:'Quicksand',sans-serif; font-size:22px;color:white;">Crowd Analysis</h2>
                        <h3 style="font-family: 'Quicksand', sans-serif;color:white;font-size: 18px;">Enter Place :
                            <input type="text" placeholder="Enter Place" style="background: none;border: none;border-bottom:2px solid black;color:white;" class="in3" name="bal" required></h3>
                        <br>
                        <div>
                            <?php while($row = mysqli_fetch_array($val)):?>
                            <table class="cold">
                                <tr>
                                    <th colspan="3"></th>
                                </tr>
                                <tr>
                                    <td style="font-family:'Quicksand',sans-serif; font-size:16px;color:white;">Name</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td style="font-family:'Quicksand',sans-serif; font-size:16px;color:white;"><?php echo $row['firstname']?>&nbsp;<?php echo $row['lastname']?></td>
                                </tr>
                                <tr>
                                    <td style="font-family:'Quicksand',sans-serif; font-size:16px;color:white;">Phone</td>
                                    <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td style="font-family:'Quicksand',sans-serif; font-size:16px;color:white;"><?php echo $row['phone']?></td>
                                </tr>
                            </table>
                            <?php endwhile ?>
                        </div>
                        <br>
                        <input type="number" class="in res" style="width: 300px;" placeholder="Enter No. of People" name="card">
                        <br><br>
                        <input type="date" class="in2 res" required style="width:300px;" name="cvv" value="2018-03-25">
                        <br><br>
                        <button class="io res" name="send">Book Now</button>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>