<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# Database Connection File
	include "../db_conn.php";
	$cnt = new Connection();
	$conn = $cnt->getConn();


	if (isset($_POST['type_name'])) {
		$name = $_POST['type_name'];

		#simple form Validation
		if (empty($name)) {
			$em = "The type name is required";
			header("Location: ../add-type.php?error=$em");
            exit;
		}else {
			# Insert Into Database
			$sql  = "INSERT INTO types (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);

		     if ($res) {
		     	# success message
		     	$sm = "Successfully created!";
				header("Location: ../add-type.php?success=$sm");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../add-type.php?error=$em");
	            exit;
		     }
		}
	}else {
      header("Location: ../admin.php");
      exit;
	}

}else{
  header("Location: ../login.php");
  exit;
}