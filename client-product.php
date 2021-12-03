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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <style>
        a:hover{
            text-decoration: none;
        }
        .card:hover{
            
        box-shadow: 3px 5px 16px rgba(58, 99, 139, 0.692);
        transform: translate(0px,-2px);

        }
    </style>

</head>

<?php
    require_once "./database/database_connection.php";


?>

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
                while($rowLSP = $resultLSP->fetch_assoc()){
            ?>
                <li class="nav-item">
                   <?php
                        echo "<a class='nav-link' href='client-product.php?id=". $rowLSP['LH_MA'] ."'>";
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
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content">

                <!-- End of Topbar -->
                
                <!-- Topbar -->
                
        
                <!-- /.container-fluid -->
                <?php require 'header.php'; ?>

                <?php
                    // require_once "./database/database_connection.php";
                    $sqlShowSP="SELECT * FROM san_pham";
                    $resultShowSP = $con->query($sqlShowSP);
                    
                    echo"
                       
                        <div class='title' style='margin-top: 50px;margin-left: 20px;'>
                            <h2 style=' margin-left: 15px;' >Các sản phẩm của shop</h2>
                        
                        </div>
                        <div class='row row-cols-auto' style=' margin-left: 15px;'>
                    ";
                    while($rowShowSP = $resultShowSP->fetch_assoc()){
                        echo "
                            <div class='col' style='padding: 10px; margin-left: 15px;'>
                                <a href='client-product-details.php?id=". $rowShowSP['SP_MA'] ."'>
                                    <div class='card' style='width: 18rem;'>
                                        <img src='./img/admin/". $rowShowSP['SP_ANH'] ."' class='card-img-top'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $rowShowSP['SP_TEN'] ."</h5>
                                            <p class='card-text'>". $rowShowSP['SP_GIA'] ."<span> VND</span></p>
                                            <p  class='btn btn-primary btn-sm'>sale</p>
                                        </div>
                                    </div>
                                </a>
                            </div>  
                        ";
                    }    
                    echo "  
                    </div>";      
                
                ?>

                <!-- code in here -->.

                <!--  -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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