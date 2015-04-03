<?php

function _upload_files() {
        
        
    $target_dir = "uploads/";
    $uploadOk = 1;
    $i = 0;
    
    foreach ($_FILES['fileToUpload']['name'] as $index->$filename) {
        if ($filename) {
            $new_file_name = strtolower($filename);
            $FileType = pathinfo($new_file_name, PATHINFO_EXTENSION);

            // Check if file already exists
            if (file_exists($new_file_name)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            $marime = $_FILES['fileToUpload']['size'];
            
// Check file size
            if ($marime[$index] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($FileType != "xml" && $FileType != "png" && $FileType != "bmp" && $FileType != "jpg" && $FileType != "gif" && $FileType != "doc" && $FileType != "docx"&& $FileType != "pdf") {
                echo "Sorry, only JPG, PNG, GIF, DOC, DOCX, BMP, PDF, XML files are allowed.";
                $uploadOk = 0;
            } 
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {

                move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i], 'uploads/' . $new_file_name);
                echo"The file was uploaded!";
                $i++;
            }
        }
    }
}

?>
