<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
auth();
?>
<p class="text-center display-5"> Customers </p>
<h5 class="text-center display-3"> Show Customer PAGE </h5>
<div class="container col-md-4 mt-5 text=center">
    <div class="card">
        <img src="/hospital/doctor/upload/<?php echo $row['image'] ?>" class="img-top" alt="">
        <div class="card-body">

        </div>
    </div>
</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>