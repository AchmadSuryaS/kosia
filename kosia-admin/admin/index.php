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
  <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
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
        <form class="ms-auto  my-lg-0">
          <p class="text-white">
            <?php
            include '../connect.php';
            if ($_SESSION['status'] != "login") {
              header("location:../index.php");
            }
            echo "👋Annyeong, " . $_SESSION['Username'];
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
          <h4>Dashboard</h4>
        </div>
        <img src="../../component/img/kosia-banner.svg" class="img-fluid w-100 mb-5" alt="kosia-banner">
        <div class="row">
          <div class="col-md-3 mb-3">
            <a href="articles.php" style="text-decoration: none;">
              <div class="card bg-success text-white h-100">
                <div class="card-body py-5"><?php
                                      $data_articles = mysqli_query($mysqli, "SELECT * FROM articles");
                                      $jumlah_articles = mysqli_num_rows($data_articles);
                                      echo $jumlah_articles ?> Articles</div>
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <a href="sinopsis.php" style="text-decoration: none;">
              <div class="card bg-warning text-white h-100">
                <div class="card-body py-5"><?php
                                      $data_sinopsis = mysqli_query($mysqli, "SELECT * FROM sinopsis");
                                      $jumlah_sinopsis = mysqli_num_rows($data_sinopsis);
                                      echo $jumlah_sinopsis ?> Sinopsis</div>
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <a href="report.php" style="text-decoration: none;">
              <div class="card bg-danger text-white h-100">
                <div class="card-body py-5"><?php
                                      $data_report = mysqli_query($mysqli, "SELECT * FROM report");
                                      $jumlah_report = mysqli_num_rows($data_report);
                                      echo $jumlah_report ?> Report</div>
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 mb-3">
            <a href="user.php" style="text-decoration: none;">
              <div class="card bg-primary text-white h-100">
                <div class="card-body py-5"><?php
                                      $data_user = mysqli_query($mysqli, "SELECT * FROM user");
                                      $jumlah_user = mysqli_num_rows($data_user);
                                      echo $jumlah_user ?> User</div>
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
  </main>


  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>