<!DOCTYPE html>
<html lang="en">
<head>

<?php
$siteOptions = query("select * from siteoptions");
$siteOptions = $siteOptions[0];
?>
      <link rel="icon" href="<?php echo($siteOptions["mainLogo"]); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDMS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css2/stylesheet.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Custom Favicon -->
    <link rel="icon" href="<?php echo($siteOptions["mainLogo"]); ?>">
    <!-- Custom CSS for About Us section -->
    <style>
        body {
    font-family: 'Poppins', sans-serif !important;
}
        /* CSS for the About Us section */
        .about-section {
            padding: 300px 0;
            background-color: #f8f9fa;
        }

        .nav-link{
            color: #000 !important;
        }

        .navbar .nav-link.active {
      color: #88C027 !important; /* Change color to green */
    }

        .section-heading {
            font-size: 3rem;
            margin-bottom: 30px;
        }

        .text-muted {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* CSS for the footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40; /* Change this color to match your footer */
            color: #ffffff; /* Change this color to match your footer text */
            padding: 20px 0;
        }
        .navbar-light{
    background-color: #fff !important;
}
    </style>
</head>
<?php
$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = parse_url($currentUrl, PHP_URL_PATH);
$lastWord = basename($path);


?>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" id="nav">
        <div class="container">
            <!-- Navbar Brand -->
            <span>
                <!-- <img src="public/static_system/uploads/LGUlogo.png" height="80" class="navbar-brand d-inline-block align-text-top"> -->
                <img src="<?php echo($siteOptions["mainLogo"]); ?>" height="80" class="navbar-brand d-inline-block align-text-top">
            </span>
            &nbsp; &nbsp; &nbsp; &nbsp; <a id="cwadms" class="navbar-brand" href="index.php"> | </a>
            <!-- Navbar Toggler -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($lastWord == 'home') ? 'active' : ''; ?>" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($lastWord == 'newAppointment') ? 'active' : ''; ?>" href="newAppointment">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($lastWord == 'ourServices') ? 'active' : ''; ?>" aria-current="page" href="ourServices">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($lastWord == 'aboutUs') ? 'active' : ''; ?>" aria-current="page" href="aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($lastWord == 'contactUs') ? 'active' : ''; ?>" aria-current="page" href="contactUs">Contact Us</a>
                    </li>
                </ul>
                <!-- Admin and staff dropdown -->
                <a class="nav-link text-white mr-30" href="login" id="navbarDarkDropdownMenuLink" >
                        Personnel Login
                    </a>
            </div>
        </div>
    </nav>
  
