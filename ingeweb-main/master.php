<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quiz-let</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

    <!-- Favicon -->
    <link href="img/logo/logo_1-removebg-preview.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><img src="img/logo/logo_1-removebg-preview.png" class="mr-3" style="width: 220px; "></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="index.php#about-section" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Exams</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="detail.php" class="dropdown-item">Subscribe</a>
                            <a href="category.php" class="dropdown-item">Category</a>
                            <a href="#" class="dropdown-item" onclick="generateRandomNumber()">Random Quizz</a>
                        </div>
                    </div>
                    <a href="#contact" class="nav-item nav-link">Contact</a>
                </div>
                <?php 
                if(!ISSET($_SESSION['email'])){
                    echo '<a href="login.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>';
                }
                ?>
            </div>

            <?php 
            if(ISSET($_SESSION['email'])){
                echo '<!-- Menu Toggle Button -->
                <div class="dropdown">

                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar -->
                    <img src="../dist/img/' . $_SESSION['image'] . '" class="rounded-circle z-depth-0" alt="avatar image" height="35"/>
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">' . $_SESSION['username'] . '</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li class="user-header">
                <img src="../dist/img/' . $_SESSION['image'] . '" class="rounded-circle z-depth-0" alt="avatar image" height="35"/>
                <p>
                ' . $_SESSION['username'] . '
                  <small> Member since ' .  $_SESSION["dateRegister"] . ' </small>
                  <a href="#" id="logoutButton" class="btn btn-primary py-2 px-4 d-none d-lg-block">Logout</a>
                </p>
            </li>              </div>
            </div>
            
                
                ';
            }
            ?>
              
        </nav>
    </div>

    <!-- Navbar End -->

    <!-- Header End -->

    <?php
    echo $content;
    ?>


    <!-- Footer start -->
    <!-- </section>
    <footer>
        <ul1>
          <li><i class="fab fa-twitter"></i></li>
          <li><i class="fab fa-instagram"></i></li>
          <li><i class="fab fa-youtube"></i></li>
        </ul1>
                 -->
    <!-- </footer> -->
    <!-- Footer end -->

    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Script Welcome typing effect -->
    <script src="js/scramble.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var logoutButton = document.getElementById('logoutButton');

        // Check if the logout button exists
        if (logoutButton) {
            logoutButton.addEventListener('click', function() {
                // Send an AJAX request to a PHP file to unset session variables
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'logout.php');
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    // Redirect to the desired page after session unset
                    window.location.href = 'logout.php';
                };
                xhr.send();
            });
        }
    });
</script>


<script>
      function generateRandomNumber() {
        // Define the range of values for the random number
        var minimum = 1;
        var maximum = 5;

        // Generate a random number between the specified range
        var random_number = Math.floor(
          Math.random() * (maximum - minimum + 1) + minimum
        );

        // Construct the URL with the random number incorporated
        var url = "quizz.php?id=" + random_number;

        // Redirect to the generated URL
        window.location.href = url;
      }
</script>

</body>

</html>