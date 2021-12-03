<?php 		
    session_start();
    require_once "./database/database_connection.php";

    $action = (isset($_GET['action'])) ? $_GET['action'] : '';

    if($action == 'delete'){
        $id = $_GET["id"];
        unset( $_SESSION['cart'][$id]);
        header("Location:./client-product-view-cart.php");
    }

    if(isset($_GET['update'])){

        $quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1 ;
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
        $_SESSION['cart'][$id]['quantity'] = $quantity ;
        header("Location:./client-product-view-cart.php");
    
    }


   
  
    if(isset($_POST['add-to-card'])){
        if(!isset($_SESSION['idkh'])){
            echo "<script type='text/javascript'>
                alert('Vui lòng đăng nhập vào hệ thống trước khi thêm giỏ hàng');
                document.location='login.php';
            </script>";
        }else{
            $quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : 1 ;
            $color =  (isset($_POST['color'])) ? $_POST['color'] : 1 ;
            $size =  (isset($_POST['size'])) ? $_POST['size'] : 1 ;

            $sqlColor = "SELECT * FROM mau WHERE M_MA = $color";
            $resultColor = $con->query($sqlColor);
            $rowColor = $resultColor->fetch_assoc();

            $sqlSize = "SELECT * FROM size WHERE S_MA = $size";
            $resultSize= $con->query($sqlSize);
            $rowSize = $resultSize->fetch_assoc();
            
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
                'color' => $color,
                'size' => $size,
                'colorName' => $rowColor['M_TEN'],
                'sizeName' => $rowSize['S_TEN'],
                'quantity' => $quantity,
            ];
                
            if(isset($_SESSION['cart'][$id])){
                echo "<script type='text/javascript'>    
                        alert('Sản phẩm đã có trong giỏ hàng'); 
                        document.location='./client-product.php';
                       

                    </script>";
                    $_SESSION['cart'][$id]['quantity'] = $quantity ;
            }else{
                echo "<script type='text/javascript'>
                        alert('Sản phẩm đã được thêm vào giỏ hàng');
                        document.location='./client-product-view-cart.php';
                    </script>";
                $_SESSION['cart'][$id] = $item;
            }

        }

      

    }

     
   



    
    
	 
 ?>
