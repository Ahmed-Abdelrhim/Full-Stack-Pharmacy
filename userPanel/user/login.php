<?php
include "../general/env.php";
include "../shared/head.php";
$userFailed = 1;
if (isset($_POST['login'])) {
    // $userFailed = true;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `customers` WHERE `email` = '$email' and `password` = '$password' ";
    $sel = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($sel);
    $numRows = mysqli_num_rows($sel);
    if ($sel > 0) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['customer_id'] = $row['customer_id'];
        $_SESSION['userImage'] = $row['image'];
        header("location:/pharmacy/userPanel/index.php");
    }
    // else {
    //     $numRows < 0;
    //     echo "<div class='alert alert-danger' role='alert'>Username or Password is Wrong!</div>";
    // }
}

?>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                <form class="row g-3 needs-validation" method="POST">

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-envelope lock" style="color: #0d6efd;"></i></span>
                                            <input type="email" name="email" class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>  

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock lock" style="color: #0d6efd;"></i></span>
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
                                        <p class="small mb-0">Don't have account? <a href="pages-register.php">Create an account</a></p>
                                    </div>
                                </form>
                                <?php if (isset($numRows) && $numRows < 0) { ?>
                                    <div class="alert alert-danger">Wrong</div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main>


<?php
include "../shared/script.php";
?>