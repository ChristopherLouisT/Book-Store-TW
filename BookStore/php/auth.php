<?php
session_start(); #Buat simpen siapa yang sedang login, tar ada var SESSION dibawah

if (isset($_POST['email']) && isset($_POST['password'])) { #isset itu kalau ada valuenya

    #Connect the database
    include "db_conn.php";

    #Check if email / pass is empty
    include "logValidation.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $location = "../login.php"; #Pake ../ kalau filenya diluar dari package php
    $ms = "error";

    is_empty($email, $location, $ms, "");

    $sql = "SELECT * FROM admin WHERE email=?";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$email]);

    #if exist
    if ($stmt -> rowCount() === 1) {
        $user = $stmt -> fetch();

        $user_id = $user['id'];
        $user_email = $user['email'];
        $user_pass = $user['password'];

        if ($email === $user_email) {
            if (password_verify($password, $user_pass)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $user_email;
                header("Location: ../admin.php");
            }
            else {
                $em = "Incorrect Email Or Password";
                header("Location: ../login.php?error=$em");
            }
        }
        else {
            $em = "Incorrect Email Or Password";
            header("Location: ../login.php?error=$em");
        }
    }
    else {
        $em = "Incorrect Email Or Password";
        header("Location: ../login.php?error=$em");
    }
}
else {
    #Redirect back to login page
    header("Location: ./login.php");
}