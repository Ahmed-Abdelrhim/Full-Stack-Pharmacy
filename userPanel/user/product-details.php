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
        <div class="row mt-5">

            <?php foreach ($medicine as $data) { ?>
                <div class="med">
                    <div class="medicinecard">
                        <img src="../../Images/<?php echo $data['medicine_image']; ?>" class="img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $data['medicine_title'] ?></h5>
                            <p class="card-text" style="text-align: start; width:110%;"><?php echo $data['medicine_description'] ?></p>
                            <h5 class="card-title text-center">Price: <?php echo $data['price'] ?> L.E</h5>
                            <form action="list-orders.php" method="GET">
                                <a href="/pharmacy/userPanel/user/list-orders.php ?med_id=<?php echo $data['id']; ?>" onclick="return confirm('Confirm to buy?')" class="d-grid gap-2 btn btn-primary">Buy Now</a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- name="buy" -->
<!-- End Show Medicines Section -->
<?php
// include "./shared/footer.php";
include "../shared/script.php";
?>