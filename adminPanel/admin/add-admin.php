<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";
$wrongData = false;
if (isset($_POST['addAdmin'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "../../Images/";
    $extension = pathinfo($_FILES['image']['name'] , PATHINFO_EXTENSION);
    $_FILES['image']['name'] = $_POST['name'] . $_POST['phone'] . "." . $extension;
    $image_name = $_FILES['image']['name'];
    if(empty($name) || empty($phone) || empty($email) || empty($password) || empty($image_name)) {
        $wrongData = true;
    } else {
        move_uploaded_file($image_tmp, $location . $image_name);
        $insert = "INSERT INTO `admin` VALUES (NULL , '$name' , '$phone' , '$email' , $password , '$image_name')";
        $i = mysqli_query($connect, $insert);
        if($i) {
            $insertedSucess = true;
        } else {
            $wrongData = true;
        }
    }
}
auth();

?>
<p class="text-center display-6 "> ADD PAGE </p>
<h1 class="text-center display-3"> ADD ADMIN </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Image</label> 
                    <br>
                    <input type="file" name="image" >
                </div>

                <div class="d-grid gap-2">
                    <button name="addAdmin" class="btn btn-outline-success">Add Admin</button>
                </div>
            </form>
            <?php if(isset($insertedSucess)) { ?>
                <div class="alert alert-success mt-3">Inserted Successfully Into Database.</div>
            <?php } ?>
            <?php if($wrongData) { ?>
                <div class="alert alert-danger mt-3">Something Went Wrong! Enter Valid Data</div>
            <?php } ?>

        </div>
    </div>
</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>