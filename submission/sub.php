

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<link rel="stylesheet" type="text/css" href="style.css">


<table>
	<thead>
		
	
    <tr>
      <th style="text-align: center;" colspan="6" textali>Submission</th>
    </tr>

    <tr>
      <th> judge</th>
      <th >id</th>
      <th >Date</th>
      <th>Problem</th>
      <th>verdict</th>

	</tr>

	</thead>
	<tbody>
	<?php

		include 'C:\xampp\htdocs\Dairy\include\connection.php';


      $sql = "SELECT * FROM piammarajul  ORDER BY dt DESC";

      $result = $conn->query($sql);

     if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    	 echo "<tr>";

        echo "<th>".$row['oj']."</th>";
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
	}
  $conn->close();

	?>
</tbody>


   

  
</table>

</body>
</html>