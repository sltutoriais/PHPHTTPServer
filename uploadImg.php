
 
 <?php

  
	 // Save image to file
    $imageData = base64_decode($_POST['myImageData']);
	
	// Write Image to file
    $h = fopen('uploadImg.jpg', 'w');
    fwrite($h, $imageData);
    fclose($h);
	   
	echo "image on server!";   
	
  
	
 
 ?>
 