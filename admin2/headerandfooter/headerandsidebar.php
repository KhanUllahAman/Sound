<?php

include "../pages/config.php";






?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />


  </head>


  
  <body>
    <div class="container-scroller">
  
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top iq-header-title">
          <a style="text-decoration: none;" class="brand-logo" href="dashboardz.php"><h2 class="text-light" style="font: 30px Rubik, sans-serif;">S O U N D</h2></a>
          <a style="text-decoration: none;" class="sidebar-brand brand-logo-mini text-light" href="dashboard.php"><h1 class="text-light" style="font: 35.04px Rubik, sans-serif;">S</h1></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle" src="adminimage/<?php echo $_SESSION['user']['image'];?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal text-light"><?php echo $_SESSION['user']['name'];?></h5>
                  <span class="text-xs font-weight-bold mb-0 d-inline-block text-truncate" style="max-width: 130px"><?php echo $_SESSION['user']['email'];?></span>
                </div>
              </div>
             


              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="account.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-seccess"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout  text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Log Out</p>
                  </div>
                </a>
             
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-collage"></i>
              </span>
              <span class="menu-title">Admin Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="user.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-outline"></i>
              </span>
              <span class="menu-title">Manage Website</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="songs.php">
              <span class="menu-icon">
                <i class="mdi mdi-music"></i>
              </span>
              <span class="menu-title">Songs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-application"></i>
              </span>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="artist.php"> Artist </a></li>
                <li class="nav-item"> <a class="nav-link" href="genre.php"> Genre </a></li>
                <li class="nav-item"> <a class="nav-link" href="language.php"> Language </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="album.php">
              <span class="menu-icon">
                <i class="mdi mdi-album"></i>
              </span>
              <span class="menu-title">Albums</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="video.php">
              <span class="menu-icon">
                <i class="mdi mdi-video"></i>
              </span>
              <span class="menu-title">Videos</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="employee.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-outline"></i>
              </span>
              <span class="menu-title">Employees</span>
            </a>
          </li>
        
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="artist.php">
              <span class="menu-icon">
                <i class="mdi mdi-account"></i>
              </span>
              <span class="menu-title">Artist</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="genre.php">
              <span class="menu-icon">
                <i class="mdi mdi-apps"></i>
              </span>
              <span class="menu-title">Genre</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="language.php">
              <span class="menu-icon">
                <i class="mdi mdi-web"></i>
              </span>
              <span class="menu-title">Language</span>
            </a>
          </li> -->
  
        </ul>
      </nav>

      
      <!-- navbar  -->
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a style="text-decoration: none;" class="sidebar-brand brand-logo-mini text-white" href="dashboard.php"><h1>S</h1></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="searchsong.php" method="GET">
                  <input type="text" class="form-control text-light" name="search" placeholder="Search Songs" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
           
           
           
             
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="adminimage/<?php echo $_SESSION['user']['image'];?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['user']['name'];?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0" style="font-size: 15px; font-style: Rubik, sans-serif; color: #F8F9FA; font-weight: bold;">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a href="account.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="logout.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <!-- <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p> -->
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>