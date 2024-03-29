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
    if(!isset($_SESSION['admin'])){
        header("Location:./login.php");
    }

    //session_start();
    if(isset($_SESSION['admin'])){
        $sql = "SELECT * FROM nhan_vien WHERE NV_MA = '" . $_SESSION['admin'] . "'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();// tra ve mot dong ket qua
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['admin']);
        header("Location:./login.php");
    }

    
    $sql ="SELECT * FROM san_pham" ;
    $result = $con->query($sql);      

    if(isset($_POST['submit-add'])){
        $tenSp = $_POST['name_product'];
        $details = $_POST['details'];

        $sqlDetails = "INSERT INTO `san_pham`( `SP_CT`) VALUES ('$details') WHERE SP_MA = $tenSp ";

        if($con->query($sqlDetails) === TRUE){
            echo "<script type='text/javascript'>
                        alert('Thêm sản phẩm thành công!');
                        document.location='dashboard-product-details.php';
                    </script>";
        }else{
            echo "<script type='text/javascript'>
                        alert('Thêm sản phẩm không thành công!');
                        document.location='dashboard-product-details.php';
                    </script>";
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- /.container-fluid -->

                <!-- code in here -->.
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Chi tiết sản phẩm</h1>

                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <form method="post" action="">
                            <div class="input-group">
                                 <input type="text" class="form-control bg-light border-1 small" name = "search"  placeholder="Tìm kiếm tên sản phẩm" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="submitSearch" >
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Chi tiết sản phẩm</th>
                                <th scope="col" class="text-center" >Thao Tác</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          
                            <?php 

                                if(isset($_POST['submitSearch'])){
                                    $sqlsp = "SELECT * FROM `san_pham` as sp JOIN loai_san_pham as lsp ON sp.LH_MA = lsp.LH_MA JOIN nha_san_xuat as nsx ON sp.NSX_MA = nsx.NSX_MA 
                                         WHERE sp.SP_TEN LIKE '%" . $_POST['search'] . "%'
                                    ";
                                    $resultsp = $con->query($sqlsp);
                                    $i = 1;
                                    while($rowsp = $resultsp->fetch_assoc()){
                                        echo "<tr>";
                                        echo " <th scope='row'>$i</th>";
                                        echo " <td class='col-2'> ". $rowsp['SP_TEN'] ." </td>";
                                        echo"<td class='col-6'> <textarea  class='form-control'> ". $rowsp['SP_CT'] ." </textarea> </td>";
                                        
                                        // echo " <td class='col-8'> ". $rowsp['SP_CT'] ." </td>";           
                                        echo " <td scope='row' class='text-center'> 
                                        <a href='./dashboard-product-details-edit.php?id=". $rowsp['SP_MA'] ."' type='button' class='btn btn-primary btn-small'><i class='bi bi-pencil'></i>Sữa</a>
                                        </td>";
    
                                        echo " </tr>";
                                        $i++;
                                    }
                                }else{
                                    $sqlsp = "SELECT * FROM `san_pham` as sp JOIN loai_san_pham as lsp ON sp.LH_MA = lsp.LH_MA JOIN nha_san_xuat as nsx ON sp.NSX_MA = nsx.NSX_MA";
                               $resultsp = $con->query($sqlsp);
                               $i = 1;
                               while($rowsp = $resultsp->fetch_assoc()){
                                   echo "<tr>";
                                   echo " <th scope='row'>$i</th>";
                                   echo " <td class='col-2'> ". $rowsp['SP_TEN'] ." </td>";
                                   echo"<td class='col-6'> <textarea  class='form-control'> ". $rowsp['SP_CT'] ." </textarea> </td>";
                                   
                                   // echo " <td class='col-8'> ". $rowsp['SP_CT'] ." </td>";           
                                   echo " <td scope='row' class='text-center'> 
                                   <a href='./dashboard-product-details-edit.php?id=". $rowsp['SP_MA'] ."' type='button' class='btn btn-primary btn-small'><i class='bi bi-pencil'></i>Sữa</a>
                                   </td>";

                                   echo " </tr>";
                                   $i++;
                               }
                                }
                               
                             ?>
                        </tbody>

                    </table>
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
    <?php
        $sqlAdmin = "SELECT * FROM nhan_vien WHERE NV_MA = '" . $_SESSION['admin'] . "'";
        $resultadmin = $con->query($sqlAdmin);
        $rowAdmin = $resultadmin->fetch_assoc();
    ?>                          
     <!-- profile -->
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
                       <input  type="submit" class="btn btn-primary" value="Đăng xuất" name="logout">
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