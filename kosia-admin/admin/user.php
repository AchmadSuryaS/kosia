<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>

    <title>KOSIA - Admin</title>

</head>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dt2').DataTable();
    });
</script>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">KOSIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <form class=" ms-auto  my-lg-0">
                    <p class="text-white">
                        <?php
                        include '../connect.php';
                        if ($_SESSION['status'] != "login") {
                            header("location:../index.php");
                        }
                        echo "Hello, " . $_SESSION['Username'];
                        ?>
                    </p>
            </div>
            </form>
        </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">
                            CORE
                        </div>
                    </li>
                    <li>
                        <a href="index.php" class="nav-link px-3 active">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Interface
                        </div>
                    </li>
                    <li>
                        <a href="articles.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="sinopsis.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book"></i></span>
                            <span>Sinopsis</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Addons
                        </div>
                    </li>
                    <li>
                        <a href="report.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-file-earmark-fill"></i></span>
                            <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="user.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-person-fill"></i></span>
                            <span>User</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div> <a href="logout.php" class="nav-link px-3 text-danger"><span><i class="bi bi-box-arrow-in-left"></i> Sign Out</span></a>
    </div>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>User</h4>
                </div>
                <div class="height-auto">
                    <a href="manage-user.php" class="btn btn-primary mb-3 mt-3"><i class="bi bi-plus-square"></i> ADD USER</a>
                    <table class="table table-hover  table-bordered  table-striped mt-3" id="dt2">
                        <thead>
                            <tr>
                                <th class="text-center">User_ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Action_User</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include "../connect.php";
                            $col_user   = "select * from user";
                            $result     = mysqli_query($mysqli, $col_user);
                            while ($user  = mysqli_fetch_array($result)) {
                                $User_ID         = $user['User_ID'];
                                $Name   = $user['Name'];
                                $Username = $user['Username'];
                                $Password = $user['Password'];
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $user['User_ID']; ?></td>
                                    <td class="text-center"><?php echo $user['Name']; ?></td>
                                    <td class="text-center"><?php echo $user['Username']; ?></td>
                                    <td class="text-center"><?php echo $user['Password']; ?></td>
                                    <td class="text-center">
                                        <a href="manage-user.php?update&User_ID=<?php echo $User_ID ?>" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="process-user.php?delete&User_ID=<?php echo $User_ID  ?>" class="btn btn-danger" " onclick=" return confirm('Apakah anda yakin ingin menghapus User <?php echo $User_ID ?> ???' )"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
</body>

</html>