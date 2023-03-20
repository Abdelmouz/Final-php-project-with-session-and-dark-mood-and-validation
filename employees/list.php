<?php
include "../shard/head.php";
include "../shard/header.php";
include "../App/config.php";
include "../App/functions.php";
auth(1, 2);
$select = "SELECT * FROM `employeeswithdepartment`";
$s = mysqli_query($coon, $select);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_user = "SELECT * from `employees` WHERE `id`=$id";
    $s_user = mysqli_query($coon, $select_user);
    $data = mysqli_fetch_assoc($s_user);
    $image_name_user = $data['image'];
    unlink('../upload/' . $image_name_user);
    $delete = "DELETE FROM `employees` WHERE `id`=$id";
    $d = mysqli_query($coon, $delete);
    path("employees/list.php");
}

?>
<div class="contaner col-sm-8 mt-5 mx-auto">
    <h1 class="title_h1 list_title">List employees</h1>
    <div class="card mt-4 card-form">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="handle_btn">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col" class="handle_btn">salary</th>
                        <th scope="col" class="text-center">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($s as $data) : ?>
                        <tr>
                            <th scope="row"><?= $data['id'] ?></th>
                            <td class="handle_btn"> <img class="img_table" src="../upload/<?= $data['image'] ?>"> </td>
                            <td><?= $data['NameEmployees'] ?></td>
                            <td class="text-center"><?= $data['NameDepartment'] ?></td>
                            <td class="handle_btn"><?= $data['salary'] ?></td>
                            <!-- <td><?= substr($data['created_at'], 5, 6) ?></td> -->
                            <td class=" handle_btn text-center">
                                <a href="/project/session9-10/employees/edite.php?edite_id=<?= $data['id'] ?>" class="btn btn-primary ">Edite</a>
                                <a href="/project/session9-10/employees/list.php?id=<?= $data['id'] ?>" class="btn btn-danger ml-5 ">Delete</a>
                            </td>
                            <td class="handle_menu text-center">
                                <div class="dropdown-center">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/project/session9-10/employees/edite.php?edite_id=<?= $data['id'] ?>"><i class="fa-regular fa-pen-to-square primary"></i></a></li>
                                        <li><a class="dropdown-item" href="/project/session9-10/employees/show.php?show_id=<?= $data['id'] ?>"><i class="fa-solid fa-eye primary"></i></a></li>
                                        <li><a class="dropdown-item" href="/project/session9-10/employees/list.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-trash-can danger"></i></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
include "../shard/script.php";
?>