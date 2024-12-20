<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
    <?php
    include("db_conn.php");
    $cnt = new Connection();
    $conn = $cnt->getConn();

    include "php/func-validation.php";

    if (isset($_POST['btnregister'])){
      $fn = $_POST['txtfullname'];
      $em = $_POST['txtemail'];

      $user_input = 'Fullname='.$fn.'email'.$em;

      $text = "Fullname";
      $location = "signup.php";
      $ms = "error";
		  is_empty($fn, $text, $location, $ms, $user_input);

      $text = "Email";
      $location = "signup.php";
      $ms = "error";
		  is_empty($em, $text, $location, $ms, $user_input);

      $pas = password_hash($_POST['txtpassword'], PASSWORD_DEFAULT);

      $stmt = $conn->prepare("select * from users where email = ?");
      $stmt->execute([$em]);

      if($stmt->rowCount() > 0){
        echo "<script>
                alert('Email Address has used before.')
              </script>";
      }
      if($stmt->rowCount() == 0){
        $stmt = $conn->prepare("insert into users values (0, ?, ?, ?)");
        $stmt->execute([$em, $pas, $fn]);

        echo "<script>
                alert('Customer has been registered!')
              </script>";
      }
    }
    ?>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
<div class = "d-flex justify-content-center align-items-center" style = "min-height: 100vh">
    <form class = "p-5 rounded shadow" style="max-width: 30rem; width:100%" method = "POST" action = "">
    <h1 class = "text-center display-4 pb-5">REGISTER</h1>
    <?php if (isset($_GET['error'])) { #Alert incorrect atau dll
        ?> 
        <div class = "alert alert-danger" role = "alert">
          <?= htmlspecialchars($_GET['error']); ?>
        </div> 
      <?php } ?>
      <div class="mb-3">
        <label for="exampleInputName" class="form-label">Full Name</label>
        <input type="text" class="form-control" name = "txtfullname" id="exampleInputName">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name = "txtemail" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name = "txtpassword"  id="exampleInputPassword1">
      </div>

      <button type="submit" class="btn btn-primary" name='btnregister'>Register User</button>
      
      <!-- Balikin ke toko -->
      <a class = "btn btn-primary" href = "login.php">Login</a> 
      <a class = "btn btn-danger" href = "index.php">Cancel</a> 
      <!-- Cara buat encrypt pass, ambil di web 
       terus masukin pass yang udah di encrypt(jangan keambil spasinya) di database klen-->

       <!-- <'?'php echo password_hash("123", PASSWORD_DEFAULT)?> -->
        <!-- abaikan '' di ? soalnya ga bisa komen klo gada '' -->
    </form>
  </div>
</body>