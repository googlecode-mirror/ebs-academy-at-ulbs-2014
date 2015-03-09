<?php
function _upload_files(){
$target_dir = "uploads/";
for($i=0; $i<count($_FILES['fileToUpload']['name']); $i++) {
$new_file_name= strtolower($_FILES['fileToUpload']['name'][$i]);
$uploadOk = 1;
$FileType = pathinfo($new_file_name,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($new_file_name)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES['fileToUpload']['size'] > (500000000000)) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "xml" && $FileType != "png" && $FileType != "jpg"
&& $FileType != "gif" && $FileType != "doc" && $FileType != "pdf") {
    echo "Sorry, only JPG, PNG, GIF, DOC, PDF, XML files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'],'uploads/'.$new_file_name);
         echo"The file was uploaded!";
        $i++;
    }
}
}
?>
