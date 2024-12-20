<?php
namespace Midtrans;

use Connection;

session_start();

# Database Connection File
include "db_conn.php";
$cnt = new Connection();
$conn = $cnt->getConn();

# Book helper function
include "php/func-book.php";
$books = get_all_books($conn);
$mybooks = get_my_books($conn);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);

# CSS Helper
include "css/style-bookstore.php";

# Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);

$id = $_GET['id'];

foreach ($books as $book) {
    if ($book['id'] == $id) {
        $harga = $book['price'];
        $judul = $book['title'];
    }
}

//=========================================================================

require_once dirname(__FILE__) . '/midtrans/Midtrans.php';
Config::$serverKey = 'SB-Mid-server-rDms8-4RDf9MKQJJT2HgEveB';
Config::$clientKey = 'SB-Mid-client-FTHs6qt1K9D6xCAW';
Config::$isSanitized = true;
Config::$is3ds = true;
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $harga, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => $id,
    'price' => $harga,
    'quantity' => 1,
    'name' => $judul,
);

// Optional
$item_details = array($item1_details);

// Optional, remove this to display all available payment methods
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    echo $e->getMessage();
}

function printExampleWarningMessage()
{
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Book Store</title>

    <!-- bootstrap 5 CDN-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

</head>
<body class="bg-light">
 <!-- <style>
        html {
            scroll-padding: 5rem;
        }
        .menu-item:hover,
        .menu-item.active {
            background-color:mediumaquamarine;
        }
 </style> -->

 <div class="container">
    <div class = "row">
            <?php include("menunavbar.php"); ?>
		</div>

  <!-- <form action="search.php"
             method="get"
             style="width: 100%; max-width: 30rem">

   <div class="input-group my-5">
    <input type="text"
      class="form-control"
      name="key"
      placeholder="Search Book..."
      aria-label="Search Book..."
      aria-describedby="basic-addon2">

    <button class="input-group-text
        btn btn-primary"
      id="basic-addon2">
      <img src="img/search.png"
       width="20">

    </button>
   </div>
       </form> -->

  <div class="row g-0 mt-5 pt-5">
   <?php if ($books == 0) {?>
    <div class="alert alert-warning
                     text-center p-5"
              role="alert">
              <img src="img/empty.png"
                   width="100">
              <br>
       There is no book in the database
         </div>
   <?php } else {?>

   <div class="container">
    <?php foreach ($books as $book) {
    if ($book['id'] == $id) {
        ?>
                    <div class="row">
                        <div class="col-md-3">
                                <img src="uploads/cover/<?=$book['cover']?>" class="card-img-top">
                                <div class="card-body">
                                <?php
if (isset($_SESSION['user_id'])) {

                            $flag = 0; 
                            foreach($mybooks as $mbook) {
                                if($mbook['id'] == $book['id']) 
                                { $flag = 1; }
                            }

                            if($flag == 0) 
                            {
            ?>

                                    <button type='button' class='form-control btn btn-success' onclick="bayar()">Buy Book</button>
                        <?php 
                            } else {
                        ?>
                                    <button type='button' class='form-control btn btn-success'>View Book</button>
                        <?php 
                            }

} else {
        ?>
                                    <a href='loginCustomer.php'><button type='button' class='form-control btn btn-success'>Login First To Buy Book</button></a>
<?php 
}
?>
                                </div> <!-- tutup div punyae card body -->
                        </div>
                        <div class="col-md-9">
       <h3 class="card-title">
        <?=$book['title']?>
       </h3>
       <p class="card-text">
       <i><b>By:
       <?php foreach ($authors as $author) {
            if ($author['id'] == $book['author_id']) {
                echo $author['name'];
                break;
            }
        }?>
       <br>
       Category:
       <?php foreach ($categories as $category) {
            if ($category['id'] == $book['category_id']) {
                echo $category['name'];
                break;
            }
        }?>
        <br>
        <h4>Price:
        <?="Rp. " . substr($book['price'], 0)?>
        </b></i></h4>
       <p><?=($book['description'])?>
                        </div>
                    </div>
                    <?php
} // tutup if punyae book[id] == id
    ?>
                <?php
} // tutup if punyae foreach
    ?>
   </div> <!-- tutup div punyae Inner Container (Container 2) -->
        <?php } // tutup if jika kosong atau ada datanya
?>
      </div>  <!-- Row Div-->
  </div>  <!-- tutup div punyae container 1 -->
</body>
</html>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
<script language="javascript">
function bayar() {
  snap.pay('<?php echo $snap_token ?>', {
      // Optional
      onSuccess: function(result){
          /* You may add your own js here, this is just example */
          alert("sukses");
          $.post("simpantrans.php",             // ajax
            { idbook: <?php echo $id; ?> },
            function(result) {
              window.location.href = "index.php";
            }
          );
      },
      // Optional
      onPending: function(result){
          /* You may add your own js here, this is just example */
          alert("pending or canceled");
      },
      // Optional
      onError: function(result){
          /* You may add your own js here, this is just example */
          alert("error");
      }
  });
}
</script>