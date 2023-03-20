<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";

auth(1, 2);
if (isset($_GET['show_id'])) {
    $id = $_GET['show_id'];
    $select = "SELECT * FROM `employeeswithdepartment` where `id`=$id";
    $s = mysqli_query($coon, $select);
    $data = mysqli_fetch_assoc($s);
}
?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">Show employee</h1>
    <div class="card mt-4 card-form">
        <div class="card-body crad_show">
            <div class="image">
                <img src="../upload/<?= $data['image']; ?>" class="card-img-top image_card" alt="...">
            </div>
            <div class="info">
                <h3><label class="card_title"> Name :</label><?= $data['NameEmployees']; ?></h3>
                <h3><label class="card_title"> Department :</label><?= $data['NameDepartment']; ?></h3>
                <h3><label class="card_title"> Salary :</label>$<?= $data['salary']; ?></h3>
                <a class="btn btn-primary" href="/project/session9-10/employees/list.php">Back</a>

            </div>

        </div>
    </div>
</div>

<?php
include "../shard/script.php";
?>