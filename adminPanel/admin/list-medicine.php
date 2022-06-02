<?php
include "../shared/head.php";
include "../shared/header.php";
include "../general/env.php";
$select = "SELECT  *  FROM `medicines`  ";
$s = mysqli_query($connect, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `medicines` WHERE id = $id";
    $d = mysqli_query($connect, $delete);
    header('location:/pharmacy/adminPanel/admin/list-medicine.php');
}
?>
<p class="text-center display-5"> Customers </p>
<h5 class="text-center display-3"> Medicines </h5>
<div class="container col-3">
    <div class="row">
    <?php foreach ($s as $data) { ?>
        <div class="medicinecard">
            <div class="card-body">
                <img src="/pharmacy/adminPanel/admin/upload/<?php echo $data['medicine_image'] ?>" class="img-top" alt="">
                <h5> <?php echo $data['medicine_title'] ?> </h5>
                <p> <?php echo $data['medicine_description'] ?></p>
                <button class="btn btn-warning w-50 "> Order Now </button>
            </div>
        </div>
    <?php } ?>
</div>
</div>
</div>
<?php

include "../shared/footer.php";
include "../shared/script.php";
?>