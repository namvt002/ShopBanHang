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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>


<?php
    require_once "./database/database_connection.php";
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location:./login.php");
    }

    //session_start();
    if (isset($_SESSION['admin'])) {
        $sql = "SELECT * FROM nhan_vien WHERE NV_MA = '" . $_SESSION['admin'] . "'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc(); // tra ve mot dong ket qua
    }

    if (isset($_POST['logout'])) {
        unset($_SESSION['admin']);
        header("Location:./login.php");
    }

    $sqlEditNH = "SELECT * FROM chi_tiet_phieu_nhap AS ct 
    JOIN san_pham AS sp ON ct.SP_MA = sp.SP_MA
    JOIN kho_hang AS kh ON ct.K_MA = kh.K_MA
    JOIN size AS s ON ct.S_MA = s.S_MA
    JOIN mau AS m ON ct.M_MA = m.M_MA WHERE ct.CTPN_MA = '".$_GET['id'] ."'";;
    $resultEditNH = $con->query($sqlEditNH);
    $rowEditNH  = $resultEditNH ->fetch_assoc();


    $sqlsp = "SELECT * FROM san_pham";
    $resultsp = $con->query($sqlsp);

    $sqlMau = "SELECT * FROM mau";
    $resultMau = $con->query($sqlMau);

    $sqlSize = "SELECT * FROM size";
    $resultSize = $con->query($sqlSize);

    $sqlKho = "SELECT * FROM `kho_hang`";
    $resultKho = $con->query($sqlKho);

    if(isset($_POST['submit_edit'])){

        try{
            $nameProduct = $_POST['name_product'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $warehouse = $_POST['warehouse'];
            
        

            $sqlNH ="UPDATE `chi_tiet_phieu_nhap` SET `K_MA`='$warehouse',`M_MA`='$color',`S_MA`='$size',`SP_MA`='$nameProduct',`CTPN_SOLUONG`='$quantity',`CTPN_DONGIA`='$price' WHERE CTPN_MA = '".$_GET['id'] ."'";

            if(!$con->query($sqlNH) ===TRUE){
                echo "<script type='text/javascript'>
                        alert('Cập nhật nhập hàng không thành công!');
                        document.location='dashboard-warehouse-import.php';
                    </script>";
            }else{
                echo "<script type='text/javascript'>
                        alert('Cập nhật nhập hàng thành công!');
                        document.location='dashboard-warehouse-import.php';
                    </script>";
            }   
        }catch(PDOException $e){
            printf($e->getMessage());
        }
    }
        

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index-admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">A&T Shop Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index-admin.php   ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lý thống kê</span></a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="dashboard-staff-add.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Thêm nhân viên</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-client-view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Khách hàng</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Giao diện
            </div>

            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Về trang chủ</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="dashboard-order.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Đơn hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-product.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sản phẩm</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-category-add.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Danh mục sản phẩm</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-product-details.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Chi tiết sản phẩm</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-warehouse.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kho hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-warehouse-import.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Nhập hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard-promotion.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Khuyến mãi</span></a>
            </li>
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

            <!-- Main Content -->
            <div id="content">

                <!-- End of Topbar -->

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $row['NV_TEN']; ?> </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModel">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hồ sơ
                                </a>
                               
                                <a class="dropdown-item" href="login.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng nhập
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- /.container-fluid -->

                <!-- code in here -->.
                <div class="container-fluid">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật nhập hàng</h5>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Tên sản phẩm:</label> <br>
                                    <select class='form-control' name='name_product'>
                                    <option value="<?php echo $rowEditNH['SP_MA']; ?>"> <?php  echo   $rowEditNH['SP_TEN'];?></option>
                                        <?php

                                        while ($rowsp = $resultsp->fetch_assoc()) {
                                            echo " <option value=" . $rowsp['SP_MA'] . ">";
                                            echo   $rowsp['SP_TEN'];
                                            echo " </option>";
                                        }
                                        $result->free();
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Chọn số lượng:</label>
                                    <input type="number" id="quantity" name="quantity" value= "<?php echo $rowEditNH['CTPN_SOLUONG']; ?>" min="1" max="100">
                                </div>

                                <div class="form-group">
                                    <label>Giá nhập:</label> <br>
                                    <input type="text" name="price" class="form-control" value= "<?php echo $rowEditNH['CTPN_DONGIA']; ?>"  placeholder="Giá nhập sản phẩm">
                                </div>

                                <div class="form-group">
                                    <label>Size sản phẩm:</label> <br>
                                    <select class='form-control' name='size'>
                                    <option value="<?php echo $rowEditNH['S_MA']; ?>"> <?php  echo   $rowEditNH['S_TEN'];?></option>
                                        <?php

                                        while ($rowSize = $resultSize->fetch_assoc()) {
                                            echo " <option value=" . $rowSize['S_MA'] . ">";
                                            echo   $rowSize['S_TEN'];
                                            echo " </option>";
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Màu sản phẩm:</label> <br>
                                    <select class='form-control' name='color'>
                                    <option value="<?php echo $rowEditNH['M_MA']; ?>"> <?php  echo   $rowEditNH['M_TEN'];?></option>
                                        <?php

                                        while ($rowMau = $resultMau->fetch_assoc()) {
                                            echo " <option value=" . $rowMau['M_MA'] . ">";
                                            echo   $rowMau['M_TEN'];
                                            echo " </option>";
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kho hàng:</label> <br>
                                    <select class='form-control' name='warehouse'>
                                    <option value="<?php echo $rowEditNH['K_MA']; ?>"> <?php  echo   $rowEditNH['K_TEN'];?></option>
                                        <?php

                                        while ($rowKho = $resultKho->fetch_assoc()) {
                                            echo " <option value=" . $rowKho['K_MA'] . ">";
                                            echo   $rowKho['K_TEN'];
                                            echo " </option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit_edit" class="btn btn-primary" value="Cập nhật">
                                    <a href="./dashboard-warehouse-import.php" class="btn btn-secondary">Đóng</a>

                                </div>


                            </form>
                        </div>
                    </div>

                </div>
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

     <!-- profile -->

     <?php
        $sqlAdmin = "SELECT * FROM nhan_vien WHERE NV_MA = '" . $_SESSION['admin'] . "'";
        $resultadmin = $con->query($sqlAdmin);
        $rowAdmin = $resultadmin->fetch_assoc();
    ?>
     <div class="modal fade" id="profileModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <table class="table table-borderless">
                           
                            <tbody>
                                <tr>
                                    <th scope="row">Tên tài khoản:</th>
                                    <td><?php echo $rowAdmin['USER_NAME'] ?></td>
                                   
                                </tr>
                                <tr>
                                    <th scope="row">Họ và tên:</th>
                                    <td><?php echo $rowAdmin['NV_TEN'] ?></td>
                                </tr>
                              

                               
                            </tbody>
                        </table>
                        
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $rowAdmin['NV_SDT']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Địa chỉ Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $rowAdmin['NV_EMAIL']; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $rowAdmin['NV_DIACHI']; ?>">
                        </div>
                        
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Cập nhật" name="update-profile">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                        </div>

                    </form>
                </div>
                <?php

                    if(isset($_POST['update-profile'])){
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];  
                        $address = $_POST['address'];
                        $sqlUpdate = "UPDATE `nhan_vien` SET `NV_EMAIL`='$email',`NV_SDT`='$phone',`NV_DIACHI`='$address' WHERE NV_MA = '" . $_SESSION['admin'] . "'";
                        if($con->query($sqlUpdate)  === TRUE){
                            echo "<script type='text/javascript'>
                            alert('Cập nhật thành công!');
                          
                        </script>";
                        }else{
                            echo "<script type='text/javascript'>
                            alert('Cập nhật không thành công!');
                          
                            </script>";
                        }
                    }
                               
                ?>

            </div>
        </div>
    </div>

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