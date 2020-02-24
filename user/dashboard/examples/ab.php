


<?php 
    setcookie("un", "", time() - 3600,"/");
    echo "logout";
    header('location: /dairy/user/login/login.php');
    exit();
?>


