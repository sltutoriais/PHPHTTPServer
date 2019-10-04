
 
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
    //stores the parameters sent by unity via POST
    $email = $_POST['email'];
    
	$pass = $_POST['pass']; 

	$sql =mysqli_query($dblink, "SELECT * FROM users WHERE email ='$email' AND  pass ='$pass'") or die(mysqli_error($dblink));
	   
	$row = mysqli_num_rows($sql);
	   
	if($row > 0)
	{
	    echo "true";//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
	}
 
	else
	{
	  echo "false";//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
	}
    
	   
	
  
	
 
 ?>
 