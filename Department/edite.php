<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(3, 2, 1);
if (isset($_GET['edite_id'])) {
    $id = $_GET['edite_id'];
    $select = "SELECT * FROM `department` WHERE id=$id";
    $s = mysqli_query($coon, $select);
    $data = mysqli_fetch_assoc($s);
}
if (isset($_POST['btn_updata'])) {
    $id = $_GET['edite_id'];
    $name = $_POST['name'];
    $updata = "UPDATE `department` SET `name` = '$name' WHERE `id` = $id";
    $up = mysqli_query($coon, $updata);
    testfunctionsql($up, "updata");
    path("department/list.php");
}
?>


<div class="contaner  col-md-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Edite Department</h1>
    <div class="card card-form mt-5">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Name Department :</label>
                    <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control mt-2">
                </div>
                <button name="btn_updata" class="btn btn-primary mt-3 w-100">Update Name Department</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../shard/script.php";
?>