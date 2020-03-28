
<?php 
    
    if(!isset($_COOKIE['un'])) {
        header('location: /dairy/user/login/login.php');
        exit();
    }
    include 'C:\xampp\htdocs\Dairy\include\connection.php';
    if(!isset($_GET['pg'])){
        $pg=0;
    }
    else{
        $pg=$_GET['pg']-1;
    }
    // echo $pg;
    $pnum=$pg*30;
    $table="p".$_COOKIE['un'];
    $sql1="SELECT COUNT(id) as nm FROM $table";
    $result1 = $conn->query($sql1);
    $ab=$result1->fetch_assoc();
    $pagenm=(int)($ab['nm']/30);
    if($ab['nm']%30) $pagenm++;
    $sql = "SELECT * FROM $table  ORDER BY dt DESC limit 30 OFFSET $pnum";
    $result = $conn->query($sql);

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>All Submission</title>
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
                    <li class="nav-item active">
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
                    <li class="nav-item">
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
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Compare two profile</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> All submission </a>
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
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div  class="card-header ">
                                    <h4 align="Center" class="card-title">All submission of all judge</h4>
                                    <p align="Center" class="card-category">Keep track of your submission</p>
                                </div>
                                <a style=" margin-left: 900px" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                Filter
                                </a>

                                        <div class="collapse" id="collapseExample">
                                          <div class="card card-body">
                                               <table class="table table-hover table-striped">
                                                   <tr>
                                                       <form method="get" action="table.php">
                                                           <th>
                                                               <label for="cars">Verdict:</label>

                                                                <select name="ver" id="cars">
                                                                  <option value="all">ALL</option>
                                                                  <option value="ac">Accepted</option>
                                                                  <option value="wa">Wrong answer</option>
                                                                  <option value="tle">Time Limit</option>
                                                                  <option value="re">Runtime Error</option>
                                                                </select>
                                                           </th>
                                                           <th>
                                                               <label for="cars">Oj:</label>

                                                                <select name="oj" id="cars">
                                                                  <option value="all">All</option>
                                                                  <option value="cf">Codeforces</option>
                                                                  <option value="toph">Toph</option>
                                                                  <option value="loj">Loj</option>
                                                                  <option value="spoj">Spoj</option>
                                                                  <option value="uva">Uva</option>
                                                                </select>
                                                           </th>
                                                           <th>
                                                               <label for="cars">Duration:</label>

                                                                <select name="dur" id="cars">
                                                                  <option value="all">All</option>
                                                                  <option value="1">1 M</option>
                                                                  <option value="2">2 M</option>
                                                                  <option value="3">3 M</option>
                                                                  <option value="4">4 M</option>
                                                                  <option value="5">5 M</option>
                                                                </select>
                                                           </th>
                                                           <th>
                                                               <input type="submit" name="k">
                                                           </th>
                                                       </form>
                                                   </tr>
                                               </table>
                                          </div>
                                        </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
 
                                        <thead>
                                            <th> judge</th>
                                            <th >id</th>
                                            <th >Date</th>
                                            <th>Problem</th>
                                            <th>verdict</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            $oj=$row['oj'];
                                            if($oj=='cf') $oj='Codeforces';
                                            echo "<th>".$oj."</th>";
                                            echo "<th>".$row['subid']."</th>";
                                            echo "<th>".gmdate("Y-m-d H:i:s",(string)$row["dt"]). "</th>";
                                            if($row["link"]){
                                            echo "<th>"."<a href='".$row["link"]."'> ".$row["name"]." </a></th>"; 
                                            }
                                            else{
                                                echo "<th>".$row['name']."</a></th>"; 
                                            }
        
                                            echo "<th>".$row["ver"]."</th>"; 


                                            echo "</tr>"; 
                                            }   
                                            ?>
                                        </tbody>
                                    </table>
                                        <div>

                                            <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <?php
                                                    for ($i=1; $i <=min($pagenm,10) ; $i++) {  
                                                        if($i==($pg+1)){
                                                            echo "<li class='page-item active'><a class='page-link' href='?pg=$i'>$i</a></li>";
                                                        }
                                                        else{
                                                            echo "<li class='page-item'><a class='page-link' href='?pg=$i'>$i</a></li>";
                                                        }
                                                       
                                                    }
                                                ?>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </nav>
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
                            <a href="http://facebook.com/iammarajul">Maraju islam</a>, BSMRSTU,CSE
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
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
  function mf() {
        var cont = document.getElementById('myDIV');
        if (cont.style.display == 'none') {
            cont.style.display = 'block';
        }
        else {
            cont.style.display = 'none';
        }
    }
</script>

</html>
