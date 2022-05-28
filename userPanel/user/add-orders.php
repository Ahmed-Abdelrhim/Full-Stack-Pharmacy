<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
auth();
?>
<h1 class="text-center display-3"> MAKE ORDER </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Order Amount</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Order Descripation</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Medicine ID</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Customer ID</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-success" type="button">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>