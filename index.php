<!DOCTYPE html>
<html>
<head>

  <title>
    Online Exam
  </title>
   </style>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
</head>
<body>
  

  <nav>
    <div class="nav-wrapper purple lighten-2">
      <a href="#" style="padding-left: 10px;" class="brand-logo">Programmer's Diary</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- <li><a href="sass.html">Sass</a></li> -->
        <li><a href="user/signup/signup.php">Sign Up</a></li>
        <li><a href="user/login/login.php">Log In</a></li>
      </ul>
    </div>
  </nav>
        
  <div class="container">
    <br><br>
    <div class="row">
      <div class="col s16 m12">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Welcome to programmer's diary. Here You can enjoy lot of cool feature absolutely free </span>
            <p></p>
          </div>
          <div class="card-action">
            <a href="user/signup/signup.php" class="waves-effect waves-light red btn-large">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    <div class="center"> 
      <h4> Our service</h4>
    </div>

    <div class="row">
      <div class="col s12 m6">
        <div class="card">
          <div class="card-image">
            <img src="image/1.png">
            <span class="card-title black-text">Accuracy chart</span>
          </div>
          <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div>
      </div>
      <div class="col s12 m6">
        <div class="card">
          <div class="card-image">
            <img src="image/3.png" height="400px" width="100px">
            <span class="card-title black-text">Problem counter</span>
          </div>
          <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div>
      </div> 

      <div class="col s12 m12">
        <div class="card">
          <div class="card-image">
            <img src="image/2.png" height="350px" width="200px">
            <span class="card-title black-text">compare to other</span>
          </div>
          <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div>
      </div>

    </div>
            

  </div>

  
        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>

            


</body>
<script type="text/javascript">
  var x="<?php echo $_GET['st']; ?>";
  if(x=='logout'){
      M.toast({html: "You successfully Logout!!",classes: 'rounded'});
  }else if(x=='login'){
     M.toast({html: "You Need to login to view this page!!",classes: 'rounded'});
  }
</script>
</html>