<?php 

    include "connect.php";

    session_start();

    if(isset($_POST['add']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = "SELECT * FROM `registration` WHERE email='$email' AND password='$password'";

        $result = $conn->query($select);

        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
            }

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;

            header("location:index.php");
        }
        else{
            echo "error";
            header("location:login.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>medwin cares</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    
</style>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Sat : 10.00 am - 09.00 pm</small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>medwincares@gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+91 78765 56787</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-primary">Medwin Cares</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="team.php" class="nav-item nav-link">Our Docters</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="service.php" class="nav-item nav-link">Services</a>
                <a href="registration.php" class="nav-item nav-link">Registration</a>
            </div>
            <a class="nav-link" href="login.php"><button class="btn btn-primary text-light fw-bold">LOG IN</button></a>
            <a class="nav-link" href="appointment.php"><button class="btn btn-primary text-light fw-bold">Appointment</button></a>
            </div>
    </nav>
     <!-- Hero Start -->
     <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">LOGIN</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">LOGIN</a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary bg-appointment mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row gx-5">
                
                <div class="login-container p-xxl-3">
                    <h2 class="display-3 mb-4 pt-2 text-font-2 text-light">LOGIN</h2>
                    <form id="registrationForm" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control text-font" name="email" id="login-email"
                                aria-describedby="emailHelp" placeholder=" ">
                            <label for="login-email text-font" class="form-label">Email</label>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="login-password"
                                placeholder=" ">
                            <label for="login-password" class="form-label">Password</label>
                            <div class="invalid-feedback">Password must be at least 6 characters long.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block fw-bold text-light" name="add"
                            id="login-button" onclick="lgn()">Login</button>
                        <button type="button"
                            class="btn btn-outline-secondary fw-bold btn-block">Clear</button>
                    </form>
                    <p class="mt-3 pt-2">New user? <a href="registration.php" class="color-3">Register</a></p>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="script.js"></script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="lib/twentytwenty/jquery.event.move.js"></script>
        <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>
    
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>function lgn () { app.get ("/", (_req,res)=> { res.render ("index.php"); }); }</script>
</body>
</html>
