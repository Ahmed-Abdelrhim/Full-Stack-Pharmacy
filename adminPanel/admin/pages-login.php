<?php
include "../general/env.php";
include "../shared/head.php";


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  //admin select
  $admin = "SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password' ";
  $adminSel = mysqli_query($connect, $admin);
  $row = mysqli_fetch_assoc($adminSel);

  //admin check
  if (mysqli_query($connect, $admin)) {
    $_SESSION['adminID'] = $row['id'];
    $_SESSION['adminEmail'] = $row['email'];
    $_SESSION['adminName'] = $row['name'];
    $_SESSION['adminPhone'] = $row['phone'];
    $_SESSION['adminPassword'] = $row['password'];
    $_SESSION['adminImage'] = $row['image'];
    header("location:/pharmacy/adminPanel/index.php");
  } 

  //pharmcisit select
  $pharmcisit = "SELECT * FROM `pharmacist` WHERE `email` = '$email' and `password` = '$password' ";
  $pharmcisitSel = mysqli_query($connect, $pharmcisit);
  $rowPhar = mysqli_fetch_assoc($pharmcisitSel);

  //pharmcisit check 
  if (mysqli_query($connect, $pharmcisit)) {
    $_SESSION['pharID'] = $rowPhar['id'];
    $_SESSION['pharEmail'] = $rowPhar['email'];
    $_SESSION['pharName'] = $rowPhar['name'];
    $_SESSION['pharPhone'] = $rowPhar['phone'];
    $_SESSION['pharBranch_id'] = $rowPhar['branch_id'];
    $_SESSION['pharPassword'] = $rowPhar['password'];
    $_SESSION['pharImage'] = $rowPhar['image'];
    header("location:/pharmacy/adminPanel/index.php");
  } 
}
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="POST">

                  <!-- Email-->
                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <!-- <span class="bi bi-envelope lock"></span> -->
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-envelope lock"></i></span>
                      <input type="text" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <!-- Password -->
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock lock"></i></span>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="login">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="/pharmacy/adminPanel/admin/pages-register.php">Create an account</a></p>
                  </div>
                </form>
                <?php if (isset($userFailed) && $userFailed == true) { ?>
                  <div class="alert alert-danger">Username or Password is Wrong!</div>
                <?php } ?>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main>
<!-- End #main -->

<?php
include "../shared/script.php";
?>