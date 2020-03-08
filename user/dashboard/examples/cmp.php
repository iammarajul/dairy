
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Compare</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="./user.html">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.html">
                            <i class="nc-icon nc-notes"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./typography.html">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Typography</p>
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
                    <li class="nav-item active">
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
                                         <button type="submit" name="sbt" class="btn btn-info btn-fill pull-center">Submit</button>
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
                    <div class="row">
                        <div class="col-md-5">
                             <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Verdict Rate</h4>
                                    <p class="card-category">User 1 </p>
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
                                            data: [10,20,3,4,6],
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
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-2">
                            
                        </div> -->
                        <div class="col-md-5 offset-md-2">
                             <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Verdict Rate</h4>
                                    <p class="card-category">User 2 </p>
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
                                            data: [20,13,2,1,6],
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                             <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Count</h4>
                                    <p class="card-category">User 1 </p>
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
                                                <td>10</td>
                                                <td>20</td>
                                                <td>30</td>
                                                <td>40</td>
                                                <td>50</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td>200</td>
                                                
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
                       
                        <div class="col-md-5 offset-md-2">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Program Count</h4>
                                    <p class="card-category">User 2 </p>
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
                                                <td>10</td>
                                                <td>20</td>
                                                <td>30</td>
                                                <td>40</td>
                                                <td>50</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td>200</td>
                                                
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<script src="../assets/js/plugins/chartist.min.js"></script>

<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
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
                    label: "user1",
                    pointStrokeColor : "#9DB86D",
                    data : [10,18,25,8,7,15,6,26,13,12,11,20]
                },
                {
                    fillColor : "rgb(100,153,255,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [7,20,10,10,13,9,15,7,6,10,10,12]
                }

            ] 

            }
            var buyers = document.getElementById('buyers').getContext('2d');
            new Chart(buyers).Line(buyerData);        
</script>



</html>
