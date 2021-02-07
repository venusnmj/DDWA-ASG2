<?php
include('session.php');
$username=$_SESSION['id'];
$user=$_SESSION['user'];
$target_dir = "BannerImg/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    list($w, $h) = getimagesize($_FILES["fileToUpload"]["tmp_name"]); // get image resolution

    /*
    if ($w < $h){ // if width is less than height, crop height using imagecrop function
        $image = imagecrop($image, array(
            "x" => 0,
            "y" => ($w - $h) / 2,
            "width" => $w,
            "height" => $w
        ));
    } else if ($h < $w){ // vice versa
        $image = imagecrop($image, array(
            "x" => ($w - $h) / 2,
            "y" => 0,
            "width" => $h,
            "height" => $h
        ));
    }*/
    
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo '<script language="javascript"> alert("File is not an image.");
    location.href="welcome.php";
    </script>';
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo '<script language="javascript"> alert("File already exists");
    location.href="welcome.php";
    </script>';
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo '<script language="javascript"> alert("Sorry, your file is too large.");
    location.href="welcome.php";
    </script>';
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script language="javascript"> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    location.href="welcome.php";
    </script>';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script language="javascript"> alert("Sorry, your file was not uploaded.");
    location.href="welcome.php";
    </script>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $file = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    
    if($user=="Admin"){
        $sqlemail = "UPDATE Admin SET adminbanner='$file' WHERE adminid='$username'";
        if (mysqli_query($db, $sqlemail)) {
          //echo "Record updated successfully";
          header('Location: welcome.php');
        } 
    }
    elseif($user=="Staff"){
      $sqlpic = "UPDATE Staff SET staffbanner='$file' WHERE staffid='$username'";
        if (mysqli_query($db, $sqlpic)) {
          //echo "Record updated successfully";
          header('Location: welcome.php');
        } 
    }
}
else {
    echo "Sorry, there was an error uploading your file.";

    $fileError = $_FILES["FILE_NAME"]["error"]; // where FILE_NAME is the name attribute of the file input in your form
switch($fileError) {
    case UPLOAD_ERR_INI_SIZE:
        echo "exceed max";
        // Exceeds max size in php.ini
        break;
    case UPLOAD_ERR_PARTIAL:
        echo "exceed max";
        // Exceeds max size in html form
        break;
    case UPLOAD_ERR_NO_FILE:
        echo "no file";
        // No file was uploaded
        break;
    case UPLOAD_ERR_NO_TMP_DIR:
        echo "no dir";
        // No /tmp dir to write to
        break;
    case UPLOAD_ERR_CANT_WRITE:
        echo "cant write to disk";
        // Error writing to disk
        break;
    default:
    echo "no error";
        // No error was faced! Phew!
        break;
}

  }
}
?>