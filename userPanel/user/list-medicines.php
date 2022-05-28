<?php
include "../general/env.php";
include "../shared/head.php";
include "../shared/header.php";
auth();
?>
<p class="text-center display-5"> Customers </p>
<h1 class="text-center display-3"> Medicines </h1>
<div class="container col-md-5">
    <div class="card">
        <div class="card-body">
            <table class="table ">
                <tr>
                    <th>Title</th>
                    <th>ACTION</th>
                </tr>
                <tr>
                    <td> </td>
                    <td> <a class="btn btn-dark"> <i class="fa-solid fa-eye"></i> </a>
                        <a class="btn btn-warning"> <i class="fa-solid fa-user-pen"></i> </a>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><i class="fa-solid fa-trash-can"></i> </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<?php
include "../shared/footer.php";
include "../shared/script.php";
?>