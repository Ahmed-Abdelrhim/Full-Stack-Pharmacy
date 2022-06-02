<!-- <?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
$cust_id = $_SESSION['customer_id'];

if (isset($_GET['med_id'])) {
    $med_id = $_GET['med_id'];
    $select = "SELECT * FROM `medicines` WHERE id = $med_id ";
    mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc(mysqli_query($connect, $select));
    $medicine_description = $row['medicine_description'];
    $insert = "INSERT INTO `orders` VALUES(NULL,'$medicine_description',$med_id,$cust_id)";
    $orderInserted = mysqli_query($connect, $insert);
    if ($orderInserted) {
        $quantity = $row['quantity'] - 1;
        $update = "UPDATE `medicines` SET quantity = $quantity WHERE id = $med_id";
        mysqli_query($connect, $update);
        if ($quantity <= 10) {
            $_SESSION['medicine_quantity'] = $row['medicine_title'] . " Qunatity Is" . $quantity;
        }
        if ($row['quantity'] == 0) {
            $del = "DELETE FROM `medicines` WHERE id = $med_id";
            mysqli_query($connect, $del);
        }
    }
}

if (isset($_POST['delete'])) {
    $del = "DELETE  FROM `orders` WHERE cust_id = $cust_id AND med_id = $med_id ";
    mysqli_query($connect, $del);
    header("location:/pharmacy/userPanel/user/list-orders.php");
}
$ordersSelect = "SELECT * FROM `orders` WHERE cust_id = $cust_id ";
$orders = mysqli_query($connect, $ordersSelect);

auth();
?>
<p class="text-center display-3" style="display: hidden;"> ORDERS </p>
<h5 class="text-center display-3"> ORDERS </h5>
<div class="conatainer">
    <!-- Start Card -->
    <?php foreach ($orders as $data) { ?>
        <div class="card col-xl-3 col-lg-3 col-md-6 col-sm-12" style="width: 18rem; margin-left: 5px">
            <!-- Show Order Details -->
            <?php if ($data['med_id'] != "") {
                $med_id = $data['med_id'];
                $s = "SELECT * FROM `medicines` WHERE id = $med_id";
                $medicines = mysqli_query($connect, $s);
                foreach ($medicines as $medicine) { ?>
                    <img src="../../Images/<?php echo $medicine['medicine_image']; ?>" alt="product-image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $medicine['medicine_title'] ?></h5>
                        <p class="card-text"><?php echo $medicine['medicine_description'] ?></p>
                        <form action="" method="POST">
                            <button name="delete" class="d-grid gap-2 btn btn-danger" onclick="return confirm('Are You Sure ?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>
                <?php }
            } else {  ?>
                <div class="card-body">
                    <h5 class="card-title">You Have No Orders</h5>
                </div>
            <?php } ?>
            <!-- End Order Details -->
        </div>
    <?php } ?>
    <!-- End Card -->
</div>

<?php
include "../shared/footer.php";
include "../shared/script.php";
?> -->