<?php
$mysqli = new mysqli("localhost", "root", "", "unitydb");

 /* check connection */
 if ($mysqli->connect_errno) {
    echo "Connectin to database failed: ".$mysqli->connect_error;
    
   exit();
 }


 $query = "SELECT * FROM users ORDER BY points DESC  LIMIT 10";
 $result = $mysqli->query($query);

 if ($result) {

    $ranking  = 1;
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
	
	 $pack = array(// JSON array
	      'id' => $row["id"],
	      'email' => $row["email"],
		  'points' =>  $row["points"],
           'ranking' => $ranking
	      );
		  
	  $ranking=$ranking+1;
	   
	  echo json_encode($pack);//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
      echo "*";// set the * character as a separator for each json record that will be sent to unity
    }
 }

 /* free result set */
 $result->free();
 /* close connection */
 $mysqli->close();
?>