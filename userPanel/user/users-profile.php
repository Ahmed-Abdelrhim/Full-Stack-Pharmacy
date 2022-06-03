<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";

auth();

$id =  $_SESSION['customer_id'];
$select = "SELECT * FROM `customers` where customer_id= $id";
$cust = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($cust);

$name = "";
$email = "";
$phone = "";
$address = "";

$update = false;


if ($_SESSION['customer_id']) {
  $id =  $_SESSION['customer_id'];
  $select = "SELECT * FROM `customers` where customer_id = $id";
  $S = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($S);
  $phone = $row['phone'];
  $address = $row['address'];
  $name = $row['name'];
  $email = $row['email'];
  $image_name = $row['image'];

  if (isset($_POST['update'])) {
    $update = true;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $image_name = time() . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "../../Images/";
    move_uploaded_file($image_tmp, $location . $image_name);
    $update = "UPDATE `customers` SET `name`= '$name' ,`email`= '$email' , phone = $phone ,`address`= '$address', `image`='$image_name' where customer_id = $id";
    $UP = mysqli_query($connect,  $update);
    header("location:/pharmacy/userPanel/user/users-profile.php");
  }
}
$updatePassword = false;
if (isset($_POST['save'])) {
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];
  $confrimNewPassword = $_POST['confrimNewPassword'];
  $id = $_SESSION['customer_id'];
  $select = "SELECT * FROM `customers` WHERE customer_id = $id ";
  $s = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($s);

  if ($currentPassword === $row['password']) {
    if ($newPassword === $confrimNewPassword) {
      $update = "UPDATE `customers` SET password = '$newPassword' WHERE customer_id = $id";
      $UP = mysqli_query($connect, $update);
      if ($UP) {
        $updatePassword = true;
      }
    }
  }
}

?>

<main id="main" class="main">

  <div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active"></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="/pharmacy/Images/<?php echo $_SESSION['userImage'] ?>" alt="Profile" class="rounded-circle">
            <h2><?php echo $_SESSION['name'] ?></h2>
            <h3><?php echo $_SESSION['email'] ?></h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <!-- <a href="#" class="linkedin"><?php echo $_SESSION['customer_id'] ?></a> -->
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile Details</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">Hi <?php echo $_SESSION['name'] ?> here is an overview of your information about your profile if you need to edit your profile information.</p>


                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name :</div>
                  <div class="col-lg-9 col-md-8"> <?php echo $_SESSION['name'] ?> </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address :</div>
                  <div class="col-lg-9 col-md-8"><?php echo $_SESSION['address'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone :</div>
                  <div class="col-lg-9 col-md-8">0<?php echo $_SESSION['phone'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email :</div>
                  <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email'] ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">image</div>
                  <div class="col-lg-9 col-md-8"><img class="rounded-circle" class="img-top" width="200px" src="/pharmacy/Images/<?php echo $_SESSION['image'] ?>"> </div>
                </div>

                <?php if ($updatePassword) { ?>
                  <div class="alert alert-success">Password Updated Sucessfully</div>
                <?php } ?>
              </div>
              <!-- end show -->

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="/pharmacy/images/<?php echo $_SESSION['userImage'] ?>" alt="Profile">
                      <div class="pt-2">
                        <input class="form-control" name="image" type="file">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="<?php echo $name ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?php echo $address ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px">Hi <?php echo $_SESSION['name'] ?> here is an overview of your information about your profile if you need to edit your profile information.</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="Egypt">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?php echo $_SESSION['address']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="0<?php echo $phone ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?php echo $email ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button name="update" type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>

                <!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
                <!-- Settings Form -->
                <form>
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST">

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newPassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confrimNewPassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button name="save" class="btn btn-primary">Change Password</button>
                  </div>
                </form>
                <!-- End Change Password Form -->

              </div>

            </div>
            <!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
<!-- End #main -->

<?php
include "../shared/footer.php";
include "../shared/script.php";
?>

