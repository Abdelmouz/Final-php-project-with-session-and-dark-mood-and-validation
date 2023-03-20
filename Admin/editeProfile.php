<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(3, 2);

$id_admin = $_SESSION['admin']['id'];
$select_user = "SELECT * FROM `admins` where `id`='$id_admin'";
$s_user  = mysqli_query($coon, $select_user);
$data_user = mysqli_fetch_assoc($s_user);

if (isset($_POST['btn_edite'])) {
    $name = filtervalidation($_POST['name']);
    $pass = filtervalidation($_POST['pass']);
    $hashpass = sha1($pass);
    $role = $data_user['roles'];
    if (!empty($name) && !empty($pass)) {
        $UPDATE = "UPDATE `admins` SET `username` = '$name',`password`='$hashpass' WHERE `id` = '$id_admin'";
        $s = mysqli_query($coon, $UPDATE);
        testfunctionsql($s, "UPDATE");
        path("Admin/profile.php");
    }
}
?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Add Admin</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" name="name" value="<?= $data_user['username'] ?>" class="form-control mt-1">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="pass" class="form-control mt-1">
                </div>
                <button name="btn_edite" class="btn btn-success mt-3 w-100">Save Edite</button>
            </form>
        </div>
    </div>
</div>


<?php
include "../shard/script.php";
?>