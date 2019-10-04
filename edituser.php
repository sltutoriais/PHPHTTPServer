
 
 <?php 
$conn = new mysqli("localhost", "root", "", "unitydb");


  if ($conn->connect_errno) {
    echo "Database connection failed (" . $conn->connect_errno . ") " . $conn->connect_error;
  }

  //stores the parameters sent by unity via POST
  $id = $_POST['id'];
  
  $email = $_POST['email'];
    
  $pass = $_POST['pass']; 
  
 
  /* Prepare statement */
  $stmt = $conn->prepare("UPDATE users set email = ?, pass = ? where id = ?");
  if(!$stmt) {
     trigger_error('Error: ' .$conn->error, E_USER_ERROR);
	 
	  echo "error";//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
   }
   echo "updated!";//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
  
  /* Bind parameters */
  $stmt->bind_param('ssi',$email,$pass, $id);
 
  /* Execute statement */
  $stmt->execute();
  $stmt->close();

?>