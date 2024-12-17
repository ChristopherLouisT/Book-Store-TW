<?php 
echo 
"<script>
    alert('Logout from Session.')
</script>";

session_start();

session_unset();
session_destroy();

header("Location: index.php");
exit;
?>