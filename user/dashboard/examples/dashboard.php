
<?php 
    
    if(!isset($_COOKIE['un'])) {

        header('location: /dairy/user/login/login.php');
        exit();
    }
    include 'C:\xampp\htdocs\Dairy\include\connection.php';
    $table="p".$_COOKIE['un'];

    $res1=array();
    $query = "SELECT * FROM $table WHERE oj='cf' and ver='Accepted'";
    $results = $conn->query($query);
    array_push($res1, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='spoj' and ver='Accepted'";
    $results = $conn->query($query);
    array_push($res1, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='uva' and ver='Accepted'";
    $results = $conn->query($query);
    array_push($res1, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='loj' and ver='Accepted'";
    $results = $conn->query($query);
    array_push($res1, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='toph' and ver='Accepted'";
    $results = $conn->query($query);
    array_push($res1, $results->num_rows);

    $res2=array();
    $query = "SELECT * FROM $table WHERE ver='Accepted'";
    $results = $conn->query($query);
    array_push($res2, $results->num_rows);
    $query = "SELECT * FROM $table WHERE ver='Wrong Answer'";
    $results = $conn->query($query);
    array_push($res2, $results->num_rows);
    $query = "SELECT * FROM $table WHERE ver='Time Limit Exceeded'";
    $results = $conn->query($query);
    array_push($res2, $results->num_rows);
    $query = "SELECT * FROM $table WHERE ver='Compilation Error'";
    $results = $conn->query($query);
    array_push($res2, $results->num_rows);
    $query = "SELECT * FROM $table WHERE ver='Runtime Error'";
  	$results = $conn->query($query);
    array_push($res2, $results->num_rows);
    $query = "SELECT * FROM $table WHERE ver='Memory Limit Exceeded'";
    $results = $conn->query($query);
    array_push($res2, $results->num_rows);

    $res3=array();
    $query = "SELECT * FROM $table WHERE oj='cf'";
    $results = $conn->query($query);
    array_push($res3, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='spoj'";
    $results = $conn->query($query);
    array_push($res3, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='uva'";
    $results = $conn->query($query);
    array_push($res3, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='loj'";
    $results = $conn->query($query);
    array_push($res3, $results->num_rows);
    $query = "SELECT * FROM $table WHERE oj='toph'";
    $results = $conn->query($query);
    array_push($res3, $results->num_rows);

    for ($i=0; $i <=4; $i++) { 
        # code...
        // echo $res3[$i]." ";
        $res3[$i]=((double)$res1[$i]/(double)$res3[$i])*100;
    }

    
    $tme=time();
    // echo $tme;
    $res4=array();
    for($i=0;$i<12;$i++){
        $tk=$tme-(30*24*60*60);
        // echo $tk." ";
        $sql="SELECT * from $table where dt>=$tk and dt<=$tme and ver='Accepted'";
        $results = $conn->query($sql);
        array_push($res4, $results->num_rows);
        // echo $results->num_rows;
        $tme=$tk;

    }


    
 ?>



<html lang="en">

<head>
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>DashBoard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" >
           
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/" class="simple-text">
                        Programmer's Dairy
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>All submission</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./lastUnsolved.php">
                            <i class="nc-icon nc-simple-remove"></i>
                            <p>Last Unsolved</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./icons.html">
                            <i class="nc-icon nc-atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">
                                         
                                            <?php
                                               echo $_COOKIE['un'];
                                           ?>
                                    </span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="ab.php">
                                    <span class="no-icon">LogOut
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Verdict Rate</h4>
                                    <p class="card-category">Based on previous submission</p>
                                </div>
                                <div class="card-body ">
                                    <canvas id="myChart"  width="370" height="400" ></canvas>
                                        <script>
                                        var ctx = document.getElementById("myChart");
                                        var myChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ["Accepted",
                                                "Wrong Answer",
                                                "Time limit",
                                                "Compile error",
                                                "Memory limit",
                                                "Runtime error"],
                                            datasets: [{
                                            label: '# of Tomatoes',
                                            data: [<?php echo $res2[0]; ?>, <?php echo $res2[1]; ?>, <?php echo $res2[2]; ?>, <?php echo $res2[3]; ?>,<?php echo $res2[5]; ?>,<?php echo $res2[4]; ?>],
                                            backgroundColor: [
                                                'rgb(128,255,149)',
                                                'red',
                                                'yellow',
                                                '#6666FF',
                                                '#808080',
                                                '#FFCCFF'
                                            ],
                                            borderColor: [                                       
                                            ],
                                            borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            cutoutPercentage: 40,
                                            responsive: false,

                                        }
                                        });
                                        </script>
                                        
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Solve Count</h4>
                                    <p class="card-category">All performance</p>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <td scope="col">
                                                Codeforcs
                                            </td>
                                            <td scope="col">
                                                Spoj
                                            </td>
                                            <td scope="col">
                                                Uva
                                            </td>
                                            <td scope="col">
                                                Light Oj
                                            </td>
                                            <td scope="col">
                                                Toph
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $res1[0] ?></td>
                                                <td><?php echo $res1[1] ?></td>
                                                <td><?php echo $res1[2] ?></td>
                                                <td><?php echo $res1[3] ?></td>
                                                <td><?php echo $res1[4] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td><?php echo $res1[0]+$res1[1]+$res1[2]+$res1[3]+$res1[4] ?></td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer ">
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Accuracy</h4>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <td scope="col">
                                                Codeforcs
                                            </td>
                                            <td scope="col">
                                                Spoj
                                            </td>
                                            <td scope="col">
                                                Uva
                                            </td>
                                            <td scope="col">
                                                Light Oj
                                            </td>
                                            <td scope="col">
                                                Toph
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo (int)$res3[0]."%"; ?></td>
                                                <td><?php echo (int)$res3[1]."%"; ?></td>
                                                <td><?php echo (int)$res3[2]."%"; ?></td>
                                                <td><?php echo (int)$res3[3]."%"; ?></td>
                                                <td><?php echo (int)$res3[4]."%"; ?></td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer ">
                                   
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Month wise Submission</h4>
                                </div>
                                
                                <div class="card-body">
                                    <canvas id="buyers" width="1000" height="400"></canvas>
                                </div>

                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>

<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<script src="../assets/js/demo.js"></script>
<script>
            // line chart data
            var buyerData = {
                labels : ["January","February","March","April","May","June","july","august","september","octomber","nobember","December"],
                datasets : [
                {
                    fillColor : "rgb(170,153,255,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [<?php  foreach ($res4 as $key) {
                        echo $key.",";
                    }?>]
                }


                ]  


            }
            var buyers = document.getElementById('buyers').getContext('2d');
            new Chart(buyers).Line(buyerData);
           
            
</script>


</html>
