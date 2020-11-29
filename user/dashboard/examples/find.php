
<?php 
    
    if(!isset($_COOKIE['un'])) {

        header('location: /dairy/user/login/login.php');
        exit();
    }
    include 'C:\xampp\htdocs\Dairy\include\connection.php';
    $table="p".$_COOKIE['un'];
    if(isset($_GET['us'])){
        $na=$_GET['us'];
        // echo $na;
        $sql="SELECT * FROM user WHERE un LIKE '%$na%'";
        $res=$conn->query($sql);
    }



    
 ?>



<html lang="en">

<head>
    
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Find</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
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
                    <li >
                        <a class="nav-link" href="dashboard.php">
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
                    <li >
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
                    <li class="nav-item active">
                        <a class="nav-link" href="./find.php">
                            <i class="nc-icon nc-zoom-split"></i>
                            <p>Find Someone</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./contest.php">
                            <i class="nc-icon nc-time-alarm"></i>
                            <p>Upcoming Contest</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./cmp.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Compare two Profile</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Find Someone </a>
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
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-5">
                            <div class="card ">
                                    <div class="card-body ">
                                        <div class="form-group">
                                            <label>Search</label>
                                            <form method="get" accept="find.php">
                                                <input type="text" class="form-control" name="us" placeholder="Handel">
                                                <br>
                                                <button type="submit"class="btn btn-info btn-fill pull-center">Submit</button>
                                            </form>
                                            

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <!-- <th scope="col">#</th> -->
                                            <th scope="col">Name</th>
                                            <th scope="col">cf</th>
                                            <th scope="col">uva</th>
                                            <th scope="col">spoj</th>
                                            <th scope="col">toph</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // if(isset($GET['us'])){
                                                while($row = $res->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<th>".$row['un']."</th>";
                                                    echo "<th><a href=https://codeforces.com/profile/".$row['cf'].">".$row['cf']."</a></th>";
                                                    echo "<th>".$row['uva']."</th>";
                                                    echo "<th>".$row['spoj']."</th>";
                                                    echo "<th>".$row['toph']."</th>";
                                                    echo "</tr>";

                                                }
                                            // }
                                            ?>
                                        </tbody>

                                    </table>
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
                            <a href="http://www.facebook.com/iammarajul">Marajul islam</a>, CSE, BSMESRTU
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
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<script src="../assets/js/plugins/chartist.min.js"></script>
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
