<?php 
include('session.php');


$errorID="";
$errorEmail="";
$errorFirst="";
$errorLast="";
$errorAddress="";
$errorPostal="";
$errorContact="";
$error = false;


/* NAME */
if (empty($_POST['editedUsername'])) {
    $errorID = "<p class='errmsg'>Username cannot be empty<p>";
    $error = true;
}
elseif(preg_match("[A-Za-z0-9_]+\s*",$_POST['editedUsername'])==0){
   $errorID = "<p class='errmsg'>Username cannot have spaces<p>";
   $error = true;
} 
else {
    $username = $_POST['editedUsername'];
    $error = false;
}


/* EMAIL */
if (empty($_POST["editedEmail"])) {
    $errorEmail = "<p class='errmsg'>Email is required</p>";
    $error = true;
} 
elseif(!filter_var($_POST["editedEmail"], FILTER_VALIDATE_EMAIL)) {
    $errorEmail = "<p class='errmsg'>Invalid email format</p>";
    $error = true;
}
else {
    $email = $_POST["editedEmail"];
    $error = false;
}



if (empty($_POST['editedFirst'])) {
    $errorFirst = "<p class='errmsg'>Username cannot be empty<p>";
    $error = true;
}
elseif(preg_match("[A-Za-z0-9_]+\s*",$_POST['editedFirst'])==0){
   $errorFirst .= "<p class='errmsg'>First name cannot have spaces<p>";
   $error = true;
} 
else {
    $firstname = $_POST['editedFirst'];
    $error = false;
}

if (empty($_POST['editedLast'])) {
    $errorLast .= "<p class='errmsg'>Username cannot be empty<p>";
    $error = true;
}
elseif(preg_match("[A-Za-z0-9_]+\s*",$_POST['editedLast'])==0){
   $errorLast .= "<p class='errmsg'>Last name cannot have spaces<p>";
   $error = true;
} 
else {
    $lastname = $_POST['editedLast'];
    $error = false;
}


/* MESSAGE */
if (empty($_POST["editedAddress"])) {
    $errorAddress .= "<p class='errmsg'>Address is required</p>";
    $error = true;
} 
else {
    $address = $_POST["editedAddress"];
    $error = false;
}

if (empty($_POST["editedPostal"])) {
    $errorPostal .= "<p class='errmsg'>Postal Code is required</p>";
    $error = true;
} 
elseif(preg_match("/^[0-9]{6}$/",$_POST['editedPostal'])){
    $errorPostal .= "<p class='errmsg'>Postal Code must be 6 digits</p>";
    $error = true;
}
else {
    $postal = $_POST["editedPostal"];
    $error = false;
}

if (empty($_POST["editedContact"])) {
    $errorContact .= "<p class='errmsg'>Contact No. is required</p>";
    $error = true;
} 
elseif(preg_match("/^[0-9]{8}$/",$_POST['editedContact'])){
    $errorContact .= "<p class='errmsg'>Contact No. must be 8 digits</p>";
    $error = true;
}
else {
    $contact = $_POST["editedContact"];
    $error = false;
}


if($error==false){
	//$msg = "Name: ".$name.", Email: ".$email.", Subject: ".$msg_subject.", Message:".$message;
    echo json_encode(['code'=>200, 
    'username'=>$username,
    'email'=>$email,
    'firstname'=>$firstname,
    'lastname'=>$lastname,
    'address'=>$address,
    'postal'=>$postal,
    'contact'=>$contact
    ]);
	exit;
}


echo json_encode(['code'=>404,
'errUsername'=>$errorID,
    'errEmail'=>$errorEmail,
    'errFirst'=>$errorFirst,
    'errLast'=>$errorLast,
    'errAddress'=>$errorAddress,
    'errPostal'=>$errorPostal,
    'errContact'=>$errorContact ]);

?>