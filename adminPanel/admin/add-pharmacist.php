<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";
auth();

$select = "SELECT * FROM `branches`";
$branch = mysqli_query($connect, $select);
$wrongData = false;

if (isset($_POST['addPharmacist'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $branch_id = $_POST['branch_id'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "../../Images/";
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $_FILES['image']['name'] = $_POST['name'] . $_POST['phone'] . "." . $extension;
    $image_name = $_FILES['image']['name'];
    if(empty($name) || empty($phone) || empty($email) || empty($password) || empty($image_name)) {
        $wrongData = true;
    } else {
        $insert = "INSERT INTO `pharmacist` VALUES  (NULL,'$name' , $phone , '$email' , '$password' , $branch_id ,'$image_name')";
        $i = mysqli_query($connect, $insert);
        if($i) {
            $insertedSucess = true;
        } else {
            $wrongData = true;
        } 
    }

}
//INSERT INTO `pharmacist`('name','phone','email','password','branch_id') VALUES ('yasser' , '011500' , 'yasser@gmail.com' , 011500 , 1);
//INSERT INTO `pharmacist` VALUES (NULL,'yasser' , '011500' , 'yasser@gmail.com' , 011500 , 1);

?>

<p class="text-center display-6 "> ADD PAGE </p>
<h5 class="text-center display-3"> ADD PHARMACIST </h5>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input name="phone" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email address</label>
                    <input name="email" type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for=""> Branches : </label>
                    <select name="branch_id" class="form-control">
                        <?php foreach ($branch as $data) { ?>
                            <option name="branch_id" value="<?php echo $data['branch_id']; ?>"> <?php echo $data['location']; ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success" name="addPharmacist">Add Pharmacist</button>
                </div>
            </form>
            <?php if (isset($insertedSucess)) { ?>
                <div class="alert alert-success mt-3">Inserted Successfully Into Database.</div>
            <?php }
            if ($wrongData) { ?>
                <div class="alert alert-danger mt-3">Something Went Wrong! Enter Valid Data</div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>