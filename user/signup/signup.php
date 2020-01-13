

 <?php include('server.php') ?> 

<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="signup.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" required>
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" required>
  	</div>
  	<div class="input-group">
  	  <label>Codeforces</label>
  	  <input type="text" name="cf" value="<?php echo $cf?>">
  	</div>
  	<div class="input-group">
  	  <label>Uva</label>
  	  <input type="text" name="uva" value="<?php echo $uva?>">
  	</div>
  	<div class="input-group">
  	  <label>toph</label>
  	  <input type="text" name="toph" value="<?php echo $toph?>" >
  	</div>
  	<div class="input-group">
  	  <label>Spoj</label>
  	  <input type="text" name="spoj" value="<?php echo $spoj?>" >
  	</div>

    <div style="margin: 0px 50px 0px;">
     <div class="g-recaptcha" data-sitekey="6LfUcMwUAAAAANbgR5OrLU2FMYNceHUGOmXw8xiC" ></div>
   </div>


  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="/Dairy/user/login/login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
