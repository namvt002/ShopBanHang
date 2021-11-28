<?php 		
    session_start();
    require_once "./database/database_connection.php";

    if(isset($_POST['add-to-card'])){
        if(!isset($_SESSION['idkh'])){
            echo "<script type='text/javascript'>
                alert('Vui lòng đăng nhập vào hệ thống trước khi thêm giỏ hàng');
                document.location='login.php';
            </script>";
        }else{
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
                'quantity' => 1,
            ];

            $_SESSION['cart'][$id] = $item;

            header("Location:./client-product-view-cart.php");
            echo "<pre>";
            print_r($_SESSION['cart']);

        }
    }

    
    
	 
 ?>
