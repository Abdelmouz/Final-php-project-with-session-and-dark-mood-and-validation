<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(1, 2);
$select = "SELECT * FROM `department`";
$s = mysqli_query($coon, $select);
$errors = [];
if (isset($_POST['btn_add'])) {
    $name = filtervalidation($_POST['name']);
    $salary = filtervalidation($_POST['salary']);
    if (empty($_POST['dep'])) {
        $errors[] = "plese Choose Department";
    } else {
        $dep = $_POST['dep'];
    }
    $image = rand(0, 1000) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "../upload/" . $image;
   
    if (validtionimahe_type($_FILES['image']['type'])) {
        $errors[] = "your shoud enter image only";
    }
    if (validtionFiles($_FILES['image']['size'], 1)) {
        $errors[] = "your image over 1 M";
    }

    if (empty($_FILES['image']['name'])) {
        $errors[] = "plese enter  image";
    }
    if (empty($name) || strlen($name) < 3) {
        $errors[] = "plese enter  name vaild";
    }
    if (empty($salary) || !filter_var($salary, FILTER_VALIDATE_INT) || $salary < 0) {
        $errors[] = "plese enter  salary vaild";
    }
    if (empty($errors)) {
        move_uploaded_file($tmp_name, $location);
        $insert = "INSERT INTO `employees`  VALUES (NULL, ' $name', '$salary ', '$image', ' $dep', current_timestamp())";
        $s = mysqli_query($coon, $insert);
        testfunctionsql($s, "insert");
        path("employees/list.php");
    }
}

?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Add employees</h1>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $data) : ?>
                    <li><?= $data; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" name="name" class="form-control mt-1">
                </div>
                <div class="form-group mt-3">
                    <label>Image Url :</label>
                    <input type="file" name="image" class="form-control mt-1">
                </div>
                <div class="form-group  mt-3">
                    <label>salary :</label>
                    <input type="number" name="salary" class="form-control mt-1">
                </div>
                <div class="form-group mt-3">
                    <label>Department :</label>
                    <select name="dep" class="form-control mt-1">
                        <option disabled selected>Choose Department </option>
                        <?php foreach ($s as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="btn_add" class="btn btn-primary mt-3 w-100">Create New employee</button>
            </form>
        </div>
    </div>
</div>



<?php
include "../shard/script.php";
?>