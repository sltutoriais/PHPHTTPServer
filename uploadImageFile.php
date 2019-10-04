<?php
       if ($_FILES["file"]["type"] == "image/jpg") 
        { 
               if ($_FILES["file"]["error"] > 0)
               { 
                     echo " error: " . $_FILES["file"]["error"] . ""; 
               } 
               else  
              { 
                 echo "Upload: " . $_FILES["file"]["name"] . ""; 
                        
                 if (file_exists("upload/" . $_FILES["file"]["name"]))
                 {
                     echo $_FILES["file"]["name"] . " already exists. ";
                 }
                 else
                 {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                    echo " image stored! ";
                 }
               }
        }
        else 
        { 
           echo "Invalid file"; 
        } 
?>