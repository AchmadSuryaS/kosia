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
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
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
          <h4>Report</h4>
        </div>
        <div class="height-auto">
          <form method="post">
            <div class="mb-3">
              <label for="From" class="mt-3">From</label>
              <input type="date" name="dari_tgl" class="form-control">
            </div>
            <div class="mb-3">
              <label for="To">To</label>
              <input type="date" name="sampai_tgl" class="form-control">
            </div>
            <input type="submit" class="btn btn-danger text-white mb-3" name="filter" value="Filter">
          </form>
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th class="py-1 px-2 text-center">#</th>
                    <th class="py-1 px-2 text-center">Date_Time</th>
                    <th class="py-1 px-2 text-center">ActionUser</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../connect.php';
                  $i = 1;
                  if (isset($_POST['filter'])) {
                    $dari_tgl = mysqli_real_escape_string($mysqli, $_POST['dari_tgl']);
                    $sampai_tgl = mysqli_real_escape_string($mysqli, $_POST['sampai_tgl']);
                    if ($dari_tgl != null || $sampai_tgl != null) {
                      $data = mysqli_query($mysqli, "SELECT * From report WHERE date_time BETWEEN '$dari_tgl' AND DATE_ADD('$sampai_tgl', INTERVAL 1 DAY)");
                    } else {
                      $action = "SELECT * From report";
                      $data = mysqli_query($mysqli, $action);
                    }
                  } else {
                    $action = "SELECT * From report";
                    $data = mysqli_query($mysqli, $action);
                  }
                  while ($actn = mysqli_fetch_array($data)) {
                    $action_user = $actn['action_user'];
                    $date_time = $actn['date_time'];
                  ?>
                    <tr>
                      <td class="py-1 px-2 text-center"><?php echo $i++ ?></td>
                      <td class="py-1 px-2"><?php echo $date_time ?></td>
                      <td class="py-1 px-2"><?php echo $action_user ?></td>
                    </tr>
                </tbody>
              <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>