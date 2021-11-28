<?php
    require_once "./database/database_connection.php";

      $action = $_GET['action'];

      if($action == 'delete'){
  
          $id = $_GET["id"];
          $quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : 1 ;
          $id = $_GET["id"];
          $sql = "SELECT * FROM san_pham where SP_MA = $id";
          $result = $con->query($sql);
          $product = $result->fetch_assoc();
          // session_destroy();
          // die();
          $item = [
              'id' => $product['SP_MA'],
              'name' => $product['SP_TEN'],
              'image' => $product['SP_ANH'],
              'price' => $product['SP_GIA'],
              'quantity' => $quantity,
          ];
          unset( $_SESSION['cart'][$id]);
          header("Location:./client-product-view-cart.php");
      }
     

?>