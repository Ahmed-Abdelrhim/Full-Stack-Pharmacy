<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
include "../shared/side.php";
auth();

$select = "SELECT * FROM `admin`";
$admin = mysqli_query($connect, $select);

if (isset($_POST['addBranch'])) {
    $location = $_POST['location'];
    $admin_id = $_POST['admin_id'];
    $insert = "INSERT INTO `branches` VALUES (NULL , '$location' , $admin_id)";
    $i = mysqli_query($connect, $insert);
}
?>

<p class="text-center display-6 "> ADD PAGE </p>
<div class="mt-5">
    <h5 class="text-center display-6 mt-5"> ADD Branch </h5>
</div>



<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control">
                    <div class="form-text">Set a Branch you need</div>
                </div>
                <div class="mb-3">
                    <label for=""> Branch Manger : </label>
                    <select name="admin_id" class="form-control">
                        <?php foreach ($admin as $data) { ?>
                            <option value="<?php echo $data['id']; ?>"> <?php echo $data['name']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success" name="addBranch">Add Branch</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "../shared/footer.php";
include "../shared/script.php";
?>