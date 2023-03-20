<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(2, 3);

$id_admin = $_SESSION['admin']['id'];
$select_user = "SELECT * FROM `adminsalldata` where `id`='$id_admin'";
$s_user  = mysqli_query($coon, $select_user);
$data_user = mysqli_fetch_assoc($s_user);
if (isset($_POST['btn_save'])) {

    $image_name = rand(0, 100) . rand(0, 1000) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];
    $location = "./upload/" . $image_name;
    $image_old = $data_user['image'];
    if (empty($_FILES['image']['name'])) {
        $image_name = $data_user['image'];
    }
    if (!validtionFiles($image_size, 5 && !validtionimahe_type($image_type))) {
        echo "<div class='alert alert-info col-4 mx-auto mt-3 text-center'>Good Job
        </div>";
        if ($image_old != "profile.png") {
            unlink("./upload/" . $image_old);
        }
        move_uploaded_file($tmp_name, $location);
        $UPDATE = "UPDATE `admins` SET `image` = '$image_name' WHERE `id` = '$id_admin'";
        $s = mysqli_query($coon, $UPDATE);
        testfunctionsql($s, "UPDATE");
        path("Admin/profile.php");
    } else {
        echo "<div class='alert alert-danger col-4 mx-auto mt-5 p0th'>Choose Image valid
        </div>";
    }
}

?>

<div class="contaner col-sm-8 mt-1 mx-auto">
    <h1 class="title_h1 list_title">Edite profile</h1>
    <div class="card mt-4 card-form card_flex">
        <div class="image">
            <img src="../Admin/upload/<?= $data_user['image'] ?>" class="card-img-top">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Upload image
            </button>
        </div>
        <div class="card-body info">
            <h3 class="mb-3">
                <lable>Name :</lable>
                <?= $data_user['username'] ?>
            </h3>
            <h5 class="mb-3">
                <lable>roles :</lable>
                <?= $data_user['desciption'] ?>
            </h5>
            <h5>
                <lable>Create_At :</lable>
                <?= substr($data_user['cerate_AT'], 0, 10) ?>
            </h5>
            <a class="btn btn-warning w-100 mt-3" href="/project/session9-10/Admin/editeProfile.php">Edite Your Profile</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Choose Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control mt-1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="btn_save" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "../shard/script.php";
?>