<?php
    
     if(!isset($_COOKIE['un'])) {

        header('location: /dairy/user/login/login.php');
        exit();
    }
    
    function s2d( $sec ) 
    {
        $m=(int)($sec/60);
        $s=$sec%60;
        $h=(int)($m/60);
        $m=$m%60;
        $d=(int)($h/24);
        $h=$h%24;
        if($d==0) {
            $str=$h."H : ".$m."M";
            // if($h<=9) $str="0".$h;
            // else $str=$h;
            // if($m<=9) $str+=" : 0".$m;
            // else $str+=" : ".$m;
            return $str;
            // echo $str;
        }
        else{
            $str=$d." days";
            return $str;
            // echo $str;
        }
    }
    $ab=time();
    $bc=gmdate("Y-m-d H:i:s",(string)$ab);
    $bc=urlencode($bc);
    $url="https://clist.by/api/v1/contest/?limit=10000&start__gt=".$bc."&order_by=start&format=json&username=Iammarajul&api_key=bd7025ab49a3a6d0d12830ea08ccba31190d52e5";
    $json = file_get_contents($url);
    $obj = json_decode($json,true);
    // var_dump($obj);
    $con=$obj['objects'];

    $judge=array('hackerearth.com' =>'Hackerearth' ,'atcoder.jp' =>'Atcoder' ,'codechef.com' =>'Codechef' ,'leetcode.com' =>'Leetcode' ,'codeforces.com' =>'Codeforces' ,'toph.co' =>'Toph');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Upcoming Contest</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
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
                    <li class="nav-item">
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
                    <li class="nav-item">
                        <a class="nav-link" href="./table.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>All submission</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./lastunsolved.php">
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
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-time-alarm"></i>
                            <p>Upcoming Contest</p>
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
                    <a class="navbar-brand" href="#pablo"> Upcoming Contest </a>
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

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 align="Center" class="card-title">Upcoming Contest</h4>
                                    <p align="Center" class="card-category">Notified before contest</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th > Start Date</th>
                                            
                                            <th>Judge</th>
                                            <th >Duration</th>
                                            <th>Time left</th>
                                            <th >Contest Name</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($con as $key) {
                                                    if(isset($judge[$key['resource']['name']])){
                                                    echo "<tr>"; 
                                                    echo "<th>".$key['start']."</th>";
                                                    echo "<th><img src='./judgeImage/".$judge[$key['resource']['name']].".png' height='42' width='42'></th>";
                                                    echo "<th>".s2d($key['duration'])."</th>";
                                                    echo "<th>Working</p></th>";

                                                    echo "<th><a href=".$key['href'].">".$key['event']."</th>";
                                                    echo "</tr>";    
                                                    }                
                                                }

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
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>

    </div>
</body>
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="../assets/js/plugins/chartist.min.js"></script>
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        demo.initGoogleMaps();

    });
</script>

<script>

var countDownDate = new Date("<?php echo $key['start'] ?>").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</html>
