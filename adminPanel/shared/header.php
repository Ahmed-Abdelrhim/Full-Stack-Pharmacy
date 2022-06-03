<?php
auth();
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/pharmacy/adminPanel/index.php" class="logo d-flex align-items-center">
            <img src="/pharmacy/adminPanel/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Admin Panel</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <!-- Show Customers To Admin -->
                <?php if (isset($_SESSION['adminEmail'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/pharmacy/adminPanel/admin/list-customers.php">Customers</a>
            </li>
        <?php } ?>

        <!-- <?php if ($_SESSION['email'] == "") { ?>
            <li class="nav-item">
                <a class="nav-link" href="/pharmacy/adminPanel/admin/pages-login.php">Login</a>
            </li>
        <?php } ?> -->

        <!-- Show Add Branches To Admin -->
        <?php if (isset($_SESSION['adminEmail'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/pharmacy/adminPanel/admin/add-branches.php">Branches</a>
            </li>
        <?php } ?>

        <!-- Show Add Pharmacist To Admin -->
        <?php if (isset($_SESSION['adminEmail'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/pharmacy/adminPanel/admin/add-pharmacist.php">Pharmacist</a>
            </li>
        <?php } ?>

        <!-- Show Add Medicine To Pharmcisit-->
        <?php if (isset($_SESSION['pharEmail'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/pharmacy/adminPanel/admin/add-medicine.php">Add Medicine</a>
            </li>
        <?php } ?>

        <!--S -->
        <?php if (isset($_SESSION['adminEmail'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="/pharmacy/adminPanel/admin/add-admin.php">Admin </a>
            </li>
        <?php } ?>

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/pharmacy/Images/<?php if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminImage'];
            } else {echo $_SESSION['pharImage'];} ?>" alt="Profile" class="rounded-circle">

            <span class="d-none d-md-block dropdown-toggle ps-2"><?php if(isset($_SESSION['adminEmail'])) {
                echo $_SESSION['adminName'];
            } else {
                echo $_SESSION['pharName'];
            }?>            
            </span>
        </a>
        <!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6><?php if(isset($_SESSION['adminEmail'])) {
                echo $_SESSION['adminName'];
            } else {
                echo $_SESSION['pharName'];
            }?></h6>
                <span>Full Stack Developer</span>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="/pharmacy/adminPanel/admin/users-profile.php">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <li name="logout">
                    <a class="dropdown-item d-flex align-items-center" name="logout" style="cursor: pointer;">
                        <i class="bi bi-box-arrow-right"></i>
                        <span name="logout">Sign Out</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <button class="btn btn-danger" name="logout">Sign Out</button>
            </form>

        </ul>
        <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->