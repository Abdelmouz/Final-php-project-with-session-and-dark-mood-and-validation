<?php
if (isset($_POST['style_white'])) {
    $_SESSION['style'] = "white";
    // path("index.php");
    header('location:/project/session9-10/index.php');
    // header("refresh:1");
    // echo "<script> location.reload()</script>";
}
if (isset($_POST['style_dark'])) {
    $_SESSION['style'] = "dark";
    header('location:/project/session9-10/index.php');
    // echo "<script> window.location.reload()</script>";
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}

?>
<nav class="navbar navbar-expand-lg  bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/project/session9-10/index.php">Instant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/project/session9-10/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/project/session9-10/Admin/profile.php">Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Department
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/project/session9-10/department/list.php">Department List</a></li>
                            <li><a class="dropdown-item" href="/project/session9-10/department/add.php">Department Add</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Employees
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/project/session9-10/employees/list.php">List employees</a></li>
                            <li><a class="dropdown-item" href="/project/session9-10/employees/add.php">Add employees</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admins
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/project/session9-10/Admin/list.php">List Admins</a></li>
                            <li><a class="dropdown-item" href="/project/session9-10/Admin/add.php">Add Admins</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" method="post">

                <?php if (isset($_SESSION['admin'])) : ?>
                    <button class="btn btn-danger" name="logout">logout</button>
                <?php endif; ?>

                <?php if (isset($_SESSION['style']))
                    if ($_SESSION['style'] == "dark") :
                ?>
                    <button class="btn btn-outline-light ml-5" name="style_white">White</button>
                <?php endif; ?>
                <?php if (isset($_SESSION['style']))
                    if ($_SESSION['style'] == "white") :  ?>
                    <button class="btn btn-outline-dark ml-5" name="style_dark">Dark</button>
                <?php endif; ?>
                <?php if (!isset($_SESSION['style'])) : ?>
                    <button class="btn btn-outline-light ml-5" name="style_white">white</button>
                <?php endif; ?>

            </form>
        </div>
    </div>
</nav>