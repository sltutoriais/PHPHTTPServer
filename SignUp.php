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
	
	$points = $_POST['points']; 

	$sql =mysqli_query($dblink, "SELECT * FROM users WHERE email ='$email' ") or die(mysqli_error($link));;
	   
	$row = mysqli_num_rows($sql);
	   
	if($row > 0)
	   throw new Exception('that usrname is taken go back and choose another one');

	$query = "INSERT INTO users (email,pass,points) VALUES(?,?,?)";
	
	
	$stmt =  mysqli_prepare($dblink, $query);
	
	mysqli_stmt_bind_param($stmt, 'sss', $email, $pass,$points);
	
	if(!mysqli_stmt_execute($stmt)){
    echo mysqli_error($dblink);//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
    }
	else
	{
	  echo "successfully registered user!";//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
	}
 
 ?>
 