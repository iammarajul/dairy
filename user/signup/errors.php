<?php  

if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<?php 

if ($success) : ?>
  <div class="success1">
  	
  	  <p><?php echo "Registation Successful" ?></p>
  </div>
<?php  endif ?>