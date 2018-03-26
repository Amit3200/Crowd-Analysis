<?php
include 'db.php';
$sql="select * from user";
$val=$db->query($sql);
 $rowcount=mysqli_num_rows($val);
$sql1="select * from pays";
$val1=$db->query($sql1);
 $rowcount1=mysqli_num_rows($val1);
$sql2="select * from requestsf order by rid desc limit 5";
$val2=$db->query($sql2);


if(isset($_POST['send']))
{
    $KO=$_POST['geto'];
    header("location: Allsearch.php?name=$KO");
}
if(isset($_POST['op']))
{
    shell_exec("python barmap1.py");
    echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Found","Currently Analysis for a day is done and We can observe the peak hours in the graphical  image.","success");';
    echo '}, 100);</script>';
    sleep(1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Found:Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body
        {
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
        .io:hover{
            color:white;
        }
        @media screen and (max-width: 767px) {
            .row.content {
               height: auto;
            }

        }
         @media screen and (min-width: 767px) {
         .in
            {
                width: auto;
            }
            .io
            {
                width: auto;
            }
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
            <div class="collapse navbar-collapse" id="myNavbar"  style="overflow: hidden;">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="controlpanel.php">Control Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Code Hackers</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="admin.php">Dashboard</a></li>
                    <li><a href="userlist.php">User List</a></li>
                    <li><a href="controlpanel.php">Control Panel</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">
                    <h4><b>Crowd Analyser</b></h4>
                    <p>System is designed to analyse the crowd using the cctv footage and live coverage of an area. The system ensures that the place doesnot get crowded and will manage the upcoming visitors. Usage of basic Data Visualization Techniques and basic Machine Learning algorithms have allowed to make this application.</p>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="well">
                            <h4>Enter Visitor Id</h4>
                            <form method="post">
                            <input type="text" name="geto" placeholder="Enter Visitor Id" class="in" required><br><br>
                            <button type="submit" class="io" name="send">Search</button>
                            </form>    
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well" style="padding-bottom:45px;">
                            <h4>User Count</h4>
                            <p>User Counts<p>
                            <p><?php echo $rowcount?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well" style="padding-bottom:20px;">
                            <h4>Total Visitings</h4><br>
                            <p><?php echo $rowcount1?></p>
                            <button onclick="op()" class="io">Show Details</
                                button>
                            <script>
                                function op()
                                {
                                    window.location.assign("pays.php");
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Places</p>
                            <p>WonderLand</p>
                            <p>Kolkata</p>
                            <p>Rock Garden</p>
                            <p>Live Footage</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="well">
                             <?php while($row = mysqli_fetch_array($val2)):?>
                            <p><?php echo $row['Status']?>&nbsp; ID#<?php echo $row['rid']?></p>
                            <?php endwhile?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Trace Recent Payments</p>
                            <form method="post">
                            <button name="op" type="submit" class="io">Trace Crowd</button><br><br>
                            <button type="button" data-toggle="modal" data-target="#myModal" class="io">Trace Records</button>
                            </form>
                            <br><p>Records</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reports View (Kolkata)</h4>
      </div>
      <div class="modal-body">
          <p><center><img src="output.png" width="500px"></center></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>

</html>