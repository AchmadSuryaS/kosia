<?php
session_start();
include '../connect.php';
$Articles_ID = '';
$Articles_ImageURL = '';
$Articles_Description = '';
if (isset($_GET['Articles_ID'])) {
    $Articles_ID       = $_GET['Articles_ID'];
    $query3       = "select * from articles WHERE Articles_ID = '$Articles_ID'";
    $sql3         = mysqli_query($mysqli, $query3);
    $row        = mysqli_fetch_array($sql3);
    $Articles_ImageURL    = $row['Articles_ImageURL '];
    $Articles_Description   = $row['Articles_Description'];
    $Articles_ID   = $row['Articles_ID'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>KOSIA - Admin</title>

</head>

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
        </div> <a href="logout.php" class="nav-link px-3 text-danger"><span>Sign Out</span></a>
    </div>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="height-auto">
                <form action="process-articles.php" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">

                        <label for="Articles_ImageURL" class="form-label">Articles Images</label>
                        <input type="file" class="form-control" value="<?php echo $Articles_ImageURL ?>" name="Articles_ImageURL" id="Articles_ImageURL" required>
                    </div>
                    <div class="mb-3">
                        <label for="Articles_Description" class="form-label">Articles Deskripsi</label>
                        <textarea class="form-control ckeditor" id="Articles_Description" name="Articles_Description" placeholder="Description..." required><?php echo $Articles_Description ?></textarea>
                    </div>
                    <?php
                    if (isset($_GET['Articles_ID'])) {
                    ?>
                        <input type="hidden" name="Articles_ID" value="<?php echo $_GET['Articles_ID']; ?>">
                        <button type="submit" name="simpan" value="update" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> UPDATE</button>
                    <?php } else { ?>
                        <button type="submit" value="add" name="simpan" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> ADD ARTICLES</button>
                    <?php } ?>
                    <a href="articles.php" type="button" class="btn btn-danger mb-3">
                        <i class="bi bi-box-arrow-in-left"></i> Back
                    </a>
                </form>
            </div>
        </div>
    </main>

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</body>

</html>