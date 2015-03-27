<?php 
    if ($dir = opendir('uploads/')){
    while (false !== ($filename = readdir($dir))) {
        if ($filename != "." && $filename != "..") {
            echo '<a href="download.php?download_file = '.$filename.'">'.$filename.'<br></a>';
        }
    closedir($dir);
    }
} 