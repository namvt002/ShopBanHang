<?php
    
    require_once "./database/database_connection.php";
    
     
    $sql = "DELETE FROM `chi_tiet_don_hang`  WHERE DH_MA = '".$_GET['id'] ."'";
     if(!$con->query($sql) ===TRUE){
        echo "<script type='text/javascript'>
                alert('Không xác nhận được !');
                document.location='dashboard-order.php';
            </script>";
    }else{
        $sql1 = "DELETE FROM `don_hang`  WHERE DH_MA = '".$_GET['id'] ."'";
      
        if(!$con->query($sql1) ===TRUE){
            echo "<script type='text/javascript'>
                    alert('Không thể xác nhận được!');
                    document.location='dashboard-order.php';
                </script>";
        }else{
            echo "<script type='text/javascript'>
                alert('Đã xác nhận đơn!');
                document.location='dashboard-order.php';
            </script>";
        }
        
    }
    $con->close();
?>