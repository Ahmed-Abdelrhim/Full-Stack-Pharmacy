<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";
auth();
$updatePassword = false;
if (isset($_POST['save'])) {
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];
  $confrimNewPassword = $_POST['confrimNewPassword'];
  $id = $_SESSION['adminID'];
  $select = "SELECT * FROM `admin` WHERE id = $id ";
  $s = mysqli_query($connect, $select);
  $row = mysqli_fetch_assoc($s);

  if ($currentPassword === $row['password']) {
    if ($newPassword === $confrimNewPassword) {
      $id = $_SESSION['adminID'];
      $newPassword = $_POST['newPassword'];
      $update = "UPDATE `admin` SET password = '$newPassword' WHERE id = $id";
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
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="/pharmacy/Images/<?php if(isset($_SESSION['adminEmail'])) {echo $_SESSION['adminImage'];
            } else {echo $_SESSION['pharImage'];} ?>" alt="Profile" class="rounded-circle">

            <h2><?php if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminName']; } 
            else {echo $_SESSION['pharName'];} ?></h2>
            <h3>Full Stack Developer</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
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
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
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
                <p class="small fst-italic">Hi <?php if(isset($_SESSION['adminEmail'])) {echo $_SESSION['adminName'];} 
                else {echo $_SESSION['pharName'];}?>here is your profile information that you can edit any of your email information.</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?php  if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminName'];} 
                else {echo $_SESSION['pharName'];}?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">Full Stack Developer</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">Egypt</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">0<?php  if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminPhone'];} 
                else {echo $_SESSION['pharPhone'];}?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?php if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminEmail'];} 
                else {echo $_SESSION['pharEmail'];}?> </div>
                </div>

                <?php if ($updatePassword) { ?>
                  <div class="alert alert-success">Password Updated Sucessfully</div>
                <?php } ?>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form>
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <!-- <img src="assets/img/profile-img.jpg" alt="Profile"> -->
                      <img src="/pharmacy/Images/<?php if(isset($_SESSION['adminImage'])) {echo $_SESSION['adminImage'];
                      } else {echo $_SESSION['pharImage'];} ?>" alt="Profile">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="<?php  
                      if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminName'];} 
                      else {echo $_SESSION['pharName'];}?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <p name="about" class="form-control" id="about" style="height: 100px"> 
                        Hi <?php if(isset($_SESSION['adminEmail'])) {echo $_SESSION['adminName'];} 
                        else {echo $_SESSION['pharName'];}?>
                        here is your profile information that you can edit any of your email information.
                      </p>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="Full Stack Developer">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="Egypt">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="0<?php 
                      if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminPhone'];} 
                      else {echo $_SESSION['pharPhone'];}?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?php 
                      if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminEmail'];} 
                      else {echo $_SESSION['pharEmail'];}?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
                <!-- End Profile Edit Form -->

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