<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";
auth();

if(isset($_POST['addAdmin'])){
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$insert = "INSERT INTO `admin` VALUES (NULL , '$name' , '$phone' , '$email' , $password)";
$i = mysqli_query($connect,$insert);
}
?>
<p class="text-center display-6 "> ADD PAGE </p>
<h1 class="text-center display-3"> ADD ADMIN </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" >
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="d-grid gap-2">
                    <button name="addAdmin" class="btn btn-outline-success">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>