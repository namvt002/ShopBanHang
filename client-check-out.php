<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A&T Shop Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->


</head>

<?php
     require_once "./database/database_connection.php";

    
?>


<style>
    #details {
        border-style: solid;
        border-width: 1px 1px 1px 0px;
        /* 25px top, 10px right, 4px bottom and 35px left */
    }

    #details-img {

        border-style: solid;
        border-width: 1px 0px 1px 1px;
        /* 25px top, 10px right, 4px bottom and 35px left */
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sản phẩm
            </div>
            <?php
            $sqlLSP = "SELECT * FROM loai_san_pham";
            $resultLSP = $con->query($sqlLSP);
            while ($rowLSP = $resultLSP->fetch_assoc()) {
            ?>
                <li class="nav-item">
                    <?php
                    echo "<a class='nav-link' href='client-product.php?id=" . $rowLSP['LH_MA'] . "'>";
                    ?>
                    <i class="fas fa-fw fa-table"></i>
                    <span><?php echo $rowLSP['LH_TEN'] ?></span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
               <!-- /.container-fluid -->
               <?php require 'header.php'; ?>
                <?php
                   if(!isset($_SESSION['idkh'])){
                        echo "<script type='text/javascript'>
                            alert('Vui lòng đăng nhập vào hệ thống trước khi thêm giỏ hàng');
                            document.location='login.php';
                        </script>";
                    }else{
                        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
                        // echo "<pre>";
                        // print_r($cart);
    
                    }


                ?>


            <!-- Main Content -->
            <div id="content">

                <form action="" method="post">
                  
                    <div class="container-fluid" style="margin-top: 80px;">
                    <h3 style="margin-bottom: 50px;">Xác nhận thanh toán</h3>
                        <div class="row">
                        
                            
                            <div class="col-lg-4" style = "border: 1px solid #ccc; padding:20px">
                                <?php
                                    $sqlCO = "SELECT * FROM khach_hang WHERE KH_MA = '" . $_SESSION['idkh'] . "'";
                                    $resultCO = $con->query($sqlCO);
                                    $rowCO = $resultCO->fetch_assoc(); // tra ve mot dong ket qua
                                ?>
                            
                                <div class="mb-3">
                                    <label  class="form-label">Tên người nhận:</label>
                                    <input type="text" class="form-control" id="name" name="nameNN" value="<?php echo $rowCO['KH_TEN']; ?>">
                                </div>
                                <div class="mb-3">
                                    <labelclass="form-label">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="phone" name = "phoneNN"  value="<?php echo $rowCO['KH_SDT']; ?>">
                                </div> 
                                <div class="mb-3">
                                    <label  class="form-label">Địa chỉ:</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $rowCO['KH_DIACHI']; ?>">
                                </div>
                            
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Hình thức thanh toán:</label>
                                    <select class="form-select" aria-label="Default select example" name="HTTT">
                                        <option value="">Chọn hình thức thanh toán</option>
                                        <?php
                                            $sqlHT = "SELECT * FROM `hinh_thuc_thanh_toan`";
                                            $resultHT= $con->query($sqlHT);
                                            while ($rowHT = $resultHT->fetch_assoc()) {
                                                echo " <option value=" . $rowHT['HTTT_MA'] . ">";
                                                echo   $rowHT['HTTT_TEN'];
                                                echo " </option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-8" style = "border: 1px solid #ccc;">

                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">STT</th>
                                            
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Màu</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Thành tiền</th>
                                        

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; $totol_price = 0;?>
                                        <?php foreach ($cart as $key => $value):
                                             $totol_price += ($value['price'] * $value['quantity']);
                                            ?>
                                           
                                            <tr class="text-center"> 
                                                <td><?php echo $i++; ?></td>
                                            
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['colorName']; ?></td>
                                                <td><?php echo $value['sizeName']; ?></td>
                                                <td><?php echo $value['quantity']; ?></td>
                                                <td class="text-center"><?php echo number_format($value['price']); ?></td>
                                                <td class="text-center"><?php echo number_format($value['price']* $value['quantity']) ; ?></td>
                                            

                                            </tr>
                                        <?php endforeach; ?>
                                    

                                    </tbody>

                                </table>
                                

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <hr>
                                        <p style="font-weight: bold;">Tổng cộng: <span> </span><?php echo number_format($totol_price); ?> <span>VND</span></p>
                                        <input type="submit"  class="btn btn-primary" value="Xác nhận" name="submit">
                                    </div>
                                    <div class="panel-body deess">

                                    </div>

                                </div>

                            
                            </div>
                        </div>
                            
                    </div>
                </form>

                <?php
                    
                    if(isset($_POST['submit'])){
                        $nameNN = $_POST['nameNN'];
                        $phoneNN  = $_POST['phoneNN'];
                        $address = $_POST['address'];
                        $HTTT = $_POST['HTTT'];
                        $iduser =  $_SESSION['idkh'];
                        
                
                        $Hoa_don = "INSERT INTO `don_hang`(`DH_TENNGUOINHAN`, `DH_SDTNN`, `DH_TONGTIEN`, `HTTT_MA`, `KH_MA`, `DH_DIACHI`) VALUES ('$nameNN','$phoneNN','$totol_price','$HTTT',' $iduser','$address')";
                        $resultHoa_don = $con->query($Hoa_don);
                      
                        
                        if($resultHoa_don){
                            $last_id = $con->insert_id;
                            foreach($cart as $value){
                              
                                $SP_MA = $value['id'];
                                $M_MA = $value['color'];
                                $S_MA = $value['size'];
                                $CTDH_SOLUONG = $value['quantity'];

                                $CT = "INSERT INTO `chi_tiet_don_hang`( `SP_MA`, `M_MA`, `S_MA`, `DH_MA`, `CTDH_SOLUONG`) VALUES ('$SP_MA',' $M_MA','$S_MA','$last_id','$CTDH_SOLUONG')";
                                $con->query($CT);
                            }
                            unset($_SESSION['cart']);
                            echo "<script type='text/javascript'>
                                alert('Xác nhận đơn hàng thành công!');
                                document.location='client-product.php';
                            </script>";
                            
                           
                        }
                    }
                ?>
                <!-- code in here -->.

                <!--  -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" nếu bạn muốn thoát khỏi phiên làm việc hiện tại.</div>
                <div class="modal-footer">
                    <form action="" method="post">

                        <input type="submit" class="btn btn-primary" value="Đăng xuất" name="logout">

                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>