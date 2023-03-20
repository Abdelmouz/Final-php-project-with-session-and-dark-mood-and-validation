<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(1);

$select = "SELECT * FROM `roles`";
$s = mysqli_query($coon, $select);
if (isset($_GET['edite_id'])) {
    $id = $_GET['edite_id'];
    $select_user = "SELECT * FROM `adminsroyles` where `id`='$id'";
    $s_user  = mysqli_query($coon, $select_user);
    $data_user = mysqli_fetch_assoc($s_user);
}
if (isset($_POST['btn_add'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $hashpass = sha1($pass);
    $rule = $_POST['rule'];
    $update = " UPDATE `admins` SET `username` = '$name',`password`='$hashpass',`roles`='$rule' WHERE `id` = '$id'";
    $s = mysqli_query($coon, $update);
    testfunctionsql($s, "insert");
    path("Admin/list.php");
}
?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Edite Admin</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" name="name" value="<?= $data_user['username'] ?>" class="form-control mt-1">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="text"  name="pass" class="form-control mt-1">
                </div>
                <div class="form-group">
                    <label>rules :</label>
                    <select name="rule" class="form-control">
                        <option value="3" selected disabled>Choose rules</option>
                        <?php foreach ($s as $data) : ?>
                            <option value=" <?= $data['id'] ?>"><?= $data['desciption'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name=" btn_add" class="btn btn-primary mt-3 w-100">Create New Admin</button>
            </form>
        </div>
    </div>
</div>


<?php
include "../shard/script.php";
?>