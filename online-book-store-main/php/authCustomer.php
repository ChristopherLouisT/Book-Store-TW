<?php 
session_start();

if (isset($_POST['email']) && 
	isset($_POST['password'])) {
    
    # Database Connection File
	include "../db_conn.php";
	$cnt = new Connection();
	$conn = $cnt->getConn();
    
    # Validation helper function
	include "func-validation.php";

	$email = $_POST['email'];
	$password = $_POST['password'];

	# simple form validation

	$text = "Email";
	$location = "../loginCustomer.php";
	$ms = "error";
    is_empty($email, $text, $location, $ms, "");

    $text = "Password";
	$location = "../loginCustomer.php";
	$ms = "error";
    is_empty($password, $text, $location, $ms, "");

    # search for the email
    $sql = "SELECT * FROM users
            WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    # if the email is exist
    if ($stmt->rowCount() === 1) {
    	$user = $stmt->fetch();

    	$user_id = $user['id'];
    	$user_email = $user['email'];
    	$user_password = $user['password'];
    	if ($email === $user_email) {
    		if (password_verify($password, $user_password)) {
				$_SESSION['jenis_user'] = "user"; 
    			$_SESSION['user_id'] = $user_id;
    			$_SESSION['user_email'] = $user_email;
    			header("Location: ../index.php");
    		}else {
    			# Error message
    	        $em = "Incorrect User name or password";
    	        header("Location: ../loginCustomer.php?error=$em");
    		}
    	}else {
    		# Error message
    	    $em = "Incorrect User name or password";
    	    header("Location: ../loginCustomer.php?error=$em");
    	}
    }else{
    	# Error message
    	$em = "Incorrect User name or password";
    	header("Location: ../loginCustomer.php?error=$em");
    }

}else {
	# Redirect to "../login.php"
	header("Location: ../loginCustomer.php");
}