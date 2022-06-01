<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";

if (isset($_GET['med_id'])) {
    $medicine_description = $_GET['med_id'];
    // echo $medicine_description;
    // echo "Ahmed";
    // medicine_description = <?php echo $data['medicine_description'] ? >
    // $med_id = $_POST['med_id'];
    // $cus_id = $_SESSION['customer_id'];
    // $insert = "INSERT INTO `orders` VALUES(NULL,'$medicine_description',$med_id,$cus_id)";
    // mysqli_query($connect, $insert);
    // $select = "SELECT * FROM `medicines` WHERE 'id' = $med_id ";
    // $row = mysqli_fetch_assoc(mysqli_query($connect, $select));
    // $quantity = $row['quantity'] - 1;
    // $update = "UPDATE TABLE `medicines` SET 'quantity' = $quantity WHERE 'id' = $med_id ";
    // mysqli_query($connect, $update);
}



// Declare a variable and initialize it
$variable = "GeeksForGeeks is the best platform.";

// Display value of variable
echo $variable;
echo "\n";

// Use substr() and strpos() function to remove
// portion of string after certain character
$variable = substr($variable, 0, strpos($variable, "is"));

// Display value of variable
echo $variable;

auth();
?>

<div class="conatainer">
    Any Thing
</div>


<?php
include "../shared/script.php";
?>