<?php
date_default_timezone_set("Africa/Harare");

//include nonce 
require_once('noncedate.php');
//create new instance of the class
$nonce = new Nonce();
//generate nonce
$myToken = $nonce->generateNonce(25, 'form_login', 10);
//verify nonce
$result = $nonce->verifyNonce($myToken);
//display result
var_dump($result);

$conn = mysqli_connect("localhost","root","","assessdb");


if(isset($_SESSION['ID'])){
    
if($_SESSION['ID'] != "" || $_SESSION['ID'] != null){

    $status = 'loggedin';
    $loginClass = 'notloggedin';
    $id = $_SESSION['ID'];

    $sql = $conn->query("SELECT * FROM users WHERE id = '$id'");
    if($row = $sql->fetch_assoc()){
		
		$_SESSION['ID'] = $row['id'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $profilepic = $row['profilepic'];
    
	}
	
	else{
		$usererr = 'Invalid login Details!!!';
		echo "Invalid login Details!!!";
        echo $password;
		
	}
}
else{
    $status = 'notloggedin';
    $loginClass = 'loggedin';
    session_destroy();
}
}

if(isset($_POST['login'])){		
		
	$username = validate($_POST['username']);
	$password = validate(md5($_POST['password']));
	
	if ($username == '' ){
		echo "Username cannot be Empty!!";
		$usererr = "Username cannot be Empty!!";
	}
	elseif($password == '' ){
		echo"Password cannot be Empty!!";
		$pwderr = "Password cannot be Empty!!";
	}
	else{

		$sql = $conn->query("SELECT * FROM users WHERE username = '$username' AND passwords = '$password'");
        if($row = $sql->fetch_assoc()){
		session_start();
            $_SESSION['ID'] = $row['id'];
            $userid = $row['id'];
            $date = date("Y-m-d | h:i:sa");
            //echo date("h:i:sa");
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $profilepic = $row['profilepic'];
            $status = 'loggedin';
            $loginClass = 'notloggedin';

            $sql = $conn->query("INSERT INTO loginlog (userid,dates)
            VALUES('$userid','$date')");

            echo "<script>location.reload();</script>";
        
        }
        
        else{
            $usererr = 'Invalid login Details!!!';
            echo "Invalid login Details!!!";            
        }
	}
		
}

function dbinfor($sql1){
    if($row = $sql1->fetch_assoc()){
		
		$_SESSION['ID'] = $row['id'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $profilepic = $row['profilepic'];
    
	}
	
	else{
		$usererr = 'Invalid login Details!!!';
		echo "Invalid login Details!!!";
        echo $password;
		
	}
}

function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>