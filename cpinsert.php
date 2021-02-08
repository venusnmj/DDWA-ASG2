<?php
include('session.php');
$newcpname=$_SESSION['addcpname'];
$newcpcontact=$_SESSION['addcpcontact'];
$newcpaddress=$_SESSION['addcpaddress'];
$newcpid=$_SESSION['addcpid'];
$target_dir = "CarparksPic/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    list($w, $h) = getimagesize($_FILES["fileToUpload"]["tmp_name"]); // get image resolution
    
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo '<script language="javascript"> alert("File is not an image.");
    location.href="carlots.php";
    </script>';
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo '<script language="javascript"> alert("File already exists");
    location.href="carlots.php";
    </script>';
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo '<script language="javascript"> alert("Sorry, your file is too large.");
    location.href="carlots.php";
    </script>';
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script language="javascript"> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    location.href="carlots.php";
    </script>';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script language="javascript"> alert("Sorry, your file was not uploaded.");
    location.href="carlots.php";
    </script>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $file = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    
    //insert carpark pic
    $_SESSION['ecppic']=$file;
    header('Location: addCarpark.php');
    
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