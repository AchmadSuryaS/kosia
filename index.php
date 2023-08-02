<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keyword" content="BooKU" />
  <meta name="author" content="Achmad Surya Saputra" />
  <meta name="description" content="Welcome to our book lending website, where the joy of reading meets the convenience of the digital age! Our platform is designed to make borrowing books a seamless and enjoyable experience for bookworms of all ages." />
  <meta content="Achmad Surya Saputra | Web" property="og:title" />
  <meta name="google-site-verification" content="5mE-5pyAFkedLR3TjNg0GdtnVOx-UGO6afITGFZVht4" />

  <link rel="stylesheet" href="../component/bootstrap-5.0.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../component/font-goggle/font-goggle.css" />
  <link rel="stylesheet" href="../component/fontawesome-free-6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../component/image-hover-1.0/imagehover.min.css" />
  <link rel="stylesheet" href="style.css" />

  <title>Kosia - Web</title>
</head>

<body>
  <nav class="navbar navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="component/img/kosia-logo.svg" alt="" width="100">
      </a>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </div>
  </nav>
  <section id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <a href="index.php">Home</a>
      <a href="k-pop.php">K-pop</a>
      <a href="k-drama.php">K-drama</a><br><br>
      <a href="mailto:contact@achmadsurya.com">✉</a>
    </div>
  </section>

  <img src="component/img/kosia-banner.svg" class="img-fluid w-100 mb-5" alt="kosia-banner">

  <hr class="container">
  <section id="main" class="container">
    <div class="card mb-3 bg-dark">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="component/img/K-pop.svg" class="img-fluid rounded-start" alt="logo">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">K-pop</h5>
            <p class="card-text">sumber utama untuk segala informasi terbaru tentang girlgroup dan boygroup Korea terfavorit! saya dengan bangga mempersembahkan koleksi lengkap profil tentang grup-grup idola paling populer dari Korea Selatan.</p>
           <a href="k-pop.php"><button>View All</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3 bg-dark">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="component/img/K-drama.svg" class="img-fluid rounded-start" alt="logo">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">K-drama</h5>
            <p class="card-text">Tempat untuk menemukan sinopsis terbaru dan informasi lengkap tentang pemain drama Korea terpopuler! Saya dengan bangga mempersembahkan koleksi lengkap sinopsis drama Korea terkini, lengkap dengan daftar pemain yang berbakat dan menawan.</p>
           <a href="k-drama.php"><button>View All</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>

  <footer class="text-center text-white">
    <div class="container p-4 pb-0">
      <section class="mb-4">
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/ach13_" role="button" target="_blank"><i class="fab fa-instagram"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/AchmadSuryaS" role="button" target="_blank"><i class="fab fa-github"></i></a>
      </section>
    </div>
    <div class="text-center p-3">
      Copyright © 2023
      <a class="text-white" href="https://achmadsurya.com/">achmadsurya.com</a>
    </div>
  </footer>




  <button type="button" class="btn btn-primary d-none btnModal" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch demo modal</button>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 modalTitle" id="exampleModalLabel"></h1>
          <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
          <div class="modalImage col-md-6 col-12"></div>
          <div class="col-md-6 col-12">
            <div class="modalDeskripsi"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light text-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

<script src="../component/bootstrap-5.0.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>

</html>