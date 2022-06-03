<?php
auth();
?>


<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="/pharmacy/userPanel/index.php">MediaLap</a></h1>
    <!-- ======= Nav ======= -->
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/pharmacy/userPanel/index.php">Home</a></li>
        <?php if ($_SESSION['email'] == "") { ?>
          <li><a class="nav-link scrollto" href="/pharmacy/userPanel/user/pages-register.php">Register</a></li>
          <li><a class="nav-link scrollto" href="/pharmacy/userPanel/user/pages-login.php">Login</a></li>
        <?php } ?>
        <li class="dropdown">
          <a href="#"><span>Orders</span>
            <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="/pharmacy/userPanel/user/list-orders.php">View Order</a></li>
          </ul>
        </li>
        <!-- dropdown-menu-end dropdown-menu-arrow profile -->
        <!-- ======= User Info ======= -->

        <li class="dropdown ">
          <a href="#">
            <img src="/pharmacy/Images/<?php echo $_SESSION['userImage'] ?>" alt="Profile" class="rounded-circle" style="max-height: 35px;">
            <span><?php echo $_SESSION['name']; ?></span>
            <i class="bi bi-chevron-down"></i>
          </a>

          <!-- dropdown-menu -->
          <ul class="">
            <li style="display: flex ; justify-content: flex-start;">
              <a href="/pharmacy/userPanel/user/users-profile.php" class="">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span style="margin-left: 5px"> Profile</span>
              </a>
            </li>
            <!-- action="< ?php $_SERVER['PHP_SELF']; ?>" -->
            <form method="POST">
              <li>
                <button class="btn btn-danger" name="user-logout">Logout</button>
              </li>
              <!-- <button class="btn btn-danger" name="logout">Logout</button> -->
            </form>
          </ul>

        </li>

        <!-- ======= End User Info ======= -->

      </ul>
    </nav>
    <!-- ======= End Nav ======= -->
  </div>
</header>
<!-- End Header -->


<!-- Notice: Undefined index: name in C:\xampp\htdocs\userPanel\shared\header.php on line 28
Notice: Undefined index: name in C:\xampp\htdocs\userPanel\shared\header.php on line 28 Notice: Undefined index: email in C:\xampp\htdocs\userPanel\general\env.php on line 11 Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\userPanel\general\env.php:11) in C:\xampp\htdocs\userPanel\general\env.php on line 13
Notice: Undefined index: email in C:\xampp\htdocs\userPanel\general\env.php on line 11

Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\userPanel\shared\header.php:31) in C:\xampp\htdocs\userPanel\general\env.php on line 13




Notice: Undefined index: name in C:\xampp\htdocs\userPanel\shared\header.php on line 28

Notice: Undefined index: email in C:\xampp\htdocs\userPanel\general\env.php on line 11

Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\userPanel\general\env.php:11) in C:\xampp\htdocs\userPanel\general\env.php on line 13 -->