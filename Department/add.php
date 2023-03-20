<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(3, 2, 1);
if (isset($_POST['btn_add'])) {
    $name = $_POST['name'];
    $insert = "INSERT INTO `department`  VALUES (NULL, '$name', current_timestamp()) ";
    $i = mysqli_query($coon, $insert);
    path("department/list.php");
}
?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Add Depatment</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Name Department :</label>
                    <input type="text" name="name" class="form-control mt-2">
                </div>
                <button name="btn_add" class="btn btn-primary mt-3 w-100">Create Department</button>
            </form>
        </div>
    </div>
</div>


<?php
include "../shard/script.php";
?>