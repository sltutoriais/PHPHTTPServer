<?php

$conn = new mysqli("localhost", "root", "", "unitydb");
  
  if ($conn->connect_errno) {   
     echo "Database connection failed. ".$conn->connect_errno;//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
  $conn->connect_error;
  }
  
  $sql = 'DELETE FROM users WHERE id = ?';
  
  //stores the parameters sent by unity via POST
  $id  = $_POST['id'];
 
  /*Prepare statement */
  $stmt = $conn->prepare($sql);
  if(!$stmt) {
    echo 'SQL error:'.$conn->error;//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
  
  }
 
  /* Bind parameters */
  $stmt->bind_param('i',$id);
 
  /* Execute statement */
  $stmt->execute();

  echo "user deleted successfully!";//Sending Messages back to unity. (take a look in unity:httpRequestClient.On ("ANSWER", OnReceiveServerAnswer))
 
  $stmt->close();
?>