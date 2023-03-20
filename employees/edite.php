<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(1, 2);
$select_department = "SELECT * FROM `department`";
$s_department = mysqli_query($coon, $select_department);

if (isset($_GET['edite_id'])) {
    $id = $_GET['edite_id'];
    $select = "SELECT * FROM `employeeswithdepartment` where `id`=$id";
    $s = mysqli_query($coon, $select);
    $data = mysqli_fetch_assoc($s);
}
if (isset($_POST['btn_edite'])) {
    $name = filtervalidation($_POST['name']);
    $salary = filtervalidation($_POST['salary']);
    $dep = $_POST['dep'];

    if (!empty($_FILES['image']['name'])) {
        $old_image = $data['image'];
        // unlink('../upload/' . $old_image);
        $image = rand(0, 1000) . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "../upload/" . $image;
        move_uploaded_file($tmp_name, $location);
    } else {
        $image = $data['image'];
    }
    $updata = "UPDATE `employees` SET `name` = '$name',`salary`='$salary',`image`='$image', `departmentID`='$dep' WHERE `employees`.`id` = '$id'";
    $up = mysqli_query($coon, $updata);
    testfunctionsql($up, "updata");
    path("employees/list.php");
}
?>


<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Edite employee</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" name="name" value="<?= $data['NameEmployees'] ?>" class="form-control mt-1">
                </div>
                <div class="form-group mt-3">
                    <label>Image Url :</label><span> <img class="img_table" src="../upload/<?= $data['image'] ?>"></span>
                    <input type="file" name="image" class="form-control mt-1">
                </div>
                <div class="form-group  mt-3">
                    <label>salary :</label>
                    <input type="number" name="salary" value="<?= $data['salary'] ?>" class="form-control mt-1">
                </div>
                <div class="form-group mt-3">
                    <label>Department :</label>
                    <select name="dep" class="form-control mt-1">
                        <option  selected value="<?= $data['depID'] ?>"><?= $data['NameDepartment'] ?> </option>
                        <?php foreach ($s_department as $data_department) : ?>
                            <option value="<?= $data_department['id'] ?>"><?= $data_department['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="btn_edite" class="btn btn-primary mt-3 w-100">Create New employee</button>
            </form>
        </div>
    </div>
</div>
<?php
include "../shard/script.php";
?>