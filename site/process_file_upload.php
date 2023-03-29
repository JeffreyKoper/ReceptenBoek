<?php

$filename = $_FILES['file']['name'];
      
// Location
$target_file = './images/'.$filename;

// file extension
$file_extension = pathinfo(
    $target_file, PATHINFO_EXTENSION);
     
$file_extension = strtolower($file_extension);

// Valid image extension
$valid_extension = array("png","jpeg","jpg");

if(in_array($file_extension, $valid_extension)) {

    // Upload file


    if(move_uploaded_file(
        
        $_FILES['file']['tmp_name']    ,
        $target_file)
    ) {

        // Execute query
        // $stmt->execute(
        //     array($filename,$target_file));
    }
    // echo "File upload successfully";
}