<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";



if (isset($_POST['addMedicine'])) {
    $medicine_title = $_POST['medicine_title'];
    $image_name = time() . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/";
    move_uploaded_file($image_tmp, $location . $image_name);
    $medicine_description = $_POST['medicine_description'];
    $price = $_POST['price'];
    $insert = "INSERT INTO `medicines` VALUES (NULL , '$medicine_title' , '$image_name' , '$medicine_description',$price)";
    $i = mysqli_query($connect, $insert);
}
if (isset($_SESSION['pharmacist'])) {
} else {
    header('location:/Pharmacy/pharmacistPanel/pages-error-404.php');
}
?>

<div class="mt-5">
    <h5 class="text-center display-6 mt-5"> Add Medicine </h5>
</div>



<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Medicine Title</label>
                    <input type="text" name="medicine_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Medicine Description</label>
                    <input type="text" name="medicine_description" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Medicine Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success" name="addMedicine">Add Medicine</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "../shared/footer.php";
include "../shared/script.php";
?>