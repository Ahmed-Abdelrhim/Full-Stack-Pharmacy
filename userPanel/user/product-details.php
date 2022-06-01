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
        <?php foreach ($medicine as $data) { ?>
            <div class="card" style="width: 18rem;">
                <img src="../../Images/<?php echo $data['medicine_image']; ?>" class="card-img-top" alt="Panadol img">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['medicine_title'] ?></h5>
                    <p class="card-text"><?php echo $data['medicine_description'] ?></p>
                    <form action="" method="GET">
                        <a href="/pharmacy/userPanel/user/list-orders.php? med_id=<?php echo $data['id'] ?>" class="d-grid gap-2 btn btn-primary">Buy Now</a>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- name="buy" -->
<!-- End Show Medicines Section -->
<?php
// include "./shared/footer.php";
include "../shared/script.php";
?>