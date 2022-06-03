<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";
auth();


$select = "SELECT * FROM `customers`";
$sel = mysqli_query($connect, $select);


?>
<p class="text-center display-5"> Customers </p>
<h1 class="text-center display-3"> Customers </h1>
<div class="container col-md-6 ">
    <div class="row">

        <div class="card  mx-auto col-6">
            <?php foreach ($sel as $data) { ?>
                <div class="card-body">
                    <div class="card mx-auto " style="width: 18rem;">
                        <div class="card-body">
                            <img src="../../Images/<?php echo $data['image'] ?>" class="card-img-top">

                            <p class="card-text"><span class="text-primary "> Name:</span> <?php echo $data['name'] ?> </p>
                            <p class="card-text"><span class="text-primary "> Email:</span> <?php echo $data['email'] ?></p>
                            <p class="card-text"> <span class="text-primary"> Phone:</span> 0<?php echo $data['phone'] ?></p>
                            <p class="card-text"><span class="text-primary "> Adress: </span> <?php echo $data['address'] ?></p>

                            <a class="btn btn-dark"> <i class="fa-solid fa-eye"></i> </a>
                            <a class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i> </a>
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><i class="fa-solid fa-trash-can"></i> </a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>