<!DOCTYPE html>
<html>

<link rel="stylesheet" href="../../component/bootstrap-5.0.2/css/bootstrap.min.css" id="bootstrap-css">
<link rel="stylesheet" href="../../component/fontawesome-free-6.4.0/css/all.min.css">


<head>
    <title>Login</title>
</head>

<body>
    <section class="vh-100" style="background-color: #E9EBF0;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card bg-dark" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 p-5 d-none d-md-block">
                                <img src="../component/img/kosia-logo.svg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-white">

                                    <form action="login.php" method="post" onSubmit="return validasi()">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0">KOSIA</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login Dashboard</h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" name="Username" id="Username" class="form-control form-control-lg" placeholder="Username" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="Password" name="Password" id="Password" class="form-control form-control-lg" placeholder="Password" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-light btn-lg btn-block" type="submit" name="btn" value="Login"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="component/js/bootstrap.min.js"></script>
<script src="component/321.jquery.min.js"></script>
<script type="text/javascript">
    function validasi() {

        var user_id = document.getElementById("User_ID").value;

        var username = document.getElementById("Username").value;

        var password = document.getElementById("Password").value;



        if (username != "" && password != "") {

            return true;

        } else {

            alert('Username dan Password harus di isi !');

            return false;

        }
    }
</script>

</html>