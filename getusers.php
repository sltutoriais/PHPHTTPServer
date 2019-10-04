
 
 <?php

   $host = "localhost";
   $user = "root";
   $pass = "";
   $database = "unitydb";
 
   //connect to my sql
   $dblink = mysqli_connect($host, $user, "", $database);
   
   /* If connection fails throw an error */
   if (mysqli_connect_errno()) {
   
   echo "Could not connect to database: Error: ".mysqli_connect_error();
   exit();
  }
  
    
	$query =mysqli_query($dblink, "SELECT * FROM users ") or die(mysqli_error($dblink));
	   
	$row = mysqli_num_rows($query);
	   
	if ($query) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($query)) {
	
	 $pack = array(// JSON array
	      'id' => $row["id"],
	      'email' => $row["email"],
		  'pass' =>  $row["pass"]
         
	      );
	   
	      echo json_encode($pack);//encode the register in json and send it back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
          echo "*";// set the * character as a separator for each json record that will be sent to unity
    }

    /* free result set */
    mysqli_free_result($query);
    }
    /* close connection */
    mysqli_close($dblink);
	
	
 
 ?>
 