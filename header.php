<?php
    require_once "./database/database_connection.php";
    session_start();

    if (isset($_POST['logout'])) {
        unset($_SESSION['idkh']);
        header("Location:./index.php");
    }
?>

<div id="menuTab">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <img class="img-profile rounded-circle" src="img/client/A & T.jpg" style="width: 50px; height:50px; margin-right: 50px;">

            <a class="navbar-brand" id="itemMenu" href="index.php">Trang chủ</a>
            <a class="navbar-brand" id="itemMenu" href="#aboutClient">Giới thiệu</a>
            <a class="navbar-brand" id="itemMenu" href="./client-product.php">Sản phẩm</a>
            <a class="navbar-brand" id="itemMenu" href="#">Liên hệ</a>

            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="Tìm kiếm sản phẩm " aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <a href="./client-product-view-cart.php">
                    <i class="iconwhite fas fa-shopping-cart"></i>
                </a>

                <nav class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 70px;">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?php
                            if (isset($_SESSION['idkh'])) {
                                $sql = "SELECT * FROM khach_hang WHERE KH_MA = '" . $_SESSION['idkh'] . "'";
                                $result = $con->query($sql);
                                $row = $result->fetch_assoc(); // tra ve mot dong ket qua
                                echo $row['KH_TEN'];
                            } else {
                                echo "Tài khoản";
                            }

                            ?>
                        </span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg" style="width: 50px; height:50px;">
                    </a>

                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="client-profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Trang cá nhân
                        </a>
                       
                        <a class="dropdown-item" href="login.php">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đăng nhập
                        </a>
                        <a class="dropdown-item" href="register.php">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đăng ký
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đăng xuất
                        </a>
                    </div>

                </nav>


            </div>

        </div>
    </nav>
</div>