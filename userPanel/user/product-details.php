<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
//Select Medicines From Table medicines
$select = "SELECT * FROM `medicines`";
$medicine = mysqli_query($connect, $select);
foreach ($medicine as $data) {
    $med_id = $data['id'];
}
$cust_id = $_SESSION['customer_id'];
if (isset($_POST['buy'])) {
    $insert = "INSERT INTO `orders` VALUES(NULL, '' , $med_id, $cust_id)";
}
auth();
?>
<!-- Start Show Medicines Section -->
<section class="show-medicine">
    <div class="container">
        <div class="med">
            <!-- <?php foreach ($medicine as $data) { ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="../../Images/<?php echo $data['medicine_image']; ?>" alt="Panadol img" class="card-img-top">
                    <h5 class="card-title"><?php echo $data['medicine_title'] ?></h5>
                    <p class="card-text"><?php echo $data['medicine_description'] ?></p>
                    <p class="card-text">Price: <?php echo $data['price'] ?></p>
                    <a href="/pharmacy/userPanel/user/product-details.php" class="d-grid gap-2 btn btn-primary">Buy</a>
                </div>
            </div>
        <?php } ?> -->
            <?php foreach ($medicine as $data) { ?>
                <div class="card" style="width: 18rem;">
                    <img src="../../Images/<?php echo $data['medicine_image']; ?>" class="card-img-top" alt="Panadol img">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['medicine_title'] ?></h5>
                        <p class="card-text"><?php echo $data['medicine_description'] ?></p>
                        <form action="" method="POST">
                            <button href="#" class="d-grid gap-2 btn btn-primary" name="buy">Buy Now</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Show Medicines Section -->