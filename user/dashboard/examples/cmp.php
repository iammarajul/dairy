<?php
    if(!isset($_COOKIE['un'])) {

        header('location: /dairy/user/login/login.php');
        exit();
    }
    include 'C:\xampp\htdocs\Dairy\include\connection.php';
    $r1=0;
    $r2=0;
    $pk=0;
    if(isset($_GET['us1']) && isset($_GET['us2'])){
        $pk=1;
        $user1=$_GET['us1'];
        $user2=$_GET['us2'];
        $query = "SELECT un FROM user WHERE un='$user1';";
        $r= $conn->query($query);
        $r1=$r->num_rows;
        $query = "SELECT un FROM user WHERE un='$user2';";
        $r2=  ($conn->query($query))->num_rows;
    }
    if($r1 && $r2){
        $rate1=array();
        $table="p".$user1;
        // echo $table;
        $sum1=0;
        $query = "SELECT id FROM $table WHERE ver='Accepted'";
        $results = $conn->query($query);
        array_push($rate1, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Wrong Answer'";
        $results = $conn->query($query);
        array_push($rate1, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Time Limit Exceeded'";
        $results = $conn->query($query);
        array_push($rate1, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Compilation Error'";
        $results = $conn->query($query);
        array_push($rate1, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Runtime Error'";
        $results = $conn->query($query);
        array_push($rate1, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Memory Limit Exceeded'";
        $results = $conn->query($query);
        array_push($rate1, $results->num_rows);
        for ($i=0; $i <6 ; $i++) { 
            $sum1+=$rate1[$i];
        }

        for ($i=0; $i <6 ; $i++) { 
            # code...
            $rate1[$i]=(($rate1[$i]*100)/$sum1);
        }

        $rate2=array();
        $table="p".$user2;
        // echo $table;
        $query = "SELECT id FROM $table WHERE ver='Accepted'";
        $results = $conn->query($query);
        array_push($rate2, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Wrong Answer'";
        $results = $conn->query($query);
        array_push($rate2, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Time Limit Exceeded'";
        $results = $conn->query($query);
        array_push($rate2, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Compilation Error'";
        $results = $conn->query($query);
        array_push($rate2, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Runtime Error'";
        $results = $conn->query($query);
        array_push($rate2, $results->num_rows);
        $query = "SELECT id FROM $table WHERE ver='Memory Limit Exceeded'";
        $results = $conn->query($query);
        array_push($rate2, $results->num_rows);
        $sum2=0;
        for ($i=0; $i <6 ; $i++) { 
            $sum2+=$rate2[$i];
        }

        for ($i=0; $i <6 ; $i++) { 
            if($sum2!=0){
            $rate2[$i]=(int)(($rate2[$i]*100)/$sum2);}
            else{
                $rate2[$i] = 0;
            }
        }

        $table1 = "p".$user1;
        $table2 = "p".$user2;
        $res3 = array();
        $res4 = array();
        $query = "SELECT DISTINCT name FROM $table1 WHERE oj='cf' and ver='Accepted' ";
        $results = $conn->query($query);
        array_push($res3, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table1 WHERE oj='spoj' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res3, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table1 WHERE oj='uva' and ver='Accepted' ";
        $results = $conn->query($query);
        array_push($res3, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table1 WHERE oj='loj' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res3, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table1 WHERE oj='toph' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res3, $results->num_rows);

        $query = "SELECT DISTINCT name FROM $table2 WHERE oj='cf' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res4, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table2 WHERE oj='spoj' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res4, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table2 WHERE oj='uva' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res4, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table2 WHERE oj='loj' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res4, $results->num_rows);
        $query = "SELECT DISTINCT name FROM $table2 WHERE oj='toph' and ver='Accepted'";
        $results = $conn->query($query);
        array_push($res4, $results->num_rows);

        $tme=time();
        // echo $tme;
        $res5=array();
        $res6 = array();
        for($i=0;$i<12;$i++){
            $tk=$tme-(30*24*60*60);
            // echo $tk." ";
            $sql="SELECT * from $table1 where dt>=$tk and dt<=$tme and ver='Accepted'";
            $results = $conn->query($sql);
            array_push($res5, $results->num_rows);
            // echo $results->num_rows;
            $tme=$tk;

        } 

        $tme=time();
        for($i=0;$i<12;$i++){
            $tk=$tme-(30*24*60*60);
            // echo $tk." ";
            $sql="SELECT * from $table2 where dt>=$tk and dt<=$tme and ver='Accepted'";
            $results = $conn->query($sql);
            array_push($res6, $results->num_rows);
            // echo $results->num_rows;
            $tme=$tk;

        }



    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Compare two profile</title>
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
                    <li>
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./user.php">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="./cmp.php">
                            <i class="nc-icon nc-spaceship"></i>
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
                    <a class="navbar-brand" href="#pablo"> Compare two profile </a>
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
                    <form method="get" action="cmp.php">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card ">
                                    <div class="card-body ">
                                        <div class="form-group">
                                            <label>first handel</label>
                                            <input type="text" class="form-control" name="us1" placeholder="username1" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!-- <div class="card "> -->
                                    <div class="card-body ">
                                         <button type="submit"class="btn btn-info btn-fill pull-center">Submit</button>
                                    </div>
                               <!--  </div> -->
                            </div>
                            <div class="col-md-5">
                                <div class="card ">
                                    <div class="card-body ">
                                        <div class="form-group">
                                            <label>Second handel</label>
                                            <input type="text" class="form-control" name="us2" placeholder="username2">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </form>
                    <div class="row" <?php if ($r1>0 && $r2>0 || $pk==0){ echo 'style="display:none;"'; } ?>>
                        <div class="col-md-4">
                               
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-body" style="color:red" align="center">
                                  Username are Invalid..
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                               
                        </div>  
                     </div>



                    <div class="row" <?php if ($r1==0 or $r2==0){ echo 'style="display:none;"'; } ?>>
                        <div class="col-md-5" >
                             <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Verdict Rate</h4>
                                    <p class="card-category"><?php echo $user1?> </p>
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
                                            data: [<?php echo $rate1[0]; ?>, <?php echo $rate1[1]; ?>, <?php echo $rate1[2]; ?>, <?php echo $rate1[3]; ?>,<?php echo $rate1[5]; ?>,<?php echo $rate1[4]; ?>],
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
                                            responsive: true,
                                        }
                                        });
                                        </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-5 offset-md-2">
                             <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title">Program Verdict Rate</h4>
                                    <p class="card-category"><?php echo $user2?>  </p>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart2"  width="370" height="400" ></canvas>
                                    <script>
                                        var ctx = document.getElementById("myChart2");
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
                                            data: [<?php echo $rate2[0]; ?>, <?php echo $rate2[1]; ?>, <?php echo $rate2[2]; ?>, <?php echo $rate2[3]; ?>,<?php echo $rate2[5]; ?>,<?php echo $rate2[4]; ?>],
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
                                            responsive: true,

                                        }
                                        });
                                        </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" <?php if ($r1==0 or $r2==0){ echo 'style="display:none;"'; } ?>>
                        <div class="col-md-5">
                             <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Count</h4>
                                    <p class="card-category"><?php echo $user1?>  </p>
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
                                                <td><?php echo $res3[0]?></td>
                                                <td><?php echo $res3[1]?></td>
                                                <td><?php echo $res3[2]?></td>
                                                <td><?php echo $res3[3]?></td>
                                                <td><?php echo $res3[4]?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td><?php echo array_sum($res3); ?></td>
                                                
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
                       <div class="col-md-2">
                               
                        </div>
                        <div class="col-md-5 offset-md-2">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Count</h4>
                                    <p class="card-category"><?php echo $user2?>  </p>
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
                                                <td><?php echo $res4[0]?></td>
                                                <td><?php echo $res4[1]?></td>
                                                <td><?php echo $res4[2]?></td>
                                                <td><?php echo $res4[3]?></td>
                                                <td><?php echo $res4[4]?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td><?php echo array_sum($res4); ?></td>
                                                
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

                    <div class="row" <?php if ($r1==0 or $r2==0){ echo 'style="display:none;"'; } ?>>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Month wise Submission</h4>
                                    <div class="card-body">
                                    <canvas id="buyers" width="1000" height="400"></canvas>
                                    </div>
                                    <script>

                                        var ctx = document.getElementById("buyers");
                                        var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ["January","February","March","April","May","June","july","august","september","octomber","nobember","December"],
                                            datasets: [
                                            {
                                            label: '<?php echo $user1 ?>',
                                            backgroundColor: [
                                                'rgb(255,0,0,0.4)'
                                            ],
                                            data: [<?php  foreach ($res5 as $key) {
                                            echo $key.",";
                                            }?>]
                                            },{
                                                label: '<?php echo $user2 ?>',
                                            backgroundColor: [
                                                'rgb(0,255,0,0.4)'
                                            ],
                                            data: [<?php  foreach ($res6 as $key) {
                                            echo $key.",";
                                            }?>]
                                            }
                                            ]
                                        },
                                        options: {
                                            cutoutPercentage: 40,
                                            responsive: true

                                        }
                                        });
                                    </script>  
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




                    <!--  End Modal -->
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
                            <a href="http://facebook.com/iammarajul">Marajul islam</a>, CSE BSMRSTU
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

<script src="../assets/js/plugins/chartist.min.js"></script>

<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="../assets/js/demo.js"></script>





</html>
